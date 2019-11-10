<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
}

    public function causes(){
        return $this->belongsTo('App\Cause');
    }
}
