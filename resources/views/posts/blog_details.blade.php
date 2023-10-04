@extends('layouts.main')

@section('content')
<main>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <div class="feature-img">
                       <img class="img-fluid" src="{{ asset('/storage/image/'.$data->image) }}" alt="">
                    </div>
                    <div class="blog_details mb-5">
                       <h2>{{ $data->title }}</h2>
                       <ul class="blog-info-link mt-3 mb-4">
                          <li><a href="/klikpriangan/category/{{ $data->category->slug }}"><i class="fa fa-user"></i> {{ $data->category->name }}</a></li>
                       </ul>
                       <p class="excert">
                         {{ $data->excert }}
                       </p>
            
                       {!! $data->body !!}
                    </div>
                 </div>
                 <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                       <div class="col-sm-4 text-center my-2 my-sm-0">
                          <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                       </div>
                       <ul class="social-icons">
                          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                          <li><a href="#"><i class="fab fa-behance"></i></a></li>
                       </ul>
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
                           <a href="/klikpriangan/category/{{ $item->slug }}" class="d-flex">
                              <p>{{ $item->name }}</p>
                              <p>(37)</p>
                           </a>
                        </li>
                        @endforeach
                       </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                       <h3 class="widget_title">Recent Post</h3>
                       <div class="media post_item">
                        @if ($data->image)
                        <img src="{{ asset('/storage/image/'.$data->image) }}" alt="{{ $data->title }}" width="100px">
                        @else
                        <img src="/assets/img/post/post_1.png" alt="Post">
                        @endif
                          <div class="media-body">
                             <a href="/klikpriangan/{{ $data->slug }}">
                                <h3>{{ $data->title }}</h3>
                             </a>
                             <p>{{ $data->excerpt }}</p>
                             <p>{{ \Carbon\Carbon::parse($data->published_at)->format('M d Y') }}</p>
                          </div>
                       </div>
                    </aside>
                 </div>
              </div>
           </div>
        </div>
     </section>
</main>
@endsection
