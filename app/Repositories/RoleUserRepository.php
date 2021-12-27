<?php

namespace App\Repositories;

use App\Models\RoleUser;

class RoleUserRepository extends BaseRepository
{
    public function __construct(RoleUser $model)
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
