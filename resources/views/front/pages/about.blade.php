@extends('front.layouts.master')

@section('title')
    @php echo $translations->where('key', 'about_us')->first()->value; @endphp
@endsection

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home') }}" class="prev-page">{{ $translations->where('key', 'home_title_page_alt')->first()->value }}</a>
        <span>/</span>                   
        <a href="{{ route('about.index') }}" class="current-page">{{ $translations->where('key', 'about_us')->first()->value }}</a>
    </div>
    <div class="about-container p-lr">
        <div class="aboutFollow">
            <span class="line"></span>
            <div class="aboutFollow-items">
                @foreach($socialMedia as $social)
                    @if($social->status)
                        <a href="{{ $social->link }}" class="aboutFollow-item" target="_blank">
                            <img src="{{ asset($social->image) }}" alt="social media">
                        </a>
                    @endif
                @endforeach
            </div>
            <span class="line"></span>
            <p>{{ $translations->where('key', 'about_us_follow_us')->first()->value }}</p>
        </div>
        <div class="about-content">
            <h1 class="pageTitle">{{ $translations->where('key', 'about_us')->first()->value }}</h1>
            <div class="aboutImg">
                <img src="{{ asset($about->image) }}" alt="about image">
            </div>
            <h2 class="aboutOwnerName">{{ $about->{"title_" . app()->getLocale()} }}</h2>
            <div class="aboutOwnerInfo">
                <p>{!! $about->{"description_" . app()->getLocale()} !!}</p>
            </div>
            <div class="aboutContent">
               
            </div>
        </div>
    </div>
    @php
        $leaders = App\Models\Leader::all();
    @endphp

    @if($leaders->isNotEmpty())
        <div class="our-staff-container p-lr">
            <h2 class="section-title">{{ $translations->where('key', 'about_us_our_staff')->first()->value }}</h2>
            <div class="our-staff-carts">
                @foreach($leaders as $leader)
                    <div class="our-staff-cart">
                        <img src="{{ asset($leader->image) }}" alt="">
                        <div class="cart-body">
                            <h3 class="staffName">{{ $leader->name }}</h3>
                            <p>{{ $leader->position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

<div class="about-service-container p-lr">
    <h2 class="section-title"><span class="line"></span><p>{{ $translations->where('key', 'about_us_services')->first()->value }}</p></h2>
    <div class="service-slide swiper">
        <div class="swiper-wrapper">
            @foreach(App\Models\Service::where('status', true)->get() as $service)
                <a href="service.html" class="service-cart swiper-slide">
                    <div class="icon">
                        <img src="{{ asset($service->bottom_image) }}" alt="">
                    </div>
                    <h3 class="cart-name">{{ $service->title }}</h3>
                    <div class="cart-desc">
                        <p>{!! $service->description !!}</p>
                    </div>
                    <div class="cart-bottom">
                        <p>{{ $translations->where('key', 'about_us_services_more')->first()->value }}</p>
                        <span class="line"></span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9999 26.8801C22.0159 26.8801 26.8799 22.0161 26.8799 16.0001C26.8799 9.98412 22.0159 5.12012 15.9999 5.12012C9.98388 5.12012 5.11988 9.98412 5.11988 16.0001C5.11988 22.0161 9.98388 26.8801 15.9999 26.8801ZM15.9999 6.40012C21.3119 6.40012 25.5999 10.6881 25.5999 16.0001C25.5999 21.3121 21.3119 25.6001 15.9999 25.6001C10.6879 25.6001 6.39988 21.3121 6.39988 16.0001C6.39988 10.6881 10.6879 6.40012 15.9999 6.40012Z" fill="black"/>
                            <path d="M15.8081 22.208L22.0161 16L15.8081 9.79199L14.9121 10.688L20.2241 16L14.9121 21.312L15.8081 22.208Z" fill="black"/>
                            <path d="M21.1201 15.3601H10.2401V16.6401H21.1201V15.3601Z" fill="black"/>
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>
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
                <a href="{{ route('home') }}" class="mobile-menu-link">{{ $header->{"homepage_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('about.index') }}" class="mobile-menu-link">{{ $header->{"about_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('service.index') }}" class="mobile-menu-link">{{ $header->{"services_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('blog.index') }}" class="mobile-menu-link">{{ $header->{"blog_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('testimonial.index') }}" class="mobile-menu-link">{{ $header->{"testimonials_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('experience.index') }}" class="mobile-menu-link">{{ $header->{"experience_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('contactfront') }}" class="mobile-menu-link">{{ $header->{"contact_title_" . app()->getLocale()} }}</a>
            </div>
        </div>
    </div>
@endsection
