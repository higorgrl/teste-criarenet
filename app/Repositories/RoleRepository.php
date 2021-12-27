<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository
{
    public function __construct(Role $model)
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
