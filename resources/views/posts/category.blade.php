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
                                    <a href="#">
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
            </div>
        </div>

        <div class="col-lg-4">
            <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget post_category_widget">
                    <h4 class="widget_title">Category</h4>
                    <ul class="list cat-list">
                        @foreach ($categories as $item)
                        <li>
                            <a href="/category/{{ $item->slug }}" class="d-flex">
                                <p class="me-5">{{ $item->name }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </aside>

                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Recent Post</h3>
                    @foreach ($datas as $data)
                    <div class="media post_item">
                        <img src="/assets/img/post/post_1.png" alt="post">
                        <div class="media-body">
                            <a href="/{{ $data->slug }}">
                                <h3>{{ $data->excerpt }}</h3>
                            </a>
                            <p>{{ \Carbon\Carbon::parse($item->published_at)->format('M d Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection
