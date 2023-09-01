<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    use HasFactory;
    protected $table='bill';
    protected $fillable=['name','phone','email','MHD','address','total','payment','delivery','status'];
}
