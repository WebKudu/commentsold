<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /*
     * Note: It seems like an Order should only belong to a Product
     * OR an Inventory, since Inventories already belong to Products.
     * Nevertheless, this is the format received
     *
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
