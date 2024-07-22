<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productImageGalleries()
    {
        return $this->hasMany(ProductImageGallery::class);
    }
}   
