<?php

namespace GestorBackend;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function noticias(){
        return $this->hasMany('GestorBackend\Noticia');
    }

    public function roles()
    {
        return $this
            ->belongsToMany('GestorBackend\Role')
            ->withTimestamps();
    }

    public function RolesAutorizados($roles)
    {
        if ($this->tieneAlgunRol($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function tieneAlgunRol($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $rol) {
                if ($this->tieneRol($rol)) {
                    return true;
                }
            }
        } else {
            if ($this->tieneRol($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function tieneRol($rol)
    {
        if ($this->roles()->where('name', $rol)->first()) {
            return true;
        }
        return false;
    }

}
