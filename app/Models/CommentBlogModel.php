<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlogModel extends Model
{
    use HasFactory;
    protected $table='comments_blog';
    protected $fillable=['idBlog','content','idUser'];
}
