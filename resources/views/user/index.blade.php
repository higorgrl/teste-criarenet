@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item active">Usuários</li>
		</ol>
	</div>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="card-title mr-auto bd-highlight">Lista de Usuários</h3>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('user.deletados') }}" class="btn btn-info">Usuários Deletados</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($users))
                        @foreach ($users as $user)
                            <tr>			
                                <td style="vertical-align:middle">{{$user->usr_id}}</td> 
                                <td style="vertical-align:middle">{{$user->usr_name}}</td> 
                                <td style="vertical-align:middle">{{$user->usr_email}}</td> 
                                <td style="vertical-align:middle">{{$user->roles[0]->rol_name}}</td>                              
                             
                                <td class="text-center">
                                    <div class="btn-group">
                                        @can('update', $user)
                                        <a href="{{route('user.edit', ['user'=>$user->usr_id])}}" class="btn btn-warning" style="margin-right: 5px;">Editar</a>
                                        @endcan
                                        @can('delete', $user)
                                        <form action="{{route('user.delete', ['user'=>$user->usr_id])}}" method="POST">
                                            @csrf
                                            <input type="submit"  class="btn btn-danger" value="Apagar">
                                        </form>
                                        @endcan 
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
                
        <div class="card-footer clearfix" align="center">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info"
                        id="example2_info" user="status" aria-live="polite">
                        @if($users->count() != 0)
                            Exibindo {{$users->firstItem()}} a {{$users->lastItem()}}  de {{$users->total()}} dados encontrados
                        @else
                            Nenhuma dado cadastrado.
                        @endif
                    </div>
                </div>
                {{ $links->links() }}
				<style>
					nav svg{
						height: 20px;
					}
				</style>
            </div>
        </div>
    </div>
</div>
 
@stop