<?php

namespace GestorBackend;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
        'name','description'
    ];

    public function usuarios()
	{
	    return $this
	        ->belongsToMany('GestorBackend\User')
	        ->withTimestamps();
	}
}
