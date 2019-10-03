<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
      'username', 'comment_id', 'reply_content', 'is_active'
    ];
    
    public function comment()
    {
      return $this->belongsTo('App\Comment');
    }

}
