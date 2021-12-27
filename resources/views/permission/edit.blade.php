@extends('layouts.app')

@section('content')
{{-- <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Edição de Permissão</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">Permissãos</a></li>
        <li class="breadcrumb-item active">Edição</li>
      </ol>
    </div>
</div> --}}
<div class="container">
	<form action="{{ route('permission.update',['permission'=>$permission->per_id]) }}" method="post">
		@method('PUT')
		@csrf
		<div class="card">
			<div class="card-body row">
				<div class="form-group col-md-12 @if ($errors->has('per_name')) has-error @endif">
					<Label class="control-label">Permissãos</Label>
					<div class="controls">
						<input type="text" name="per_name" class="form-control" id="" value="{{ $permission->per_name }}">
						{!! $errors->first('per_name','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-12 @if ($errors->has('per_label')) has-error @endif">
					<Label class="control-label">Descrição</Label>
					<div class="controls">
						<input type="text" name="per_label" class="form-control" id="" value="{{ $permission->per_label }}">
						{!! $errors->first('per_label','<span style="color:red" class="help-block">:message</span>') !!}                    
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
