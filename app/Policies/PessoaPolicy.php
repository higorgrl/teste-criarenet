<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pessoa;

class PessoaPolicy
{
    public function viewAny(User $logado)
    {        
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;       
    }
    
    public function view(User $logado, Pessoa $pessoa)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;       
    }

    public function create(User $logado)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false; 
    }

    public function update(User $logado, Pessoa $pessoa)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;
    }

    public function delete(User $logado, Pessoa $pessoa)
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

    public function forceDelete(User $logado, Pessoa $pessoa)
    {
        if ($logado->roles[0]->rol_id == 2){
            return true;
        }
        return false;
    }    

}
