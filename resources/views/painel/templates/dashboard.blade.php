<!DOCTYPE html>
<html>

<head>
	<title>Painel | Dashboard</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!--Fonts-->
	<link rel="stylesheet" href="{{url('assets-painel/css/font-awesome.min.css')}}">

	<!--CSS Person-->
	<link rel="stylesheet" href="{{url('assets-painel/css/webdevalfa.css')}}">
	<link rel="stylesheet" href="{{url('assets-painel/css/webdevalfa-reset.css')}}">

	<!--Favicon-->
	<link rel="icon" type="image/png" href="{{url('assets-painel/imgs/favicon.png')}}">
</head>

<body>
	<section class="menu">
		<div class="logo">
			<img src="{{url('assets-painel/imgs/icone-alfa.png')}}" alt="webdevalfa" class="logo-painel">
		</div>
		<div class="list-menu">
			<ul class="menu-list">
				<li>
					<a href="{{route('painelHome.index')}}">
						<i class="fa fa-home" aria-hidden="true"></i>
						Home
					</a>
				</li>
				<li>
					<a href="{{route('usuarios.index')}}">
						<i class="fa fa-user" aria-hidden="true"></i>
						Usuários
					</a>
				</li>
				<li>
					<a href="{{route('categorias.index')}}">
						<i class="fa fa-id-card" aria-hidden="true"></i>
						Categorias
					</a>
				</li>
				<li>
					<a href="{{route('posts.index')}}">
						<i class="fa fa-fort-awesome" aria-hidden="true"></i>
						Posts
					</a>
				</li>
			</ul>
		</div>
	</section>
	<section class="content">
		<div class="top-dashboard">
			<div class="dropdown user-dash">
				<div class="dropdown-toggle" id="dropDownCuston" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					@if ( isset(Auth::user()->image) )
					<img src='{{URL::asset('/assets/uploads/users/'.Auth::user()->image)}}' alt="{{Auth::user()->name}}" class="user-dashboard img-circle">
					@else
					<img src="{{url('assets-painel/imgs/no-image.png')}}" alt="Jaime Vendrame" class="user-dashboard img-circle">
					@endif
					<p class="user-name">{{Auth::user()->name}}</p>
					<span class="caret"></span>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
				<ul class="dropdown-menu dp-menu" aria-labelledby="dropDownCuston">
					<li><a href="#">Perfil</a></li>
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content-ds">
			<div class="bred">
				<a href="" class="bred">Home ></a> <a href="" class="bred">Dashboard</a>
			</div>
			@yield('content')
		</div>
	</section>

	<!--jQuery-->
	<script src="js/jquery-3.1.1.min.js"></script>
	<!-- jS Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	@stack('js')
</body>

</html>