<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
   protected $fillable =['name', 'cpNumber', 'gender', 'barangay', 'sitio', 'visit']; //OPTIONAL
   //this is need if we are connecting to multiple database types

}
