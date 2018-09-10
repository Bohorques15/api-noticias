<?php

namespace GestorBackend;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
        'name','description'
    ];

    public function users()
	{
	    return $this
	        ->belongsToMany('GestorBackend\User')
	        ->withTimestamps();
	}
}
