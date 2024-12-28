@extends('front.layouts.master')

@section('title', $settings['blog'])

@section('content')
<div class="page-direction p-lr">
    <a href="{{ route('home') }}" class="prev-page">Ana Səhifə</a>
    <span>/</span>                   
    <a href="{{ route('blog.index') }}" class="prev-page">Bloqlar</a>
    <span>/</span>                   
    <a href="{{ route('blog.detail', $blog->id) }}" class="current-page">{{ $blog->title_az }}</a>
</div>

<div class="blog-detail-head p-lr">
    <h1 class="blog-title">{{ $blog->title_az }}</h1>
    <div class="blogs-detail">
        {!! $blog->text_az !!}
    </div>
</div>

<div class="blog-detail-img">
    <img src="{{ asset($blog->bottom_image) }}" alt="">
</div>

<div class="blogs-detail-container p-lr">
    <div class="blogs-detail-socials">
        <a href="" class="social-item">
            <img src="./assets/icons/blogDetail-twitter.svg" alt="">
            Twitter
        </a>
        <a href="" class="social-item">
            <img src="./assets/icons/blogDetail-facebook.svg" alt="">
            Facebook
        </a>
        <a href="" class="social-item">
            <img src="./assets/icons/blogDetail-insta.svg" alt="">
            Instagram
        </a>
    </div>
    <div class="blog-subTitle">
        <p>{!! $blog->description_az !!}</p>
    </div>
    

    <div class="blogs-right">
        <div class="boxBlogs">
            <h2 class="box-title">Son Yeniliklər</h2>
            <div class="boxBlog-links">
                @foreach($recentBlogs as $recentBlog)
                <a href="{{ route('blog.detail', $recentBlog->id) }}" class="boxBlog-link">
                    <h3>{{ $recentBlog->title_az }}</h3>
                    <p>{{ $recentBlog->created_at->format('d M Y') }}</p>
                </a>
                @endforeach
            </div>
        </div>

        <div class="boxBlogs">
            <h2 class="box-title">Populyar</h2>
            <div class="boxBlog-links">
                @foreach($popularBlogs as $popularBlog)
                <a href="{{ route('blog.detail', $popularBlog->id) }}" class="boxBlog-link">
                    <h3>{{ $popularBlog->title_az }}</h3>
                    <p>{{ $popularBlog->created_at->format('d M Y') }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="other-blogs-container p-lr">
    <h2 class="section-title">Digər Yeniliklər</h2>
    <div class="other-blog-slide swiper">
        <div class="swiper-wrapper">
            @foreach($otherBlogs as $otherBlog)
            <a href="{{ route('blog.detail', $otherBlog->id) }}" class="blog-cart swiper-slide">
                <div class="cart-img">
                    <img src="{{ asset($otherBlog->image) }}" alt="">
                </div>
                <div class="cart-body">
                    <p class="cart-date">{{ $otherBlog->created_at->format('M d, Y') }}</p>
                    <h3 class="cart-name">{{ $otherBlog->title_az }}</h3>
                    <span class="underline"></span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
