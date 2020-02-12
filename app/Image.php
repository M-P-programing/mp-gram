<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';

    // Relation one to many of image to comments
    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    // Relation one to many of image to likes
    public function likes(){
    	return $this->hasMany('App\Like');
    }

    // Relation many to one of images to user
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
