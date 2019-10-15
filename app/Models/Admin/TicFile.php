<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TicFile extends Model
{
    //
    protected $table = 'tic_files'; 
    protected $fillable = [
    	'name',
    ];
}
