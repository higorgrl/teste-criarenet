@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('role.index') }}">Perfil</a></li>
			<li class="breadcrumb-item active">Deletados</li>
		</ol>
	</div>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="card-title mr-auto bd-highlight">Lista de Perfis Deletadas</h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active pull-right bd-highlight" href="{{route('role.index')}}">Lista</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($roles))
                        @foreach ($roles as $role)
                            <tr>			
                                <td>{{$role->rol_id}}</td>                              
                                <td>{{$role->rol_name}}</td>                              
                                <td class="text-center">
                                    <div class="btn-group " >                              
                                        <form action="{{route('role.restore', ['role'=>$role->rol_id])}}" method="POST">
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
                        @if($roles->count() != 0)
                            Exibindo {{$roles->firstItem()}} a {{$roles->lastItem()}}  de {{$roles->total()}} dados encontrados
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
