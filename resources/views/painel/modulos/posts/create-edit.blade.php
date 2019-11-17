<!-- dashboard.blade.php -->
@extends('painel.templates.dashboard')

@section('content')

    <div class="title-pg">
        <h1 class="title-pg">Cadasro de Posts</h1>
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
                method="post" action="{{route('posts.update', $data->id)}}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @else
                    <form
                        class="form form-search form-ds"
                        method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group col-md-6">
                            <label for="InputTitle">Título *</label>
                            <input type="text" class="form-control" id="InputName" name="title" placeholder="Título"
                                   value="{{$data->title ?? old('title')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputDate">Data</label>
                            <input type="date" class="form-control" id="InputUrl" name="date" placeholder="Data"
                                   value="{{$data->date ?? old('date')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputHour">Hora </label>
                            <input type="time" class="form-control" id="InputUrl" name="hour" placeholder="Hora"
                                   value="{{$data->hour ?? old('hour')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputFeatured">Destaque *</label>
                            <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                {{ ($data->featured) ?? null === 1 ? 'checked' : '' }}>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputStatus">Status *</label>
                            <input type="checkbox" class="form-check-input" id="InputStatus" name="status"
                                {{ ($data->status) ?? null === 'A' ? 'checked' : '' }}>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Categoria *</label>
                            <select class="form-control" name="category_id">
                                <option value="" >Selecionar</option>
                                @foreach($items->all() as $item)
                                    <option value="{{$item->id}}" {{ ($data->category_id) ?? null === $item->id? 'selected' : '' }}> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputFile">Imagem do Post</label>
                            <input type="file" id="InputFile" name="image">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Descrição *</label>
                            <textarea class="form-control" rows="3" name="description"
                                      placeholder="Digite aqui ...">{{$data->description ?? old('description')}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <button class="btn btn-info">Enviar</button>
                        </div>
                    </form>

    </div>
@endsection


