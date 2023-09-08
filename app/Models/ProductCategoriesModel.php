<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoriesModel extends Model
{
    use HasFactory;
    protected $table='product_categories';
    protected $fillable=['idProduct','idCategories'];
}
