@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item">Permissão</li>
			<li class="breadcrumb-item active">Cadastro</li>
		</ol>
	</div>
	<form action="{{ route('permission.store') }}" method="POST">
		@csrf
		<div class="card">
			<div class="card-body row">
				<div class="form-group col-md-12 @if ($errors->has('per_name')) has-error @endif">
					<Label class="control-label"><strong>Permissão</strong></Label>
					<div class="controls">
						<input type="text" name="per_name" class="form-control" id="" value="{{ old('per_name') }}">
						@if ($errors->has('per_name')) <p class="help-block">{{ $errors->first('per_name') }}</p> @endif
					</div>
				</div>
				<div class="form-group col-md-12 @if ($errors->has('per_label')) has-error @endif">
					<Label class="control-label"><strong>Descrição</strong></Label>
					<div class="controls">
						<input type="text" name="per_label" class="form-control" id="" value="{{ old('per_label') }}">
						@if ($errors->has('per_label')) <p class="help-block">{{ $errors->first('per_label') }}</p> @endif
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


