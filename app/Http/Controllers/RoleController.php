<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
  const ROUTE_VIEW = 'role';
  const ROUTE_URL  = 'role';

  protected $repository;

  public function __construct(RoleRepository $repository)
  {
    $this->repository = $repository;
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    //  $this->authorize('view-any', Role::class);
    $roles = $this->repository->paginate($request->all());
    $links = $roles->appends($request->except('page'));
    return view($this::ROUTE_VIEW . '.index', ['roles' => $roles, 'links' => $links]);
  }

  public function edit(Role $role)
  {
    // $this->authorize('update', $role);
    return view($this::ROUTE_VIEW . '.edit', compact('role'));
  }

  public function update(Role $role, RoleRequest $request)
  {
    // $this->authorize('update', $role);
    $this->repository->update($request->all(), $role->rol_id, 'rol_id');
    return redirect()->route($this::ROUTE_URL . '.index');
  }
}
