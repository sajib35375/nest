<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Get values for category post many to many relationship
    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    // Get values for tag post many to many relationship
    public function tags(){
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    // get user values for relationship one to many relationship
    public function user(){
        return $this->belongsTo('App\Models\Admin');
    }

}
