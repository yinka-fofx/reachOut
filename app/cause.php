<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $guarded = [];

    //Table Name
    protected $table = 'causes';

    //primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = 'true';

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user()
    {

        $id= Auth::id();

        $likers = array();

        foreach($this->likes as $like):

            array_push($likers, $like->user_id);

        endforeach;

        if(in_array($id, $likers)){

            return true;

        } else {
            return false;
        }

    }

    public function isAFollower()
    {
        $users_id = $this->users->pluck("id")->toArray();
        // $auth_id = Auth::user()->id;
        $id= Auth::id();
        if(in_array($id, $users_id)){
            return true;
        }
        return false;
    }

}
