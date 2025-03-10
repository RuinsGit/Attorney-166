@extends('front.layouts.master')

@section('title')
    @php echo $translations->where('key', 'experience_title')->first()->value; @endphp
@endsection

@section('content')
<div class="page-direction p-lr">
        <a href="{{ route('home') }}" class="prev-page">{{ $translations->where('key', 'home_title_page_alt')->first()->value }}</a>
        <span>/</span>                   
        <a href="{{ route('experience.index') }}" class="current-page">{{ $translations->where('key', 'experience_title')->first()->value }}</a>

    </div>
    <div class="experience-container p-lr">
        <h1 class="pageTitle">{{ $translations->where('key', 'experience_title')->first()->value }}</h1>
        <div class="experience-main">
            <div class="experience-items">
                @foreach($courses as $course)
                    <div class="experience-item" id="course-{{ $course->id }}">
                        <h2 class="experience-title">{{ $course->name }}</h2>
                        <div class="experience-detail">
                            <p>{{ $course->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="experience-images">
                @foreach($courses as $courseImage)
                    <div class="experience-image" data-id="course-{{ $courseImage->id }}">
                        <img src="{{ asset($courseImage->image) }}" alt="{{ $courseImage->name }}">
                    </div>
                @endforeach
            </div>
        </div>
       

        <div class="review-container">
            <h2 class="reviewTitle">{{ $translations->where('key', 'testimonials_title_form')->first()->value }}</h2>

            @if(session('success'))
                <div class="alert alert-success" id="success-alert">
                    <div class="alert-icon">✓</div>
                    <div class="alert-message">{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" id="error-alert">
                    <div class="alert-icon">✕</div>
                    <div class="alert-message">{{ session('error') }}</div>
                </div>
            @endif

            <form action="{{ route('testimonial.store') }}" class="reviewForm" method="post">
                @csrf
                <h3 class="reviewFormTitle">{{ $translations->where('key', 'testimonials_form_title')->first()->value }}</h3>
                <div class="form-item">
                    <label for="name">{{ $translations->where('key', 'contact_form_name')->first()->value }}</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           placeholder="{{ $translations->where('key', 'contact_form_name')->first()->value }}"
                           value="{{ old('name') }}">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-item">
                    <label for="comment">{{ $translations->where('key', 'testimonials_form_comment')->first()->value }}</label>
                    <textarea name="comment" 
                              id="comment" 
                              placeholder="{{ $translations->where('key', 'testimonials_form_comment_button')->first()->value }}">{{ old('comment') }}</textarea>
                    @error('comment')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button class="sendReviewBtn" type="submit">
                    {{ $translations->where('key', 'testimonials_form_button_send')->first()->value }}
                </button>
            </form>
        </div>

       
    <style>
        .alert {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: left;
            font-weight: 500;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .alert-success {
            background-color: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #2e7d32;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.1);
        }

        .alert-danger {
            background-color: rgba(244, 67, 54, 0.2);
            border: 1px solid rgba(244, 67, 54, 0.3);
            color: #d32f2f;
            box-shadow: 0 4px 15px rgba(244, 67, 54, 0.1);
        }

        .alert-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            background: rgba(76, 175, 80, 0.3);
            border-radius: 50%;
            margin-right: 12px;
            font-size: 14px;
            color: #2e7d32;
        }

        .alert-danger .alert-icon {
            background: rgba(244, 67, 54, 0.3);
            color: #d32f2f;
        }

        .alert-message {
            flex: 1;
            font-size: 15px;
            line-height: 1.4;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(-20px);
                opacity: 0;
            }
        }

        .alert {
            animation: slideIn 0.3s ease forwards;
        }

        .alert.fade-out {
            animation: fadeOut 0.3s ease forwards;
        }
    </style>
 
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


