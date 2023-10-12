<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
