<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Author name get
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Category attach
    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    //Tag attach
    public function tags(){
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
}
