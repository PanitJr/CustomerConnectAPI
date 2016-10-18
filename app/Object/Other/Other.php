<?php

namespace App\Object\Other;

use App\Object\CC\Entity;

class Other extends Entity
{
	public $table = 'cc_others';
   	
    public $timestamps = false;

    public $object_name = "Other";

    public $columns_list = [
    	'other_name'=>'othername'
    ];
}


