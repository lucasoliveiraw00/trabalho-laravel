<!-- dashboard.blade.php -->
@extends('site.templates.master')

@section('conteudo')

<div class="slide">
    @foreach($postDestaque as $idx => $item)
        <?php if( isset($idx) && ($idx == 0) ): ?>
        <div class="col-md-8">
            <article class="img-big">
                <a href="" title="">
                    @if ($item->image)
                        <img src="{{url('assets/uploads/post/' . $item->image)}}" alt="" class="img-slide-big">
                    @else
                        <img src="{{url('assets/images/images.jpeg')}}" alt="{{$item->title}}" class="img-slide-big">
                    @endif
                    <h1 class="text-slide">
                        {{$item->title}}
                    </h1>
                </a>
            </article>
        </div>
        <?php else: ?>

        <div class="col-md-4">
            <article class="img-small col-md-12 col-sm-6 col-xm-12">
                <a href="" title="">
                    <img src="{{url('assets/uploads/post/' . $item->image)}}" alt="{{$item->title}}" class="img-slide-big">
                    <h1 class="text-slide">
                        {{$item->title}}
                    </h1>
                </a>
            </article>
        </div>
        <?php endif; ?>
    @endforeach
</div><!--Slide-->


<section class="content">
    <div class="col-md-8">
        @forelse($itemsPost as $idx => $item)
            <article class="post">
                <div class="image-post col-md-4 text-center">
                    @if ($item->image)
                        <img src="{{url('assets/uploads/post/' . $item->image)}}" alt="{{$item->title}}" class="img-slide-big">
                    @else
                        <img src="{{url('assets/images/images.jpeg')}}" alt="{{$item->title}}" class="img-slide-big">
                    @endif
                </div>
                <div class="description-post col-md-8">
                    <h2 class="title-post">{{$item->title}}.</h2>
                    <p class="description-post">
                        {{$item->description}}
                    </p>
                </div>
                <a class="btn-post" href="?pg=post">Ir<span class="glyphicon glyphicon-chevron-right"></span></a>
            </article>
        @empty
            <tr>
                <td>Nenhum registro encontrado!!</td>
            </tr>
        @endforelse
    </div><!--POSTS-->

    <!--Sidebar-->
    <div class="col-md-4">
        <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FfaculdadeAlfaUmuarama%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=316115088513380"
            width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowTransparency="true" allow="encrypted-media"></iframe>
    </div>
</section>

@endsection


