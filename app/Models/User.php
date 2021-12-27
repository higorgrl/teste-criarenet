<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Permission;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'usr_id';

    protected $fillable = [
        'usr_name',
        'usr_email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $searchable = [
        'usr_id' => '=',
        'usr_name' => 'like',
        'usr_email' => 'like',
    ];
    
    public function searchable()
    {
        return $this->searchable;
    }

    public function hasPermission(Permission $permission){
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles){
        if(is_array($roles) || is_object($roles)){
            return !! $roles->intersect($this->roles)->count();

        }        
        return $this->roles->contains('rol_name',$roles);
    }

    public function roles()
    {
        return $this->belongsToMany("App\Models\Role",'roles_user', 'rus_usr_id', 'rus_rol_id');
    }


}
