<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function restaurant_table()
    {
        return $this->belongsTo(Restaurant_table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Invoice::class);
    }
}
