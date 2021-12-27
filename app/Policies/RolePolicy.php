<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;

class RolePolicy
{
    public function viewAny(User $logado)
    {        
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;       
    }
    
    public function view(User $logado, Role $role)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;       
    }

    public function create(User $logado)
    {
        return true;
    }

    public function update(User $logado, Role $role)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;
    }

    public function delete(User $logado, Role $role)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;       
    }

    public function restore(User $logado)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;
    }

    public function forceDelete(User $logado, Role $role)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;
    }    

}
