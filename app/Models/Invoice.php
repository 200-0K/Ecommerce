<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax',
        'address',
        'zip',
        'city_id',
        'user_id',
    ]; 

    public function orders() {
        return $this->hasMany(Order::class, 'invoice_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }
}
