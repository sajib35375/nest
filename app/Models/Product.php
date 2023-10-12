<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rates(){
        return $this->belongsTo(Rate::class,'id','product_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\ProductTag');
    }

    public function categories(){
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }

    public function multi(){
        return $this->belongsTo(MultiImg::class,'id','product_id');
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }


}
