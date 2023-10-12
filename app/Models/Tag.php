<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    // get post tag wise
    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }

}
