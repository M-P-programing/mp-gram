<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    // Relation many to one of comments to user
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    // Relation many to one of images to user
    public function image(){
    	return $this->belongsTo('App\Image', 'image_id');
    }
}
