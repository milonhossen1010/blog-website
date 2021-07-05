<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Post id attach
    public function posts(){
        $this->belongsToMany('App\Models\Post');
    }
}
