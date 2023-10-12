<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    // get category wise product
    public function products(){
        return $this->belongsTo('App\Models\Product', 'id', 'category_id');
    }

}
