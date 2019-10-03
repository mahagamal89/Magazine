<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'username', 'article_id', 'comment_content', 'is_active'
    ];
    public function article()
    {
      return $this->belongsTo('App\Article');
    }
    public function replies(){
      return $this->hasMany('App\Reply');
    }

}
