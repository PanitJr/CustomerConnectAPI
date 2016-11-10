<?php

namespace App\Object\Profile;

use App\Object\CC\Entity;

class Profile extends Entity
{
	public $table = 'cc_profiles';
   	
    public $timestamps = false;

    public $object_name = "Profile";

    public $columns_list = [
    	'description'=>'description'
    ];
}


