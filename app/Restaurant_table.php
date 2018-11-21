<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant_table extends Model
{
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
