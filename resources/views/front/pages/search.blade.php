@extends('front.layouts.master')
@section('content')
    <div class="search-result-container p-lr">
        <h1 class="title">Axtarış nəticələri</h1>
        <div class="search-result-list">
            @foreach ($search_result as $result)
                <a href="{{ $result['url'] }}" class="search-result-item">{{ $result['title'] }}</a>
            @endforeach
        </div>
    </div>
    <div class="mobil-menu-container">
        <div class="mobil-menu">
            <div class="mobil-menu-top">
                <a href="index.html" class="mobile-logo">
                    <img src="./front/assets/images/nav-logo.svg" alt="">
                </a>
                <button class="closeMobileMenu" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#FF0032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="#FF0032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        
                </button>
            </div>
            <div class="mobile-menu-links">
                <a href="{{ route('home') }}" class="mobile-menu-link">Ana Səhifə</a>
                <a href="{{ route('about.index') }}" class="mobile-menu-link">Haqqımızda</a>
                <a href="{{ route('service.index') }}" class="mobile-menu-link">Xidmətlər</a>
                <a href="{{ route('blog.index') }}" class="mobile-menu-link">Bloq</a>
                <a href="{{ route('testimonial.index') }}" class="mobile-menu-link">Müştəri rəyləri</a>
                <a href="{{ route('experience.index') }}" class="mobile-menu-link">Təcrübə</a>
                <a href="{{ route('contactfront') }}" class="mobile-menu-link">Əlaqə</a>
            </div>
        </div>
    </div>
@endsection
