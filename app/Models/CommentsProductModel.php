<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsProductModel extends Model
{
    use HasFactory;
    protected $table='comments_product';
    protected $fillable=['idProduct','content','idUser'];
}
