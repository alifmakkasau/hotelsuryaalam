<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['room_type_id','guest_id','check_in','check_out','qty','price_per_night','total','status','code'];

    protected static function booted()
    {
        static::creating(function($m){
            $m->code = \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(8));
        });
    }

    public function roomType(){ return $this->belongsTo(RoomType::class); }
    public function guest(){ return $this->belongsTo(Guest::class); }
    public function payments(){ return $this->hasMany(Payment::class); }
}
