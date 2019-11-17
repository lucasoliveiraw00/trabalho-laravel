<!-- dashboard.blade.php -->
@extends('site.templates.master')

@section('conteudo')	

<div class="contact text-center">
	<h1 class="title">Entre em Contato</h1>
	<h2 class="sub-title">Tenha todas as suas Dúvidas esclarecidas pela nossa equipe.</h2>

	<form class="form form-contact">
		<input type="text" name="nome" placeholder="Nome:">
		<input type="email" name="email" placeholder="E-mail:">
		<input type="text" name="assunto" placeholder="Assunto:">
		<textarea placeholder="Mensagem:" name="mensagem"></textarea>

		<button class="btn-contact">Enviar</button>
	</form>
</div>

@endsection
