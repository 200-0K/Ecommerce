<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function orders() {
        return $this->hasMany(Order::class, 'invoice_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
