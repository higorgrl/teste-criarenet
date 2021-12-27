@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('pessoa.index') }}">Pessoas</a></li>
			<li class="breadcrumb-item active">Edição</li>
		</ol>
	</div>
	<form action="{{ route('pessoa.update',['pessoa'=>$pessoa->pes_id]) }}" method="post">
		@method('PUT')
		@csrf
		<div class="card">
			<div class="card-body row">
				<div class="form-group col-md-6 @if ($errors->has('pes_nome')) has-error @endif">
					<Label class="control-label">Nome completo*</Label>
					<div class="controls">
						<input type="text" name="pes_nome" class="form-control" id="" value="{{ $pessoa->pes_nome }}">
						{!! $errors->first('pes_nome','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('pes_cpf')) has-error @endif">
					<Label class="control-label">CPF*</Label>
					<div class="controls">
						<input type="text" name="pes_cpf" class="form-control" id="" value="{{ $pessoa->pes_cpf }}">
						{!! $errors->first('pes_cpf','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('pes_telefone')) has-error @endif">
					<Label class="control-label">Telefone*</Label>
					<div class="controls">
						<input type="text" name="pes_telefone" class="form-control" id="" value="{{ $pessoa->pes_telefone }}">
						{!! $errors->first('pes_telefone','<span style="color:red" class="help-block">:message</span>') !!}                    
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('pes_email')) has-error @endif">
					<Label class="control-label">Email*</Label>
					<div class="controls">
						<input type="text" name="pes_email" class="form-control" id="" value="{{ $pessoa->pes_email }}">
						{!! $errors->first('pes_email','<span style="color:red" class="help-block">:message</span>') !!}                    
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
