@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Perfis</a></li>
			<li class="breadcrumb-item active">Edição</li>
		</ol>
	</div>
	<form action="{{ route('user.update',['roleUser'=>$roleUser->rus_id]) }}" method="post">
		@method('PUT')
		@csrf
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i>{{ $roleUser->user->usr_email }}</i> -->  <i>{{ $roleUser->role->rol_name }}</i>
			</div>
			<div class="card-body row">
				<div class="form-group col-md-12 @if ($errors->has('rus_rol_id')) has-error @endif">
					<Label class="control-label">Troque o Perfil</Label>
					<div class="controls">
						<select class="form-control" name="rus_rol_id" required>
							@foreach ($roles as $role)
								<option value="{{$role->rol_id}}" @if($roleUser->role->rol_id === $role->rol_id) selected @endif sele>{{$role->rol_name}}</option>
							@endforeach
					</select>
					{!! $errors->first('rus_rol_id','<span style="color:red" class="help-block">:message</span>') !!}               
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
