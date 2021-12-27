@extends('layouts.app')

@section('content')
<script type="text/javascript">
	function mascara(pes_telefone){ 
		if(pes_telefone.value.length == 0)
			pes_telefone.value = '(' + pes_telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
		if(pes_telefone.value.length == 3)
			pes_telefone.value = pes_telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.

		if(pes_telefone.value.length == 10)
			pes_telefone.value = pes_telefone.value + '-'; //quando o campo já tiver 9 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
	}
</script>
<div class="container">
	<div class="">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('pessoa.index') }}">Pessoas</a></li>
			<li class="breadcrumb-item active">Cadastro</li>
		</ol>
	</div>	
	<form action="{{ route('pessoa.store') }}" method="POST">
		@csrf
		<div class="card">
			<div class="card-body row">
				<div class="form-group col-md-6 @if ($errors->has('pes_nome')) has-error @endif">
					<Label class="control-label"><strong>Nome completo*</strong></Label>
					<div class="controls">
						<input type="text" name="pes_nome" class="form-control" id="" value="{{ old('pes_nome') }}">
						@if ($errors->has('pes_nome')) <p class="help-block">{{ $errors->first('pes_nome') }}</p> @endif
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('pes_cpf')) has-error @endif">
					<Label class="control-label"><strong>CPF*</strong></Label>
					<div class="controls">
						<input type="text" name="pes_cpf" maxlength="11" class="form-control" id="" value="{{ old('pes_cpf') }}">
						@if ($errors->has('pes_cpf')) <p class="help-block">{{ $errors->first('pes_cpf') }}</p> @endif
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('pes_telefone')) has-error @endif">
					<Label class="control-label"><strong>Telefone*</strong></Label>
					<div class="controls">
						<input type="text" name="pes_telefone" maxlength="15" class="form-control" id="" value="{{ old('pes_telefone') }}" onkeypress="mascara(this)" placeholder="(99) 99999-9999">
						@if ($errors->has('pes_telefone')) <p class="help-block">{{ $errors->first('pes_telefone') }}</p> @endif
					</div>
				</div>
				<div class="form-group col-md-6 @if ($errors->has('pes_email')) has-error @endif">
					<Label class="control-label"><strong>Email*</strong></Label>
					<div class="controls">
						<input type="text" name="pes_email" class="form-control" id="" value="{{ old('pes_email') }}">
						@if ($errors->has('pes_email')) <p class="help-block">{{ $errors->first('pes_email') }}</p> @endif
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


