@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item active">Perfil</li>
		</ol>
	</div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Perfis</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Função</th>
                        {{-- <th class="text-center">Ações</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($roles))
                        @foreach ($roles as $role)
                            <tr>			
                                <td style="vertical-align:middle">{{$role->rol_id}}</td>                              
                                <td style="vertical-align:middle">{{$role->rol_name}}</td>                              
                                <td style="vertical-align:middle">{{$role->rol_label}}</td>                              
                                {{-- <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('role.edit', ['role'=>$role->rol_id])}}" class="btn btn-primary" style="margin-right: 5px;">Editar</a> 
                                        <form action="{{route('role.delete', ['role'=>$role->rol_id])}}" method="POST">
                                            @csrf
                                            <input type="submit"  class="btn btn-danger" value="Apagar">
                                        </form>
                                    </div>
                                </td> --}}
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
                        id="example2_info" role="status" aria-live="polite">
                        @if($roles->count() != 0)
                            Exibindo {{$roles->firstItem()}} a {{$roles->lastItem()}}  de {{$roles->total()}} dados encontrados
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