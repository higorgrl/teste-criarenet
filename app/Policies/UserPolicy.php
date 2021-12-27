<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $logado)
    {
        if ($logado->roles[0]->rol_id == 2) {
            return true;
        }
        return false;
    }

    public function view(User $logado, User $user)
    {
        if ($logado->roles[0]->rol_id == 2) {
            return true;
        }
        return false;
    }

    // public function create(?User $user)
    // {
    //     return true;
    // }

    public function update(User $logado, User $user)
    {
        if ($user->roles[0]->rol_id == 2)
            return false;
        if ($logado->roles[0]->rol_id == 2) {
            return true;
        }
        return false;
    }

    public function delete(User $logado, User $user)
    {
        if ($user->roles[0]->rol_id == 2)
            return false;
        if ($logado->roles[0]->rol_id == 2) {
            return true;
        }
        return false;
    }

    public function restore(User $logado)
    {
        if ($logado->roles[0]->rol_id == 2) {
            return true;
        }
        return false;
    }

    public function forceDelete(User $logado, User $user)
    {
        if ($logado->roles[0]->rol_id == 2) {
            return true;
        }
        return false;
    }
}