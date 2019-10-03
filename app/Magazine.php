<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{

    protected $fillable = [
        'magazine_name', 'is_active', 'pdf_path', 'channel_id', 'cover_path'
    ];
    public function articles(){
        return $this->hasMany('App\Article');
    }
    public function channel(){
        return $this->belongsTo('App\Channel');
    }
    public function sponsors(){
        return $this->belongsToMany('App\Sponsor');
    }
}
