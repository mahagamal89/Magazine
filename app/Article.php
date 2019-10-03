<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'article_title', 'article_content', 'user_id', 'magazine_id', 'article_cover', 'is_active', 'views'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
