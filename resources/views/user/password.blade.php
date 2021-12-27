@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item active">Editar Senha</li>
		</ol>
	</div>

	@if(session()->get('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{ session('success') }}<br>
		</div>
	@endif

	@if(session()->get('error'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{ session('error') }}<br>
		</div>
	@endif

	<form action="{{route('user.password.update')}}" method="post">
		@method('PUT')
		@csrf
		<div class="card">
			<div class="card-header d-flex bd-highlight">
				<h3 class="card-title mr-auto bd-highlight">Editar Senha</h3>
			</div>
			<div class="card-body">
				<div class="form-group col-md-6 @if ($errors->has('senha_atual')) has-error @endif">
					<Label class="control-label">Senha atual</Label>
					<div class="controls">
						<input type="password" name="senha_atual" class="form-control" id="" value="">
						{!! $errors->first('senha_atual','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('password')) has-error @endif">
					<Label class="control-label">Nova senha</Label>
					<div class="controls">
						<input type="password" name="password" class="form-control" id="" value="">
						{!! $errors->first('password','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('password_confirmation')) has-error @endif">
					<Label class="control-label">Repetir senha</Label>
					<div class="controls">
						<input type="password" name="password_confirmation" class="form-control" id="" value="">
						{!! $errors->first('password_confirmation','<span style="color:red" class="help-block">:message</span>') !!}                    
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
