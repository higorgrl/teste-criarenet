<?php

namespace App\Repositories;

use App\Models\PermissionRole;

class PermissionRoleRepository extends BaseRepository
{
    public function __construct(PermissionRole $model)
    {
        parent::__construct($model);
    }

    public function delete($id)
    {
        parent::delete($id);
    }

    public function restore($id)
    {
        parent::restore($id);
    }
}
