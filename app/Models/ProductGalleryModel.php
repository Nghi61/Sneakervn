<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGalleryModel extends Model
{
    use HasFactory;
    protected $table='product_gallery';
    protected $fillable=['name','urlHinh','idProduct'];
}
