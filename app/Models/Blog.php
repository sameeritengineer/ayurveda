<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return date('d M, Y',strtotime($value));
    }
}
