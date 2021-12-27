@extends('layouts.app')

@section('content')
    {{-- <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Gerenciamento de Permissões </h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">Permissões</a></li>
            <li class="breadcrumb-item active">Deletados</li>
        </ol>
        </div>
	</div> --}}
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Permissões Deletadas</h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('permission.index')}}">Lista</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($permissions))
                        @foreach ($permissions as $permission)
                            <tr>			
                                <td>{{$permission->per_name}}</td>                              
                                <td class="text-center">
                                    <div class="btn-group " >                              
                                        <form action="{{route('permission.restore', ['permission'=>$permission->per_id])}}" method="POST">
                                            @csrf
                                            <input type="submit"  class="btn btn-danger" value="Restaurar">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
                
        <div class="card-footer clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info"
                        id="example2_info" role="status" aria-live="polite">
                        @if($permissions->count() != 0)
                            Exibindo {{$permissions->firstItem()}} a {{$permissions->lastItem()}}  de {{$permissions->total()}} dados encontrados
                        @else
                            Nenhuma dado cadastrado.
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    {{ $links->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
