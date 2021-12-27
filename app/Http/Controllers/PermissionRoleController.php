<?php

namespace App\Http\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\PermissionRoleRepository;
use App\Models\Role;
use App\Models\PermissionRole;
use App\Http\Requests\PermissionRoleRequest;
use App\Models\User;

class PermissionRoleController extends Controller
{
    const ROUTE_VIEW = 'permissionRole';

    public function __construct(
        PermissionRoleRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $this->authorize('view-any', User::class);
        $user = PermissionRole::where('deleted_at', '=', null)->get();
        return view($this::ROUTE_VIEW . '.index', ['users' => $user]);
    }

    public function edit(User $user)
    {
        $this->authorize('view-any', User::class);
        $user =  $this->repository->where('id_User', '=', $user->id);
        $funcoes =  Role::all();
        return view($this::ROUTE_VIEW . '.edit', ['user_Role' => $user, 'funcoes' => $funcoes]);
    }

    public function update(PermissionRole $user, PermissionRoleRequest $request)
    {
        $this->authorize('view-any', User::class);
        $this->repository->update($request->all(), $user->id, 'id');
        return redirect()->route('User.show', ['user' => $user->id]);
    }
}
