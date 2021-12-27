<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestão de Pessoas</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
		*  {
			margin:0;
			padding:0;
		}
		html, body {height:100%;}
		.geral {
			min-height:100%;
			position:relative;
		}
		footer {
			margin-left: 0;
			position:absolute;
			bottom:0;
			width:100%;
		}
		.footer {
			background: #fff;
			padding: 15px;
			color: #444;
			border-top: 1px solid #d2d6de;
		}
	</style>
</head>
<body>
    <div class="geral" id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Gestão de Pessoas
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @can('view-any', \App\Models\User::class)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('user.index') }}"> Usuários </a>
                        </li>
                        @endcan
                        @can('view-any', \App\Models\Role::class)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('role.index') }}"> Perfis </a>
                        </li>
                        @endcan

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Logar</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Cadastrar</a>
                                </li>
                            @endif
						@else
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{ Auth::user()->usr_name }}
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{route('user.password.edit')}}">Editar Senha</a>
							</div>
						</li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
			@yield('content')
			<br>
			<br>
		</main>
		
		<footer class="footer">
			<div class="container">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0
				</div>
				<strong>© Copyright 2019 - 2021 Todos os direitos reservados.</strong>
			</div>
		</footer>

	</div>
	<script>
		function apagar(){
			// var r = confirm("Tem certeza quer apagar esse dado? Isso apaga as inforações que necessitam dela");
			console.log('Tem certeza quer apagar esse dado? Isso apaga as inforações que necessitam dela')
			// if(!r)
			// 	e.preventDefault()
			
		}
	</script>
</body>
</html>
