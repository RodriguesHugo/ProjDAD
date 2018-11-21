<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_Item extends Model
{
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
