@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Pessoas</li>
        </ol>
    </div>
    <div class="card">
        <div class="card-header d-flex bd-highlight">
            <h3 class="card-title mr-auto bd-highlight">Lista de Pessoas</h3>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('pessoa.deletados') }}" class="btn btn-info" style="margin-right: 5px;">Pessoas Deletados</a>
                <a href="{{ route('pessoa.create') }}" class="btn btn-primary">Criar</a>
            </div>
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('pessoa.index')}}">
                <div class="row align-items-center">
                    <div class="form-group col-sm-2">
                        <label for="" class="font-weight-bold">Ordene:</label>
                        <select class="form-control" name="field">
                            <option value="created_at" @isset($_GET['field']) @if($_GET['field'] == "created_at") selected @endif @endisset>Criação</option>
                            <option value="pes_nome" @isset($_GET['field']) @if($_GET['field'] == "pes_nome") selected @endif @endisset>Pessoas</option>
                        </select>
                        {!! $errors->first('field','<span style="color:red" class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="" class="font-weight-bold">Método</label>
                        <select class="form-control" name="sort" required>
                            <option value="asc" @isset($_GET['sort']) @if($_GET['sort'] == "asc") selected @endif @endisset>Ascendente</option>
                            <option value="desc" @isset($_GET['sort']) @if($_GET['sort'] == "desc") selected @endif @endisset>Descendente</option>
                        </select>
                        {!! $errors->first('sort','<span style="color:red" class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="" class="font-weight-bold">Quantidade</label>
                        <select class="form-control" name="quantidade">                        
                            <option value="20" @if($pessoas->perPage() == "20") selected @endif>20</option>
                            <option value="40" @if($pessoas->perPage() == "40") selected @endif>40</option> 
                            <option value="60" @if($pessoas->perPage() == "60") selected @endif>60</option>                           
                            <option value="100" @if($pessoas->perPage() == "100") selected @endif>100</option>                           
                        </select>
                        {!! $errors->first('quantidade','<span style="color:red" class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="" class="font-weight-bold"></label>
                        <a href="{{route('pessoa.index')}}" class="btn btn-info">Limpar</a>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="" class="font-weight-bold"></label>
                        <input type="submit" class="form-control btn btn-primary " value="Listar">
                    </div>
                </div>
            </form> 
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!is_null($pessoas))
                        @foreach ($pessoas as $pessoa)
                            <tr>	
                                <td style="vertical-align:middle">{{$pessoa->pes_id}}</td>                              
                                <td style="vertical-align:middle">{{$pessoa->pes_nome}}</td>                          
                                <td style="vertical-align:middle">{{$pessoa->pes_cpf}}</td>                          
                                <td style="vertical-align:middle">{{$pessoa->pes_email}}</td>                          
                                <td style="vertical-align:middle">{{$pessoa->pes_telefone}}</td>                          
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('pessoa.edit', ['pessoa'=>$pessoa->pes_id])}}" class="btn btn-warning" style="margin-right: 5px;">Editar</a> 
                                        <form action="{{route('pessoa.delete', ['pessoa'=>$pessoa->pes_id])}}" method="POST">
                                            @csrf
                                            <input type="submit"  class="btn btn-danger" value="Apagar" onclick="return confirm('Tem certeza que deseja deletar esse registro?'); return false;">
                                        </form>
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
                        id="example2_info" role="status" aria-live="polite">
                        @if($pessoas->count() != 0)
                            Exibindo {{$pessoas->firstItem()}} a {{$pessoas->lastItem()}}  de {{$pessoas->total()}} dados encontrados
                        @else
                            Nenhuma dado cadastrado.
                        @endif
                    </div>
                </div>
                {{ $links->links() }}   
            </div>
        </div>
    </div>
</div>
@stop