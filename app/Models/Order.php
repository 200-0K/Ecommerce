<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'qty',
        'rate',
        'comment',
        'product_id',
        'invoice_id'
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
