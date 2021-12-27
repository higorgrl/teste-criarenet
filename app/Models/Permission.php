<?php

namespace App\Models;

class Permission extends BaseModel
{
    protected $table = 'permissions';

    protected $primaryKey = 'per_id';

    protected $fillable = [
        'per_name',
        'per_label',
    ];
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','permissions_roles', 'pro_per_id', 'pro_rol_id');
    }
}
