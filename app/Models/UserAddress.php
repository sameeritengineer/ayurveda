<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    public function getNameAttribute($value){
        return ucwords($value);
    }

    public function country_details(){
        return $this->belongsTo(Country::class,'country','name');
    }

    public function state_details(){
        return $this->belongsTo(State::class,'state','name');
    }

    public function city_details(){
        return $this->belongsTo(City::class,'city','name');
    }
}
