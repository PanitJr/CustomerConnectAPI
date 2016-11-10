<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $columns_list = [
        'Id'=>'id',
        'Name'=>'name',
        'Nickname'=>'nickname',
        'Email'=>'email',
        'Role'=>'role_id',
        'Supervisor'=>'supervisor_id',
        'Status'=>'status_id',
        'Profile'=>'profile_id',
        'Firstname'=>'firstname',
        'Lastname'=>'lastname',
    ];

//    public function roles()
//    {
//        return $this->belongsToMany('App\Role','users_roles');
//    }

    public function hasRole($check)
    {
        return in_array($check,array_fetch($this->roles->toArray(),'name'));        
    }

    public function assingRole($role)
    {
        $this->roles()->attach($role->id);
    }
    //
    public function roles()
    {
        return $this->hasOne('App\Role','id','role_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Object\profilewithpermission\profilewithpermission','id','profile_id');
    }

    public function status()
    {
        return $this->hasOne('App\Object\UserStatus\UserStatus','id','status_id');
    }

    public function supervisor(){
        return $this->hasOne('App\User','id','id');
    }
    //
}
