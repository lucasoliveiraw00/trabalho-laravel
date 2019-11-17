@extends('painel.templates.dashboard')
@section('content')
<div class="title-pg">
<h1 class="title-pg">Visualizar categoria: {{$data->name}}</h1>
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
 <div class="box-body">
        <div class="row">
            <div class="col-md-8">

                <h4><strong>Nome: </strong>{{$data->name}}</h4>
                <h4><strong>Url: </strong>{{$data->url}}</h4>
                
                <h4><strong>Descrição: </strong>{{$data->description}}</h4>
            </div>
            <div class="col-md-4">
                @if(isset($data->image))
                <img src="{{URL::asset('/assets/uploads/categoria/'.$data->image)}}" alt="$user->image" class="img-responsive img-rounded img-bordered">
                @endif
            </div>
        </div>
    </div>

    <!-- form start -->
    <form role="form" method="post" action="{{route('categorias.destroy', $data->id)}}" >
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="box-footer">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Deletar</button>
                <a href="{{route('categorias.index')}}" class="btn btn-info"><i class="fa fa-undo"></i>  Voltar</a>
            </div>
        </div>
    </form>
    

</div><!--Content Dinâmico-->
@endsection
