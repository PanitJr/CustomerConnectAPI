<?php

namespace App\Object\Profile;

use App\Object\CC\Entity;
use App\Object\ProfilePermission\ProfilePermission;

class Profile extends Entity
{
	public $table = 'cc_profiles';
   	
    public $timestamps = false;

    public $object_name = "Profile";

    public $columns_list = [
    	'profile'=>'profile'
    ];
//    public function item()
//    {
//        return $this->hasMany(ProfilePermission::class,'expense id','id');
//    }

}


