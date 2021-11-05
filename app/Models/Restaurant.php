<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function types()
    {
        return $this->belongsToMany('App\Models\Type');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}