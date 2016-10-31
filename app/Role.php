<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
      * Set timestamps off
      */
    public $timestamps = false;

    public function users()
    {
    	return $this->hasMany('App\User','role_id');
    }
}
