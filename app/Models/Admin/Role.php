<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
    		'name',
    ];

    public function admins(){
		return $this->BelongsToMany('App\Models\Admin\Admin', 'role_admins');
    }
}
