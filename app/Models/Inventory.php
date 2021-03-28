<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getPriceAttribute(): string
    {
        return '$' . number_format($this->price_cents / 100, 2);
    }

    public function getCostAttribute(): string
    {
        return '$' . number_format($this->cost_cents / 100, 2);
    }
}
