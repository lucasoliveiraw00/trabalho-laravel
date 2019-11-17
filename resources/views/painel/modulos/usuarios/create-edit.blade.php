<!-- dashboard.blade.php -->
@extends('painel.templates.dashboard')

@section('content')	

<div class="title-pg">
        <h1 class="title-pg">Cadasro de Usuário</h1>
</div>

<div class="content-din">
     @if( isset($errors) && count($errors) > 0 )
     <div class="col-md-12">
         <div class="alert alert-warning alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
             @foreach( $errors->all() as $error)
                 <p>{{$error}}</p>
             @endforeach
         </div>
     </div>
 @endif
@if(isset($data))
    <form 
    class="form form-search form-ds"  
    method="post" action="{{route('usuarios.update', $data->id)}}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
@else
    <form 
    class="form form-search form-ds"  
    method="post" action="{{route('usuarios.store')}}" enctype="multipart/form-data">
@endif
        {{ csrf_field() }} 
        
        <div class="form-group col-md-6">
                <label for="InputName">Nome *</label>
                <input type="text" class="form-control" id="InputName" name="name" placeholder="Nome" required value="{{$data->name ?? old('name')}}">
            </div>
            <div class="form-group col-md-6">
                    <label for="InputEmail">Email *</label>
                    <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email" required value="{{$data->email ?? old('email')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="InputPassword">Senha *</label>
                    <input type="password" class="form-control" id="InputPassword" name="password" @if(!isset($data)) required  @endif placeholder="Senha" >
                </div>
                <div class="form-group col-md-6">
                    <label for="InputPasswordConfirmation">Confirmar a senha *</label>
                    <input type="password" class="form-control" id="InputPasswordConfirmation" @if(!isset($data)) required  @endif name="password_confirmation" placeholder="Confirmar a senha" >
                </div>
                <div class="form-group col-md-6">
                    <label for="InputFacebook">Facebook</label>
                    <input type="text" class="form-control" id="InputFacebook" name="facebook" placeholder="Facebook" value="{{$data->facebook ?? old('facebook')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="InputTwitter">Twitter</label>
                    <input type="text" class="form-control" id="InputTwitter" name="twitter" placeholder="Twitter" value="{{$data->twitter ?? old('twitter')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="InputGitHub">GitHub</label>
                    <input type="text" class="form-control" id="InputGitHub" name="github" placeholder="GitHub" value="{{$data->github ?? old('github')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="InputSite">Site</label>
                    <input type="text" class="form-control" id="InputSite" name="site" placeholder="Site" value="{{$data->site ?? old('site')}}">
                </div>
                <div class="form-group col-md-6">
                    <label>Biografia</label>
                    <textarea class="form-control" rows="3" name="biography" placeholder="Digite aqui ...">{{$data->biography ?? old('biography')}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="InputFile">Imagem de Perfil</label>
                    <input type="file" id="InputFile" name="image">
                </div>
                <div class="form-group col-md-6">
                        <button class="btn btn-info">Enviar</button>
                </div>
    </form>

</div>
@endsection


