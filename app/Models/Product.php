<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'product_id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function usersCart() {
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id')->withPivot('qty');
    }
}
