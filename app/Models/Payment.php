<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    /**
     * Kolom yang boleh diisi mass-assignment.
     */
    protected $fillable = [
        'booking_id',
        'method',   // 'cash' | 'transfer' | 'gateway'
        'amount',
        'status',   // 'pending' | 'paid' | 'failed'
        'ref',      // nomor referensi / invoice optional
    ];

    /**
     * Casts & format angka.
     */
    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /**
     * Relasi: Payment milik sebuah Booking.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Scopes berguna.
     */
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeBetweenDates($query, ?string $from, ?string $to)
    {
        return $query
            ->when($from, fn ($q) => $q->whereDate('created_at', '>=', $from))
            ->when($to,   fn ($q) => $q->whereDate('created_at', '<=', $to));
    }

    /**
     * Helper cepat.
     */
    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }

    public function markPaid(?float $amount = null): void
    {
        if ($amount !== null) {
            $this->amount = $amount;
        }
        $this->status = 'paid';
        $this->save();
    }

    /**
     * Jumlah terbayar untuk sebuah booking.
     */
    public static function totalPaidForBooking(int $bookingId): float
    {
        return (float) static::query()
            ->where('booking_id', $bookingId)
            ->where('status', 'paid')
            ->sum('amount');
    }

    /**
     * Event: isi default ref bila kosong.
     */
    protected static function booted(): void
    {
        static::creating(function (Payment $m): void {
            if (empty($m->ref)) {
                $m->ref = 'INV-' . \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(6));
            }
        });
    }
}
