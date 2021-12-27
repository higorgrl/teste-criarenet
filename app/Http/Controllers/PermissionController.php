<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PermissionRepository;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
  const ROUTE_VIEW = 'permission';
  const ROUTE_URL  = 'permission';

  protected $repository;

  public function __construct(PermissionRepository $repository)
  {
    $this->repository = $repository;
    // $this->middleware('auth');
  }

  public function index(Request $request)
  {
    //  $this->authorize('view-any', Permission::class);
    $permissions = $this->repository->paginate($request->all());
    $links = $permissions->appends($request->except('page'));
    return view($this::ROUTE_VIEW . '.index', ['permissions' => $permissions, 'links' => $links]);
  }

  public function create()
  {
    //  $this->authorize('create', Permission::class);
    return view($this::ROUTE_VIEW . '.create');
  }

  public function store(PermissionRequest $request)
  {
    //  $this->authorize('create', Permission::class);
    $this->repository->create($request->all());
    return redirect()->route($this::ROUTE_URL . '.index');
  }

  public function edit(Permission $permission)
  {
    // $this->authorize('update', $permission);
    return view($this::ROUTE_VIEW . '.edit', compact('permission'));
  }

  public function update(Permission $permission, PermissionRequest $request)
  {
    // $this->authorize('update', $permission);
    $this->repository->update($request->all(), $permission->per_id, 'per_id');
    return redirect()->route($this::ROUTE_URL . '.index');
  }

  public function delete(Permission $permission, Request $request)
  {
    // $this->authorize('delete', $permission);
    $this->repository->delete($permission->per_id);
    return redirect()->route($this::ROUTE_URL . '.index');
  }

  public function deletados(Request $request)
  {
    //  $this->authorize('view-any', Permission::class);
    $permissions = $this->repository->deletados($request->all());
    $links = $permissions->appends($request->except('page'));
    return view($this::ROUTE_VIEW . '.deletados', compact('permissions', 'links'));
  }

  public function restore($permission, Request $request)
  {
    //  $this->authorize('restore', Permission::class);
    $this->repository->restore($permission);
    return redirect()->route($this::ROUTE_URL . '.index');
  }
}
