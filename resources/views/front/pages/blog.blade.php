@extends('front.layouts.master')

@section('title', $settings['blog'])

@section('content')
<div class="page-direction p-lr">
    <a href="{{ route('home') }}" class="prev-page">Ana Səhifə</a>
    <span>/</span>                   
    <a href="{{ route('blog.index') }}" class="current-page">Bloqlar</a>
</div>

<div class="lastBlogs-slide swiper">
    <div class="swiper-wrapper">
        @foreach($popularBlogs as $blog)
        <a href="{{ route('blog.detail', $blog->id) }}" class="lastBlog-item swiper-slide">
            <img src="{{ asset($blog->bottom_image) }}" alt="">
            <div class="lastBlog-content p-lr">
                <span class="blog-category">{{ $blog->blogType->name_az ?? 'Yeniliklər' }}</span>
                <h2 class="lastBlog-title">{{ $blog->title_az }}</h2>
                <div class="lastBlog-desc">
                    <p>{{ $blog->description_az }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="swiper-pagination p-lr"></div>
</div>

<div class="blogs-container p-lr">
    <div class="blogs-top">
        <div class="blogs-tabs">
            <div class="blogs-tabs-slide swiper">
                <div class="swiper-wrapper">
                    <button class="blog-tab-item swiper-slide active" type="button" id="allBlogs">Hamısı</button>
                    @foreach($blogTypes as $type)
                    <button class="blog-tab-item swiper-slide" type="button" id="type_{{ $type->id }}">{{ $type->name_az }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Search form -->
    </div>

    <div class="blogs-main">
        <div class="blogs">
            <div class="allBlogs">
                @foreach($blogs as $blog)
                <a href="{{ route('blog.detail', $blog->id) }}" class="blog-cart" data-id="type_{{ $blog->blog_type_id }}">
                    <div class="cart-img">
                        <img src="{{ asset($blog->image) }}" alt="">
                    </div>
                    <div class="cart-body">
                        <p class="cart-date">{{ $blog->created_at->format('M d, Y') }}</p>
                        <h3 class="cart-name">{{ $blog->title_az }}</h3>
                        <span class="underline"></span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="blogs-right">
            <div class="boxBlogs">
                <h2 class="box-title">Son Yeniliklər</h2>
                <div class="boxBlog-links">
                    @foreach($blogs->take(6) as $blog)
                    <a href="{{ route('blog.detail', $blog->id) }}" class="boxBlog-link">
                        <h3>{{ $blog->title_az }}</h3>
                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="boxBlogs">
                <h2 class="box-title">Populyar</h2>
                <div class="boxBlog-links">
                    @foreach($popularBlogs->take(6) as $blog)
                    <a href="{{ route('blog.detail', $blog->id) }}" class="boxBlog-link">
                        <h3>{{ $blog->title_az }}</h3>
                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
