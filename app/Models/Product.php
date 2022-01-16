<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "Name",
        "Description",
        "Picture_url1", 
        "Picture_url2", 
        "Picture_url3", 
        "Picture_url4", 
        "Color", 
        "Size", 
        "Price",
        "SlicedPercentage", 
        "Additional Info", 
        "Review_id", 
        "Video_id", 
        "Categories_id", 
        "Brand_id", 
        "displaycategories_id",
        "typecategories_id",
         
    ];

    public function favourites(){
        return $this->hasOne(Favourite::class);
    }
}
