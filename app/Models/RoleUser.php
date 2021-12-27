<?php

namespace App\Models;

class RoleUser extends BaseModel
{
    protected $table = 'roles_user';

    protected $primaryKey = 'rus_id';

    protected $fillable = [
        'rus_usr_id',
        'rus_rol_id',
    ];

    protected $searchable = [
        'rus_id'  => '=',
        'rus_usr_id'  => '=',
        'rus_rol_id'  => '=',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'rus_usr_id','usr_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'rus_rol_id','rol_id');
    }
}
