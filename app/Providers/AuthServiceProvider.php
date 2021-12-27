<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Permission;
use App\Models\Pessoa;
use App\Models\Role;
use App\Policies\UserPolicy;
use App\Policies\PessoaPolicy;
use App\Policies\RolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::Class => UserPolicy::Class,
        Pessoa::Class => PessoaPolicy::Class,
        Role::Class => RolePolicy::Class,

    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
