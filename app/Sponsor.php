<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    protected $fillable = ['name', 'logo_path'];

    public function magazines(){
        return $this->belongsToMany('App\Magazine');
    }
}
