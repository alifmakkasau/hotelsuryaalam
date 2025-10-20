<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
    {
        protected $fillable = ['name','capacity','description','base_price'];
        public function rooms(){ return $this->hasMany(Room::class); }
        public function amenities(){ return $this->belongsToMany(Amenity::class); }
        public function rates(){ return $this->hasMany(Rate::class); }
        public function images(){ return $this->morphMany(Image::class,'imageable'); }
    }

