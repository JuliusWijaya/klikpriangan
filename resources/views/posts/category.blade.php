@extends('layouts.main')

@section('content')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @if ($datas->count())
                    @foreach ($datas as $item)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            @if ($item->image)
                            <img class="card-img rounded-0" src="{{ asset('/storage/image/'.$item->image) }}" alt="{{ $item->title }}">
                            @else
                            <img src="/Assets/img/blog.52" alt="image">
                            @endif
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/post/{{ $item->slug }}">
                                <h2>{{ $item->title }}</h2>
                            </a>
                            <p>{{ $item->excerpt }}</p>
                            <ul class="blog-info-link">
                                <li>
                                    <a>
                                        <i class="fa fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($item->published_at)->toDateString() }}
                                    </a>
                                </li>
                                <li>
                                    <a href="/author/{{ $item->author->username }}">
                                        <i class="fa fa-user"></i>
                                        Post By {{ $item->author->username }}
                                    </a>
                                 </li> 
                            </ul>
                        </div> 
                    </article> 
                    @endforeach 
                    @else 
                    <div class="alert alert-danger" role="alert">
                        Post Not Found!
                    </div>
                </div>
                @endif
                <div class="d-flex justify-content-end">
                    {!! $datas->render() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget popular_post_widget mb-5">
                    <h3 class="widget_title">Terpopuler</h3>
                    @foreach ($datas as $data)
                    <div class="media post_item">
                        <img src="{{ asset('storage/image/'.$data->image) }}" class="img-fluid" width="150" alt="post">
                        <div class="media-body">
                            <a href="/post/{{ $data->slug }}">
                                <h3>{{ $data->excerpt }}</h3>
                            </a>
                            <p>{{ \Carbon\Carbon::parse($item->published_at)->format('M d Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </aside>
                <div class="border p-3">
                    <img src="/assets/img/1.webp" alt="iklan" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
