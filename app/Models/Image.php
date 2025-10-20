<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path','sort'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
