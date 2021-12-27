<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PessoaRepository;
use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;

class PessoaController extends Controller
{
  const ROUTE_VIEW = 'pessoa';
  const ROUTE_URL  = 'pessoa';

  protected $repository;

  public function __construct(PessoaRepository $repository)
  {
    $this->repository = $repository;
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $this->authorize('view-any', Pessoa::class);
    $pessoas = $this->repository->paginate($request->all());
    $links = $pessoas->appends($request->except('page'));
    return view($this::ROUTE_VIEW . '.index', ['pessoas' => $pessoas, 'links' => $links]);
  }

  public function create()
  {
    $this->authorize('create', Pessoa::class);
    return view($this::ROUTE_VIEW . '.create');
  }

  public function store(PessoaRequest $request)
  {
    $this->authorize('create', Pessoa::class);
    $this->repository->create($request->all());
    return redirect()->route($this::ROUTE_URL . '.index');
  }

  public function edit(Pessoa $pessoa)
  {
    $this->authorize('update', $pessoa);
    return view($this::ROUTE_VIEW . '.edit', compact('pessoa'));
  }

  public function update(Pessoa $pessoa, PessoaRequest $request)
  {
    $this->authorize('update', $pessoa);
    $this->repository->update($request->all(), $pessoa->pes_id, 'pes_id');
    return redirect()->route($this::ROUTE_URL . '.index');
  }

  public function delete(Pessoa $pessoa, Request $request)
  {
    $this->authorize('delete', $pessoa);
    $this->repository->delete($pessoa->pes_id);
    return redirect()->back();
  }

  public function deletados(Request $request)
  {
    $this->authorize('view-any', Pessoa::class);
    $pessoas = $this->repository->deletados($request->all());
    $links = $pessoas->appends($request->except('page'));
    return view($this::ROUTE_VIEW . '.deletados', compact('pessoas', 'links'));
  }

  public function restore($pessoa, Request $request)
  {
    $this->authorize('restore', Pessoa::class);
    $this->repository->restore($pessoa);
    return redirect()->back();
  }
}
