@extends('front.layouts.master')

@section('title', $settings['blog'])

@section('content')
<div class="page-direction p-lr">
    <a href="{{ route('home') }}" class="prev-page"> {{ $translations->where('key', 'blog_prev_page')->first()->value }}</a>
    <span>/</span>                   
    <a href="{{ route('blog.index') }}" class="current-page"> {{ $translations->where('key', 'blog_current_page')->first()->value }}</a>
</div>

<div class="lastBlogs-slide swiper">
    <div class="swiper-wrapper">
        @foreach($popularBlogs as $blog)
        <a href="{{ route('blog.detail', $blog->id) }}" class="lastBlog-item swiper-slide">
            <img src="{{ asset($blog->bottom_image) }}" alt="">
            <div class="lastBlog-content p-lr">
                <span class="blog-category">{{ $blog->blogType->{"name_" . app()->getLocale()} ?? $translations->where('key', 'blog_category_newss')->first()->value }}</span>
                <h2 class="lastBlog-title">{{ $blog->title_az }}</h2>
                <div class="lastBlog-desc">
                    <p>{!! $blog->{"text_" . app()->getLocale()} !!}</p>
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
                    <button class="blog-tab-item swiper-slide active" type="button" id="allBlogs"> {{ $translations->where('key', 'blog_tab_all')->first()->value }}</button>
                    @foreach($blogTypes as $type)
                    <button class="blog-tab-item swiper-slide " type="button" id="type_{{ $type->id }}">{{ $type->text }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <form class="blogs-search" action="{{ route('blog.index') }}" method="GET">
            <button class="blogSearchBtn" type="submit">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.0002 21L16.6572 16.657M16.6572 16.657C17.4001 15.9141 17.9894 15.0321 18.3914 14.0615C18.7935 13.0909 19.0004 12.0506 19.0004 11C19.0004 9.94936 18.7935 8.90905 18.3914 7.93842C17.9894 6.96779 17.4001 6.08585 16.6572 5.34296C15.9143 4.60007 15.0324 4.01078 14.0618 3.60874C13.0911 3.20669 12.0508 2.99976 11.0002 2.99976C9.9496 2.99976 8.90929 3.20669 7.93866 3.60874C6.96803 4.01078 6.08609 4.60007 5.34321 5.34296C3.84288 6.84329 3 8.87818 3 11C3 13.1217 3.84288 15.1566 5.34321 16.657C6.84354 18.1573 8.87842 19.0002 11.0002 19.0002C13.122 19.0002 15.1569 18.1573 16.6572 16.657Z" stroke="#D6D6D6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <input type="text" name="search" placeholder="{{ $translations->where('key', 'blog_search_placeholder')->first()->value }}" value="{{ request('search') }}">
        </form>
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
                        <h3 class="cart-name">{{ $blog->{"title_" . app()->getLocale()} }}</h3>
                        <span class="underline"></span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="pagination">
                <a href="{{ $blogs->url(1) }}" class="pagination-item firstPage">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6323 11.8159C12.4026 12.0547 12.0228 12.0622 11.7839 11.8325L8.18394 8.4325C8.06629 8.31938 7.9998 8.16321 7.9998 8C7.9998 7.83679 8.06629 7.68062 8.18394 7.5675L11.7839 4.1675C12.0228 3.93782 12.4026 3.94527 12.6323 4.18413C12.862 4.423 12.8545 4.80282 12.6157 5.0325L9.46547 8L12.6157 10.9675C12.8545 11.1972 12.862 11.577 12.6323 11.8159ZM7.8323 11.8159C7.60263 12.0547 7.2228 12.0622 6.98394 11.8325L3.38394 8.4325C3.26629 8.31938 3.1998 8.16321 3.1998 8C3.1998 7.83679 3.26629 7.68062 3.38394 7.5675L6.98394 4.1675C7.2228 3.93782 7.60263 3.94527 7.8323 4.18413C8.06198 4.423 8.05453 4.80282 7.81567 5.0325L4.66547 8L7.81567 10.9675C8.05453 11.1972 8.06198 11.577 7.8323 11.8159Z" fill="#626262"/>
                    </svg>  
                    First                          
                </a>
                <a href="{{ $blogs->previousPageUrl() }}" class="pagination-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2329 4.18414C10.4626 4.423 10.4551 4.80282 10.2163 5.0325L7.06605 8L10.2163 10.9675C10.4551 11.1972 10.4626 11.577 10.2329 11.8159C10.0032 12.0547 9.62339 12.0622 9.38452 11.8325L5.78452 8.4325C5.66688 8.31938 5.60039 8.16321 5.60039 8C5.60039 7.83679 5.66688 7.68062 5.78452 7.5675L9.38452 4.1675C9.62339 3.93782 10.0032 3.94527 10.2329 4.18414Z" fill="#626262"/>
                    </svg>
                    Back                            
                </a>

                <a href="{{ $blogs->url(1) }}" class="pagination-item {{ $blogs->currentPage() == 1 ? 'active' : '' }}">1</a>
                <a href="{{ $blogs->url(2) }}" class="pagination-item {{ $blogs->currentPage() == 2 ? 'active' : '' }}">2</a>
                <a href="#" class="pagination-item">...</a>
                <a href="{{ $blogs->url($blogs->lastPage()) }}" class="pagination-item {{ $blogs->currentPage() == $blogs->lastPage() ? 'active' : '' }}">{{ $blogs->lastPage() }}</a>

                <a href="{{ $blogs->nextPageUrl() }}" class="pagination-item">
                    Next
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.76711 11.8159C5.53743 11.577 5.54488 11.1972 5.78374 10.9675L8.93395 8L5.78374 5.0325C5.54488 4.80282 5.53743 4.423 5.76711 4.18413C5.99679 3.94527 6.37661 3.93782 6.61548 4.1675L10.2155 7.5675C10.3331 7.68062 10.3996 7.83679 10.3996 8C10.3996 8.16321 10.3331 8.31938 10.2155 8.4325L6.61548 11.8325C6.37661 12.0622 5.99679 12.0547 5.76711 11.8159Z" fill="#626262"/>
                    </svg>
                </a>
                <a href="{{ $blogs->url($blogs->lastPage()) }}" class="pagination-item lastPage">
                    Last
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.38433 10.9675C3.14547 11.1972 3.13802 11.577 3.3677 11.8159C3.59737 12.0547 3.9772 12.0622 4.21606 11.8325L7.81606 8.4325C7.93371 8.31938 8.0002 8.16321 8.0002 8C8.0002 7.83679 7.93371 7.68062 7.81606 7.5675L4.21606 4.1675C3.9772 3.93782 3.59737 3.94527 3.3677 4.18414C3.13802 4.423 3.14547 4.80282 3.38433 5.0325L6.53453 8L3.38433 10.9675Z" fill="#626262"/>
                        <path d="M8.18433 10.9675C7.94547 11.1972 7.93802 11.577 8.1677 11.8159C8.39737 12.0547 8.7772 12.0622 9.01606 11.8325L12.6161 8.4325C12.7337 8.31938 12.8002 8.16321 12.8002 8C12.8002 7.83679 12.7337 7.68062 12.6161 7.5675L9.01606 4.1675C8.7772 3.93782 8.39737 3.94527 8.1677 4.18414C7.93802 4.423 7.94547 4.80282 8.18433 5.0325L11.3345 8L8.18433 10.9675Z" fill="#626262"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="blogs-right">
            <div class="boxBlogs">
                <h2 class="box-title">{{ $translations->where('key', 'blog_box_title')->first()->value }}</h2>
                <div class="boxBlog-links">
                    @foreach($blogs->take(6) as $blog)
                    <a href="{{ route('blog.detail', $blog->id) }}" class="boxBlog-link">
                        <h3>{{ $blog->{"title_" . app()->getLocale()} }}</h3>
                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="boxBlogs">
                <h2 class="box-title">{{ $translations->where('key', 'blog_box_popular_title')->first()->value }}</h2>
                <div class="boxBlog-links">
                    @foreach($popularBlogs->take(6) as $blog)
                    <a href="{{ route('blog.detail', $blog->id) }}" class="boxBlog-link">
                        <h3>{{ $blog->{"title_" . app()->getLocale()} }}</h3>
                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
