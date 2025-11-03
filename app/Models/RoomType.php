<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'capacity',
        'description',
        'base_price',
    ];

    /**
     * Boot method untuk otomatis generate slug
     */
    protected static function booted()
    {
        static::creating(function ($roomType) {
            if (empty($roomType->slug)) {
                $roomType->slug = Str::slug($roomType->name);
            }
        });

        static::updating(function ($roomType) {
            if (empty($roomType->slug)) {
                $roomType->slug = Str::slug($roomType->name);
            }
        });
    }

    /**
     * Relasi ke tabel images
     */
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    /**
     * Relasi ke tabel amenities
     */
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
}
