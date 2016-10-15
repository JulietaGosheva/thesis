<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    public $timestamps = false;
    
    public $fillable = [
    	'name', 'weight', 'description', 'image_name', 'price', 'type'
    ];
}
