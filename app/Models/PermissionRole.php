<?php

namespace App\Models;

class PermissionRole extends BaseModel
{
    protected $table = 'permissions_roles';

    protected $primaryKey = 'pro_id';

    protected $fillable = [
        'pro_per_id',
        'pro_rol_id',
    ];
}
