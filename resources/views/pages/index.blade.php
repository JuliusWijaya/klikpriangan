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
                                                {{ \Carbon\Carbon::parse($post->published_at)->format('M d Y') }}
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
                                            <p>{{ \Carbon\Carbon::parse($education->published_at)->format('M d Y') }}
                                            </p>
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
                                                                    width="150" alt="{{ $item->title }}"
                                                                    class="img-fluid">
                                                                @else
                                                                <img src="/assets/img/gallery/whats_right_img1.png"
                                                                    alt="image">
                                                                @endif
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span>
                                                                    <a href="/category/{{ $item->category->slug }}"
                                                                        class="colorb">
                                                                        {{ $item->category->name }}
                                                                    </a>
                                                                </span>
                                                                <h4><a
                                                                        href="/post/{{ $item->slug }}">{{ $item->title }}</a>
                                                                </h4>
                                                                <p>
                                                                    {{ \Carbon\Carbon::parse($item->published_at)->format('M d Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
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
                        <span></span>
                        {{-- <img src="assets/img/gallery/body_card1.png" alt=""> --}}
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
                                <img src="{{ asset('/storage/image/'.$sport->image) }}" class="img-fluid"
                                    alt="{{ $sport->title }}">
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
                                <img src="{{ asset('/storage/image/'.$post->image) }}" class="img-fluid" width="130"
                                    alt="image">
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
                                        @foreach ($news as $new)
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{ asset('/storage/image/'.$new->image) }}" class="img-fluid"
                                                    alt="image">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4>
                                                    <a href="/post/{{ $new->slug }}">{{ $new->title }}</a>
                                                </h4>
                                                <p>{{ \Carbon\Carbon::parse($new->published_at)->format('M d Y') }}</p>
                                            </div>
                                        </div>
                                        @endforeach
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
                        <ins class="adsbygoogle" style="display: block; height: 100px;" data-ad-format="fluid"
                            data-ad-layout-key="-46+cz+1v-cs+cm" data-ad-client="ca-pub-7841575252065657"
                            data-ad-slot="3276613689" data-adsbygoogle-status="done" data-ad-status="unfilled">
                            <div id="aswift_2_host"
                                style="border: none; height: 250px; width: 970px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block;"
                                tabindex="0" title="Advertisement" aria-label="Advertisement">
                                <iframe id="aswift_2" name="aswift_2"
                                    style="left:0;position:absolute;top:0;border:0;width:970px;height:250px;"
                                    sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation"
                                    width="1200" height="300" frameborder="0" marginwidth="0" marginheight="0"
                                    vspace="0" hspace="0" allowtransparency="true" scrolling="no"
                                    src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-7841575252065657&amp;output=html&amp;h=796&amp;slotname=3276613689&amp;adk=355893656&amp;adf=1573534164&amp;pi=t.ma~as.3276613689&amp;w=1200&amp;lmt=1697100603&amp;rafmt=11&amp;format=1200x796&amp;url=https%3A%2F%2Fklikpriangan.com%2F&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTAuMC4wIiwieDg2IiwiIiwiMTE3LjAuMjA0NS42MCIsW10sMCxudWxsLCI2NCIsW1siTWljcm9zb2Z0IEVkZ2UiLCIxMTcuMC4yMDQ1LjYwIl0sWyJOb3Q7QT1CcmFuZCIsIjguMC4wLjAiXSxbIkNocm9taXVtIiwiMTE3LjAuNTkzOC4xNTAiXV0sMF0.&amp;dt=1697100603491&amp;bpp=3&amp;bdt=1212&amp;idt=292&amp;shv=r20231004&amp;mjsv=m202310040101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3Da13a11a146086c41-2250cfe810e400d1%3AT%3D1695628165%3ART%3D1697083348%3AS%3DALNI_MYGZAezGysHEibKK2Lrd6Cq2GaE6A&amp;gpic=UID%3D00000c53de28f556%3AT%3D1695628165%3ART%3D1697083348%3AS%3DALNI_MaskupbttOQyGrtE3sUKkYjG9_DDw&amp;prev_fmts=0x0%2C1200x200&amp;nras=1&amp;correlator=110911300095&amp;frm=20&amp;pv=1&amp;ga_vid=1838653669.1695628165&amp;ga_sid=1697100604&amp;ga_hid=72526234&amp;ga_fc=1&amp;u_tz=420&amp;u_his=3&amp;u_h=864&amp;u_w=1536&amp;u_ah=834&amp;u_aw=1536&amp;u_cd=24&amp;u_sd=1.25&amp;dmc=8&amp;adx=0&amp;ady=200&amp;biw=1513&amp;bih=760&amp;scr_x=0&amp;scr_y=1798&amp;eid=44759926%2C44759837%2C44759875%2C31077327%2C31078594%2C42531705%2C42532263%2C44798934%2C44804782%2C44805099%2C31078297%2C31078679&amp;oid=2&amp;pvsid=1731055112090493&amp;tmod=361105924&amp;wsm=1&amp;uas=0&amp;nvt=1&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1536%2C0%2C1536%2C834%2C1528%2C760&amp;vis=1&amp;rsz=%7C%7CEe%7C&amp;abl=CS&amp;pfx=0&amp;fu=128&amp;bc=31&amp;ifi=3&amp;uci=a!3&amp;fsb=1&amp;xpc=wOQ13ruO6F&amp;p=https%3A//klikpriangan.com&amp;dtd=303"
                                    data-google-container-id="a!3" data-load-complete="true"
                                    data-google-query-id="CIzTjbWQ8IEDFRP0aAodvqQAxQ">
                                </iframe>
                            </div>
                        </ins>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
</main>
@endsection
