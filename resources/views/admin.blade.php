@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active">Painel de Controle</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-md-4">
			<caixa quantidade="{{$Pessoas}}" titulo="Lista de Pessoas" url="{{route('pessoa.index')}}" cor=" #6cb2eb" icone="ion-android-folder-open"></caixa>
		</div>
	</div>
</div>
@endsection





