<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','category_slug','category_image','is_active'];

    public function products(){
        return $this->hasMany(Products::class);
    }
}
