@extends('layouts.main')

@section('content')
<main>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <div class="feature-img">
                       <img class="img-fluid" src="{{ asset('/storage/image/'.$data->image) }}" alt="{{ $data->title }}">
                    </div>
                    <div class="blog_details mb-5">
                       <h2>{{ $data->title }}</h2>
                       <ul class="blog-info-link mt-3 mb-4">
                          <li>
                           <a href="/author/{{ $data->author->username }}">
                              <i class="fa fa-user"></i> {{ $data->author->username }} -
                           </a>
                           <a href="/category/{{ $data->category->slug }}">
                               {{ $data->category->name }}</a>
                           </li>
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
                          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                       </ul>
                    </div>
                 </div>
              </div>

              <div class="col-lg-4">
                 <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget mb-5">
                       <h3 class="widget_title">Terpopuler</h3>
                       @foreach ($posts as $post)
                       <div class="media post_item">
                        @if ($post->image)
                        <img src="{{ asset('/storage/image/'.$post->image) }}" alt="{{ $post->title }}" width="150">
                        @else
                        <img src="/assets/img/post/post_1.png" alt="Post">
                        @endif
                        <div class="media-body">
                           <a href="/post/{{ $post->slug }}">
                              <h3>{{ $post->title }}</h3>
                           </a>
                           <p>{{ $post->excerpt }}</p>
                           <p>{{ \Carbon\Carbon::parse($post->published_at)->format('M d Y') }}</p>
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
        </div>
     </section>
</main>
@endsection
