@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('role.index') }}">Perfil</a></li>
			<li class="breadcrumb-item active">Cadastro</li>
		</ol>
	</div>
	<form action="{{ route('role.store') }}" method="POST">
		@csrf
		<div class="card">
			<div class="card-body row">
				<div class="form-group col-md-12 @if ($errors->has('rol_name')) has-error @endif">
					<Label class="control-label"><strong>Perfil</strong></Label>
					<div class="controls">
						<input type="text" name="rol_name" class="form-control" id="" value="{{ old('rol_name') }}">
						@if ($errors->has('rol_name')) <p class="help-block">{{ $errors->first('rol_name') }}</p> @endif
					</div>
				</div>
				<div class="form-group col-md-12 @if ($errors->has('rol_label')) has-error @endif">
					<Label class="control-label"><strong>Descrição</strong></Label>
					<div class="controls">
						<input type="text" name="rol_label" class="form-control" id="" value="{{ old('rol_label') }}">
						@if ($errors->has('rol_label')) <p class="help-block">{{ $errors->first('rol_label') }}</p> @endif
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-md btn-primary pull-right">Salvar</button>
			</div>
		</div>
	</form>
</div>
@stop


