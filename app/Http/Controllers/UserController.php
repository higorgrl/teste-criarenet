<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\RoleUserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;//criptografia
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const ROUTE_VIEW = 'user';
    const ROUTE_URL = 'user';

    public function __construct(UserRepository $repository, RoleUserRepository $roleUserRepository)
    {
        $this->repository = $repository;
        $this->roleUserRepository = $roleUserRepository;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->authorize('view-any', User::class);
        $users = $this->repository->paginate($request->all());
        $links = $users->appends($request->except('page'));
        return view($this::ROUTE_VIEW . '.index', ['users' => $users, 'links' => $links]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roleUser = $this->roleUserRepository->where('rus_usr_id', '=', $user->usr_id)->first();
        $roles =  Role::all();
        return view($this::ROUTE_VIEW . '.edit', ['roleUser' => $roleUser, 'roles' => $roles]);
    }

    public function update(RoleUser $roleUser, UserRequest $request)
    {
        $this->authorize('update', $roleUser->user);
        $this->roleUserRepository->update($request->all(), $roleUser->rus_id, 'rus_id');
        return redirect()->route($this::ROUTE_VIEW . '.index');
    }

    public function passwordEdit()
    {
        return view($this::ROUTE_VIEW . '.password');
    }
  
    public function passwordUpdate(PasswordRequest $request)
    {
        if(Hash::check($request->senha_atual, Auth::user()->password)){
            $user = $this->repository->password($request->password);
            return redirect()->back()->with(['success' => "Alterado com sucesso"]);
        }else{
            return redirect()->back()->with(['error'=> 'Senha Inválida']);
        }
    }

    public function delete(User $user, Request $request)
    {
        $this->authorize('delete', $user);
        $this->repository->delete($user->usr_id);
        return redirect()->back();
    }

    public function deletados(Request $request)
    {
        $this->authorize('view-any', User::class);
        $users = $this->repository->deletados($request->all());
        $links = $users->appends($request->except('page'));
        return view($this::ROUTE_VIEW . '.deletados', compact('users', 'links'));
    }

    public function restore($user, Request $request)
    {
        $this->authorize('restore', User::class);
        $this->repository->restore($user);
        return redirect()->back();
    }
}
