<?php

namespace App\Models;

class Role extends BaseModel
{
    protected $table = 'roles';

    protected $primaryKey = 'rol_id';

    protected $fillable = [
        'rol_name',
        'rol_label',
    ];

    protected $searchable = [
        'rol_id' => '=',
        'rol_name' => 'like',
        'rol_label' => 'like',
    ];
    
    public function users()
    {
        return $this->belongsToMany('App\Models\User','roles_user', 'rus_rol_id', 'rus_usr_id');
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\Permission','permissions_roles', 'pro_rol_id', 'pro_per_id');
    }
}
