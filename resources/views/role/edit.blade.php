@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('role.index') }}">Perfil</a></li>
			<li class="breadcrumb-item active">Edição</li>
		</ol>
	</div>
	<form action="{{ route('role.update',['role'=>$role->rol_id]) }}" method="post">
		@method('PUT')
		@csrf
		<div class="card">
			<div class="card-body row">
				<div class="form-group col-md-12 @if ($errors->has('rol_name')) has-error @endif">
					<Label class="control-label">Perfis</Label>
					<div class="controls">
						<input type="text" name="rol_name" class="form-control" id="" value="{{ $role->rol_name }}">
						{!! $errors->first('rol_name','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-12 @if ($errors->has('rol_label')) has-error @endif">
					<Label class="control-label">Descrição</Label>
					<div class="controls">
						<input type="text" name="rol_label" class="form-control" id="" value="{{ $role->rol_label }}">
						{!! $errors->first('rol_label','<span style="color:red" class="help-block">:message</span>') !!}                    
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
