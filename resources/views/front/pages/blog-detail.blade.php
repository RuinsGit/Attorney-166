@extends('front.layouts.master')

@section('title')
    @php echo $translations->where('key', 'blog_current_page')->first()->value; @endphp
@endsection

@section('css')
<!-- <style>
    .blogs-detail-container {
        display: flex;
        gap: 30px;
        position: relative;
    }
    .blogs-detail {
        flex: 1;
        max-width: 70%;
    }
    .blogs-right {
        width: 30%;
        min-width: 300px;
    }
    .boxBlogs {
        margin-bottom: 30px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
    }
    @media (max-width: 992px) {
        .blogs-detail-container {
            flex-direction: column;
        }
        .blogs-detail, .blogs-right {
            max-width: 100%;
            width: 100%;
        }
    }
</style> -->
@endsection

@section('content')
<div class="page-direction p-lr">
    <a href="{{ route('home') }}" class="prev-page">{{ $translations->where('key', 'blog_prev_page')->first()->value ?? 'Ana Səhifə' }}</a>
    <span>/</span>                   
    <a href="{{ route('blog.index') }}" class="prev-page">{{ $translations->where('key', 'blog_current_page')->first()->value ?? 'Bloqlar' }}</a>
    <span>/</span>                   
    <a href="#" class="current-page">{{ $blog->{"title_" . app()->getLocale()} }}</a>
</div>

<div class="blog-detail-head p-lr">
    <h1 class="blog-title">{{ $blog->{"title_" . app()->getLocale()} }}</h1>
    <div class="blog-subTitle">
        {!! $blog->{"text_" . app()->getLocale()} !!}
    </div>
</div>

<div class="blog-detail-img">
    <img src="{{ asset($blog->bottom_image) }}" alt="{{ $blog->{"title_" . app()->getLocale()} }}">
</div>

<div class="blogs-detail-container p-lr">
    <div class="blogs-detail-socials">
        @foreach($socialMedia as $social)
            @if($social->status)
                <a href="{{ $social->link }}" class="social-item" target="_blank">
                    <img src="{{ asset($social->image) }}" alt="social media">
                </a>
            @endif
        @endforeach
    </div>
    <div class="blogs-detail">
        {!! $blog->{"description_" . app()->getLocale()} !!}
        
        </div>

    <div class="blogs-right">
        <div class="boxBlogs">
            <h2 class="box-title">{{ $translations->where('key', 'blog_box_title')->first()->value ?? 'Son Yeniliklər' }}</h2>
            <div class="boxBlog-links">
                @foreach($recentBlogs as $recentBlog)
                <a href="{{ route('blog.detail', $recentBlog->id) }}" class="boxBlog-link">
                    <h3>{{ $recentBlog->{"title_" . app()->getLocale()} }}</h3>
                    <p>{{ $recentBlog->created_at->format('d M Y') }}</p>
                </a>
                @endforeach
            </div>
        </div>

        <div class="boxBlogs">
            <h2 class="box-title">{{ $translations->where('key', 'blog_box_popular_title')->first()->value ?? 'Populyar' }}</h2>
            <div class="boxBlog-links">
                @foreach($popularBlogs as $popularBlog)
                <a href="{{ route('blog.detail', $popularBlog->id) }}" class="boxBlog-link">
                    <h3>{{ $popularBlog->{"title_" . app()->getLocale()} }}</h3>
                    <p>{{ $popularBlog->created_at->format('d M Y') }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="other-blogs-container p-lr">
    <h2 class="section-title">{{ $translations->where('key', 'blog_other_title')->first()->value ?? 'Digər Yeniliklər' }}</h2>
    <div class="other-blog-slide swiper">
        <div class="swiper-wrapper">
            @foreach($otherBlogs as $otherBlog)
            <a href="{{ route('blog.detail', $otherBlog->id) }}" class="blog-cart swiper-slide">
                <div class="cart-img">
                    <img src="{{ asset($otherBlog->image) }}" alt="">
                </div>
                <div class="cart-body">
                    <p class="cart-date">{{ $otherBlog->created_at->format('M d, Y') }}</p>
                    <h3 class="cart-name">{{ $otherBlog->{"title_" . app()->getLocale()} }}</h3>
                    <span class="underline"></span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    new Swiper('.other-blog-slide', {
        slidesPerView: 3,
        spaceBetween: 30,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
</script>
@endsection
