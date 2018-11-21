<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function invoiceItems()
    {
        return $this->hasMany(Invoice_Item::class);
    }
}
