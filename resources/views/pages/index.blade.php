@extends('layouts.main')

@section('content')
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            @foreach ($posts as $post)
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        @if ($post->image)
                                        <img src="{{ asset('/storage/image/'.$post->image) }}" alt="{{ $post->title }}">
                                        @else
                                        <img src="/assets/img/trending/trending_top2.jpg" alt="image">
                                        @endif
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s"
                                                data-duration="1000ms">
                                                {{ $post->category->name }}
                                            </span>
                                            <h2>
                                                <a href="/post/{{ $post->slug }}" data-animation="fadeInUp"
                                                    data-delay=".4s" data-duration="1000ms">
                                                    {{ $post->title }}
                                                </a>
                                            </h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">
                                                <a href="/author/{{ $post->author->username }}">by
                                                    {{ $post->author->username }}</a>
                                                - {{ \Carbon\Carbon::parse($post->published_at)->format('M d Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Right content -->

                    <div class="col-lg-4">
                        <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        @if ($opini->image)
                                        <img src="{{ asset('/storage/image/'.$opini->image) }}"
                                            alt="{{ $opini->title }}">
                                        @else
                                        <img src="{{ asset('/assets/img/trending/trending_top3.jpg') }}" alt="image">
                                        @endif
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">
                                                <a
                                                    href="/category/{{ $opini->category->slug }}">{{ $opini->category->name }}</a>
                                            </span>
                                            <h2><a href="/post/{{ $opini->slug }}">{{ $opini->title }}</a></h2>
                                            <p>{{ \Carbon\Carbon::parse($opini->published_at)->format('M d Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        @if ($education->image)
                                        <img src="{{ asset('/storage/image/'.$education->image) }}"
                                            alt="{{ $education->title }}">
                                        @else
                                        <img src="assets/img/trending/trending_top4.jpg" alt="image">
                                        @endif
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgg">{{ $education->category->name }}</span>
                                            <h2><a href="/post/{{ $education->slug }}">{{ $education->title }}</a></h2>
                                            <p>{{ \Carbon\Carbon::parse($education->published_at)->format('M d Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->

    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-12">
                                <div class="section-tittle mb-30">
                                    <h3 class="text-left">Berita Terkini</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-8">
                                                <div class="row">
                                                    @foreach ($news as $item)
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                @if ($item->image)
                                                                    <img src="{{ asset('/storage/image/'.$item->image) }}" 
                                                                    width="150" alt="{{ $item->title }}">
                                                                @else
                                                                <img src="/assets/img/gallery/whats_right_img1.png"
                                                                alt="">
                                                                @endif
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span>
                                                                    <a href="/category/{{ $item->category->slug }}" class="colorb">
                                                                        {{ $item->category->name }}
                                                                    </a>
                                                                </span>
                                                                <h4><a href="/post/{{ $item->slug }}">{{ $item->title }}</a>
                                                                </h4>
                                                                <p>{{ \Carbon\Carbon::parse($item->published_at)->format('M d Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                           
                                            {{-- <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    @foreach ($news->skip(1) as $item)
                                                    <!-- single -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                @if ($item->image)
                                                                    <img src="{{ asset('/storage/image/'.$item->image) }}" width="150" alt="{{ $item->title }}">
                                                                @else
                                                                <img src="/assets/img/gallery/whats_right_img1.png"
                                                                alt="image">
                                                                @endif
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span>
                                                                    <a href="/category/{{ $item->category->slug }}" class="colorb">
                                                                        {{ $item->category->name }}
                                                                    </a>
                                                                </span>
                                                                <h4><a href="/post/{{ $item->slug }}">{{ $item->title }}</a></h4>
                                                                <p>{{ \Carbon\Carbon::parse($item->published_at)->format('M d Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="d-flex justify-content-end my-3">
                                            {{ $news->links() }}
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <!-- Banner -->
                    <div class="banner-one mt-20 mb-30">
                        <img src="assets/img/gallery/body_card1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Terbaru</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="{{ asset('storage/image/'.$sport->image) }}" alt="{{ $sport->title }}">
                                <div class="most-recent-cap">
                                    <span class="bgbeg">{{ $sport->category->name }}</span>
                                    <h4><a href="/post/{{ $sport->slug }}">{{ $sport->title }}</a></h4>
                                    <p>{{ \Carbon\Carbon::parse($sport->published_at)->format('M d Y') }}</p>
                                </div>
                            </div>
                        </div>
                        @foreach ($posts as $post)
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                @if ($post->image)
                                <img src="{{ asset('/storage/image/'.$post->image) }}" alt="image" width="130">
                                @else
                                <img src="/assets/img/gallery/most_recent1.png" alt="">
                                @endif
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                <p>{{ \Carbon\Carbon::parse($post->published_at)->format('M d Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->

    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle">
                            <h3 class="text-center">Topik Khusus</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->

    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="/assets/img/gallery/weekly2News1.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="/assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="/assets/img/gallery/weekly2News3.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="/assets/img/gallery/weekly2News4.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="/assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin
                                                        ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->

    <!-- banner-last Start -->
    <div class="banner-area gray-bg pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="/assets/img/gallery/body_card3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
</main>
@endsection
