@extends('layouts.main')

@section('content')
<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h5 class="px-3">Post By {{ $title }}</h5>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach ($author->take(4) as $item)
                                            <a class="nav-item nav-link active"
                                                href="/category/{{ $item->category->slug }}" 
                                                aria-selected="true">{{ $item->category->name }}</a>
                                            @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            @foreach ($author->skip(1) as $item)
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        @if ($item->image)
                                                        <img src="{{ asset('/storage/image/'.$item->image) }}" alt="{{ $item->image }}">
                                                        @else
                                                        <img src="/assets/img/gallery/whats_news_details1.png" alt="image">
                                                        @endif
                                                    </div>
                                                    <div class="whates-caption whates-caption2">
                                                        <h4><a href="/post/{{ $item->slug }}">{{ $item->title }}</a></h4>
                                                        <span>by {{ $item->author->username }} - {{ \Carbon\Carbon::parse($item->published_at)->format('M d Y') }}</span>
                                                        <p>{{ $item->excerpt }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
