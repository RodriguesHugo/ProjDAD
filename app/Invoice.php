<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function invoiceItems()
    {
        return $this->hasMany(Invoice_Item::class);
    }
}
