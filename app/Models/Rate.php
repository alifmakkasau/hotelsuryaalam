<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    protected $fillable = [
        'room_type_id',
        'date',       // Y-m-d
        'price',      // decimal(12,2)
        'allotment',  // kuota jual per tanggal untuk room_type
    ];

    protected $casts = [
        'date'      => 'date',
        'price'     => 'decimal:2',
        'allotment' => 'integer',
    ];

    /* =======================
     |  Relationships
     | ======================= */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    /* =======================
     |  Scopes
     | ======================= */
    public function scopeForDate($query, string|Carbon $date)
    {
        $d = $date instanceof Carbon ? $date->toDateString() : (string) $date;
        return $query->whereDate('date', $d);
    }

    public function scopeBetween($query, string|Carbon $from, string|Carbon $to)
    {
        $f = $from instanceof Carbon ? $from->toDateString() : (string) $from;
        $t = $to   instanceof Carbon ? $to->toDateString() : (string) $to;
        return $query->whereBetween('date', [$f, $t]);
    }

    public function scopeForPeriod($query, CarbonPeriod $period)
    {
        return $query->whereBetween('date', [
            $period->getStartDate()->toDateString(),
            $period->getEndDate()->toDateString(),
        ]);
    }

    public function scopeFuture($query)
    {
        return $query->whereDate('date', '>=', today());
    }

    /* =======================
     |  Helpers
     | ======================= */

    /**
     * Harga yang berlaku pada tanggal tertentu untuk room_type,
     * fallback ke base_price jika tidak ada Rate.
     */
    public static function priceFor(int $roomTypeId, string|Carbon $date): float
    {
        $rate = static::query()
            ->where('room_type_id', $roomTypeId)
            ->forDate($date)
            ->first();

        if ($rate) {
            return (float) $rate->price;
        }

        $base = RoomType::find($roomTypeId)?->base_price ?? 0;
        return (float) $base;
    }

    /**
     * Kuantitas tersedia (sisa) pada tanggal tertentu,
     * berdasarkan allotment - pemakaian (booking confirmed/checked_in).
     */
    public function remainingForDate(string|Carbon $date): int
    {
        $d = $date instanceof Carbon ? $date->toDateString() : (string) $date;

        $allot = $this->allotment ?? Room::where('room_type_id', $this->room_type_id)->count();

        $used = Booking::query()
            ->where('room_type_id', $this->room_type_id)
            ->whereIn('status', ['confirmed', 'checked_in'])
            ->whereDate('check_in', '<=', $d)
            ->whereDate('check_out', '>',  $d)   // malam itu dihitung terpakai
            ->sum('qty');

        return max(0, (int) $allot - (int) $used);
    }

    /**
     * Rata-rata harga untuk periode tanggal (inklusif).
     */
    public static function averagePriceForPeriod(int $roomTypeId, string|Carbon $from, string|Carbon $to): float
    {
        $f = $from instanceof Carbon ? $from : Carbon::parse($from);
        $t = $to   instanceof Carbon ? $to   : Carbon::parse($to);

        $period = CarbonPeriod::create($f, $t->copy()->subDay());
        $prices = [];

        foreach ($period as $d) {
            $prices[] = static::priceFor($roomTypeId, $d);
        }

        return count($prices) ? round(array_sum($prices) / count($prices), 2) : 0.0;
        }

    /* =======================
     |  Model events
     | ======================= */

    protected static function booted(): void
    {
        // Set default allotment = jumlah kamar pada room_type jika tidak diisi
        static::creating(function (Rate $m): void {
            if (is_null($m->allotment)) {
                $m->allotment = Room::where('room_type_id', $m->room_type_id)->count();
            }
        });

        // Jaga konsistensi tipe tanggal
        static::saving(function (Rate $m): void {
            if ($m->date instanceof Carbon) {
                $m->date = $m->date->toDateString();
            }
        });
    }
}
