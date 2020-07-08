<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $fillable=['product_title','product_name','product_code','product_price','product_image','product_description'];
}
