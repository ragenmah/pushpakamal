<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model
{
    use HasFactory, SoftDeletes;
   

    protected $guarded=[];

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function getPropertyStatusAttribute($attribute){
        return[
            0=>'Sold Out',
            1=>'For Sale',
            2=>'For Rent'

        ][$attribute];
    }
}
