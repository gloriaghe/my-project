<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'image', 'description'
    ];
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
