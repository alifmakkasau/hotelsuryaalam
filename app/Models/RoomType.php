<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name','capacity','description','base_price'];
    public function rooms(){ return $this->hasMany(Room::class);}
}
