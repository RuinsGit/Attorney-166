@extends('front.layouts.master')

@section('title')
    @php echo $translations->where('key', 'blog_prev_page')->first()->value; @endphp
@endsection

@section('content')
<div class="home-hero p-lr">
        <div class="hero-bg p-lr">
            <div class="hero-bg-img">
                <img src="{{ asset('uploads/'.$hero->background_image) }}" alt="">
            </div>
        </div>
        <div class="hero-inner">
            <div class="hero-left">
                <div class="hero-content">
                    <h1>{{ $hero->{"text_" . app()->getLocale()} }}</h1>
                    <p>{!! $hero->{"description_" . app()->getLocale()} !!}</p>
                    <a href="{{route('about.index')}}" class="hero-link">{{ $translations->where('key', 'about_more1')->first()->value }}</a>
                </div>
                <div class="hero-contacts">
                    <a href="" class="hero-contact-item">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_288_451)">
                            <path d="M2.85269 9.81737C4.23354 11.468 5.89579 12.7676 7.79301 13.6872C8.51535 14.0296 9.48137 14.4357 10.5576 14.5053C10.6243 14.5082 10.6882 14.5111 10.7549 14.5111C11.4772 14.5111 12.0574 14.2616 12.5303 13.7482C12.5332 13.7453 12.539 13.7395 12.5419 13.7337C12.7101 13.5306 12.9016 13.3478 13.1018 13.1535C13.2381 13.0229 13.3773 12.8866 13.5108 12.7473C14.1287 12.1033 14.1287 11.2852 13.505 10.6615L11.7615 8.91807C11.4656 8.61057 11.1117 8.44812 10.7404 8.44812C10.3691 8.44812 10.0122 8.61057 9.70764 8.91517L8.6691 9.95371C8.57337 9.89859 8.47474 9.84928 8.38191 9.80286C8.26587 9.74484 8.15853 9.68972 8.0628 9.6288C7.11709 9.02831 6.25841 8.24505 5.43744 7.23842C5.0226 6.71335 4.74411 6.2724 4.54975 5.82275C4.82244 5.57617 5.07772 5.31799 5.3243 5.06561C5.41133 4.97568 5.50126 4.88575 5.59119 4.79582C5.90449 4.48251 6.07275 4.11989 6.07275 3.75147C6.07275 3.38305 5.90739 3.02043 5.59119 2.70713L4.72671 1.84265C4.62517 1.74111 4.52944 1.64248 4.43081 1.54095C4.23935 1.34368 4.03918 1.14062 3.84192 0.957855C3.54312 0.664859 3.1921 0.511108 2.82078 0.511108C2.45236 0.511108 2.09844 0.664859 1.78804 0.960756L0.703084 2.04571C0.308554 2.44024 0.0851809 2.9189 0.0387656 3.47298C-0.0163525 4.16631 0.111289 4.90315 0.441998 5.79374C0.949665 7.1717 1.71552 8.45102 2.85269 9.81737ZM0.746598 3.5339C0.78141 3.14807 0.929358 2.82607 1.20785 2.54758L2.287 1.46842C2.45526 1.30597 2.64092 1.22184 2.82078 1.22184C2.99774 1.22184 3.1776 1.30597 3.34295 1.47422C3.53732 1.65408 3.72008 1.84265 3.91734 2.04281C4.01597 2.14435 4.11751 2.24588 4.21904 2.35031L5.08352 3.2148C5.26338 3.39466 5.35621 3.57742 5.35621 3.75728C5.35621 3.93713 5.26338 4.11989 5.08352 4.29975C4.99359 4.38968 4.90366 4.48251 4.81373 4.57244C4.54395 4.84513 4.29156 5.10332 4.01307 5.3499C4.00727 5.3557 4.00437 5.3586 3.99857 5.3644C3.75779 5.60518 3.7955 5.83436 3.85352 6.00841C3.85642 6.01712 3.85932 6.02292 3.86222 6.03162C4.0856 6.5683 4.396 7.07887 4.88046 7.68807C5.75074 8.76142 6.66744 9.59399 7.67698 10.2351C7.80172 10.3163 7.93516 10.3802 8.0599 10.444C8.17594 10.502 8.28327 10.5571 8.37901 10.618C8.39061 10.6238 8.39931 10.6296 8.41092 10.6354C8.50665 10.6848 8.59948 10.708 8.69231 10.708C8.92439 10.708 9.07523 10.56 9.12455 10.5107L10.2095 9.42574C10.3778 9.25748 10.5605 9.16755 10.7404 9.16755C10.9609 9.16755 11.1407 9.3039 11.2538 9.42574L13.0031 11.1721C13.3512 11.5202 13.3483 11.8974 12.9944 12.2658C12.8726 12.3963 12.7449 12.5211 12.6086 12.6516C12.4055 12.8489 12.1938 13.0519 12.0023 13.2811C11.6687 13.6408 11.2713 13.8091 10.7578 13.8091C10.7085 13.8091 10.6563 13.8062 10.6069 13.8033C9.65543 13.7424 8.77063 13.371 8.10632 13.0548C6.30192 12.1816 4.718 10.9429 3.40387 9.37062C2.32182 8.06809 1.59368 6.85549 1.11212 5.55587C0.81332 4.7581 0.700183 4.11699 0.746598 3.5339Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_288_451">
                            <rect width="14" height="14" fill="white" transform="translate(0 0.511108)"/>
                            </clipPath>
                            </defs>
                        </svg>
                        {{ $hero->number_az }}
                    </a>
                    <a href="" class="hero-contact-item">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_288_454)">
                            <path d="M9.33723 9.76109C10.827 7.42339 10.6397 7.71504 10.6827 7.65409C11.225 6.88907 11.5117 5.98866 11.5117 5.05017C11.5117 2.56134 9.49208 0.511108 7 0.511108C4.51604 0.511108 2.48828 2.5573 2.48828 5.05017C2.48828 5.98806 2.78097 6.91203 3.34113 7.68737L4.66271 9.76112C3.24972 9.97825 0.847656 10.6253 0.847656 12.0502C0.847656 12.5696 1.18666 13.3098 2.8017 13.8865C3.92941 14.2893 5.42038 14.5111 7 14.5111C9.95381 14.5111 13.1523 13.6779 13.1523 12.0502C13.1523 10.6251 10.7531 9.97869 9.33723 9.76109ZM4.02634 7.23617C4.02183 7.22911 4.01712 7.22222 4.0122 7.21544C3.54607 6.57417 3.30859 5.81418 3.30859 5.05017C3.30859 2.9989 4.96032 1.33142 7 1.33142C9.03544 1.33142 10.6914 2.99964 10.6914 5.05017C10.6914 5.81541 10.4584 6.54962 10.0175 7.17399C9.97798 7.2261 10.1841 6.90585 7 11.9022L4.02634 7.23617ZM7 13.6908C3.7736 13.6908 1.66797 12.7424 1.66797 12.0502C1.66797 11.5849 2.74991 10.8198 5.14741 10.5216L6.6541 12.8859C6.72941 13.004 6.85984 13.0756 6.99997 13.0756C7.14011 13.0756 7.27057 13.004 7.34584 12.8859L8.85251 10.5216C11.2501 10.8198 12.332 11.5849 12.332 12.0502C12.332 12.7366 10.2453 13.6908 7 13.6908Z" fill="white"/>
                            <path d="M7 2.99939C5.8692 2.99939 4.94922 3.91937 4.94922 5.05017C4.94922 6.18097 5.8692 7.10095 7 7.10095C8.1308 7.10095 9.05078 6.18097 9.05078 5.05017C9.05078 3.91937 8.1308 2.99939 7 2.99939ZM7 6.28064C6.32152 6.28064 5.76953 5.72865 5.76953 5.05017C5.76953 4.37169 6.32152 3.8197 7 3.8197C7.67848 3.8197 8.23047 4.37169 8.23047 5.05017C8.23047 5.72865 7.67848 6.28064 7 6.28064Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_288_454">
                            <rect width="14" height="14" fill="white" transform="translate(0 0.511108)"/>
                            </clipPath>
                            </defs>
                            </svg>
                            
                        {{ $hero->text2_az }}
                    </a>
                    <a href="" class="hero-contact-item">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.0833 6.35923V3.42778C11.0833 2.78436 10.5601 2.26111 9.91665 2.26111H1.16665C0.523223 2.26111 0 2.78433 0 3.42778V9.26111C0 9.90453 0.523223 10.4278 1.16668 10.4278H7.70771C8.08987 11.7724 9.32621 12.7611 10.7917 12.7611C11.3556 12.7611 11.9102 12.6127 12.3961 12.3316C12.5354 12.251 12.5833 12.0727 12.5024 11.9331C12.4217 11.7935 12.2432 11.7454 12.1039 11.8269C11.7068 12.0565 11.2531 12.1778 10.7916 12.1778C9.34412 12.1778 8.16665 11.0003 8.16665 9.55278C8.16665 8.10529 9.34415 6.92778 10.7916 6.92778C12.2391 6.92778 13.4166 8.10529 13.4166 9.55278V9.84446C13.4166 10.166 13.1549 10.4278 12.8333 10.4278C12.5118 10.4278 12.25 10.166 12.25 9.84446V8.67778C12.25 8.51657 12.1195 8.38611 11.9583 8.38611C11.8799 8.38611 11.8094 8.41785 11.757 8.46814C11.4992 8.23842 11.1633 8.09443 10.7916 8.09443C9.98758 8.09443 9.33332 8.74869 9.33332 9.55276C9.33332 10.3568 9.98758 11.0111 10.7917 11.0111C11.2263 11.0111 11.6128 10.8161 11.8802 10.5134C12.0915 10.8135 12.4391 11.0111 12.8334 11.0111C13.4768 11.0111 14 10.4879 14 9.84443V9.55276C14 7.88214 12.716 6.50726 11.0833 6.35923ZM1.16668 2.84443H9.91668C9.92882 2.84443 9.93899 2.85064 9.95096 2.85138L5.78151 6.2738C5.63311 6.36724 5.41806 6.34785 5.3215 6.28862L1.13274 2.85132C1.14458 2.85061 1.15464 2.84443 1.16668 2.84443ZM10.5 6.35923C8.86728 6.50726 7.58332 7.88214 7.58332 9.55278C7.58332 9.65122 7.58937 9.74824 7.59809 9.84446H1.16668C0.845113 9.84446 0.583352 9.5827 0.583352 9.26114V3.42778C0.583352 3.34518 0.60159 3.26717 0.632707 3.19591L4.97716 6.75861C5.14691 6.86941 5.34204 6.92781 5.5417 6.92781C5.73368 6.92781 5.92137 6.8737 6.08658 6.77116C6.1031 6.76233 6.11877 6.7518 6.13359 6.73955L10.4506 3.19585C10.4818 3.26717 10.5 3.34518 10.5 3.42781V6.35923H10.5ZM10.7917 10.4278C10.3092 10.4278 9.91668 10.0353 9.91668 9.55278C9.91668 9.07028 10.3092 8.67778 10.7917 8.67778C11.2742 8.67778 11.6667 9.07028 11.6667 9.55278C11.6667 10.0353 11.2742 10.4278 10.7917 10.4278Z" fill="white"/>
                        </svg>                            
                        {{ $hero->mail_az }} 
                    </a>
                </div>
            </div>
            <div class="hero-img">
                <img src="{{ asset('uploads/'.$hero->image) }}" alt="">
            </div>
        </div>

    </div>
    <div class="home-about-section p-lr">
        <div class="home-about-container">
            <div class="home-advantages-boxes">
                @foreach($cards as $card)
                <div class="home-advantage-box">
                    <div class="box-inner">
                        <div class="icon">
                            <img src="{{ asset($card->image) }}" alt="{{ $card->name }}">
                        </div>
                        <h2 class="advantage-title">{{ $card->name }}</h2>
                        <span class="underline"></span>
                        <div class="box-desc">
                            <p>
                                {{ $card->description }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="home-about">
                <div class="home-about-box">
                    <h2 class="smallTitle">{{ $include->{"name1_" . app()->getLocale()} }}</h2>
                    <h3 class="home-about-title">{{ $include->{"text1_" . app()->getLocale()} }}</h3>
                    <span class="underline"></span>
                    <div class="box-desc">
                        <p>
                            {{ $include->{"description1_" . app()->getLocale()} }}
                        </p>
                    </div>
                    <a href="{{route('about.index')}}" class="more">{{ $translations->where('key', 'about_more1')->first()->value }}</a>
                </div>
                <div class="home-about-img">
                    <img src="{{ asset($include->image1) }}" alt="">
                </div>
                <div class="home-about-box">
                    <h2 class="smallTitle">{{ $include->{"name2_" . app()->getLocale()} }}</h2>
                    <h3 class="home-about-title">{{ $include->{"text2_" . app()->getLocale()} }}</h3>
                    <span class="underline"></span>
                    <div class="box-desc">
                        <p>
                            {{ $include->{"description2_" . app()->getLocale()} }}
                        </p>
                    </div>
                    <a href="{{route('about.index')}}" class="more">{{ $translations->where('key', 'about_more2')->first()->value }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="home-service-section p-lr">
        <div class="home-service-inner">
            <div class="home-service-head">
                <h2 class="section-title">{{ $translations->where('key', 'services_title')->first()->value }}</h2>
                <a href="{{route('service.index')}}" class="more">{{ $translations->where('key', 'services_more')->first()->value }}</a>
            </div>
            <div class="home-service-boxes">
                @foreach($services as $service)
                <a href="{{route('service.index', $service->id)}}" class="home-service-box">
                    <div class="icon">
                        <div class="icon-inner">
                            <img src="{{ asset($service->bottom_image) }}" alt="{{ $service->title }}">
                        </div>
                    </div>
                    <h3 class="service_name">{{ $service->title }}</h3>
                    <span class="underline"></span>
                </a>
                @endforeach
            </div>
            <div class="home-service-bg">
                <img src="{{ asset('front/assets/images/bg-img.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="home-blogs-container p-lr">
        <div class="home-blog-head">
            <h2 class="section-title">{{ $translations->where('key', 'blogs_title')->first()->value }}</h2>
            <a href="{{route('blog.index')}}" class="more">{{ $translations->where('key', 'blogs_more')->first()->value }}</a>
        </div>
        <div class="home-blog-slide swiper">
            <div class="swiper-wrapper">
                @foreach($blogs as $blog)
                <a href="{{ route('blog.detail', $blog->id) }}" class="blog-cart swiper-slide">
                    <div class="cart-img">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                    <div class="cart-body">
                        <p class="cart-date">{{ $blog->created_at->format('M d, Y') }}</p>
                        <h3 class="cart-name">
                            {{ $blog->title }}
                        </h3>
                        <span class="underline"></span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="testimonials-container p-lr">
        <h2 class="section-title">{{ $translations->where('key', 'testimonials_title')->first()->value }}</h2>
        <div class="testimonials-boxes">
            @foreach($comments as $comment)
            <div class="testimonial-box">
                <div class="testimonial-box-head">
                    <div class="testimonial-img">
                        <img src="{{ asset($comment->image) }}" alt="{{ $comment->name }}">
                    </div>
                    <div class="box-head-main">
                        <h3 class="owner-fullname">{{ $comment->name }}</h3>
                        <p>{{ $comment->position }}</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>{{ $comment->comment }}</p>
                </div>
                <span class="testimonial-date">{{ $comment->created_at->format('d.m.Y') }}</span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="online-application-container p-lr">
        <div class="online-application-main">
            <h2 class="section-title">{{ $contactdata->{"message_" . app()->getLocale()} }}</h2>
            <form action="{{ route('contact.store') }}" class="online-application-from" method="POST">
                @csrf
                <h3 class="form-title">{{ $translations->where('key', 'contact_form_title')->first()->value }}</h3>
                
                @if(session('success'))
                    <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="form-item">
                    <label for="name">{{ $translations->where('key', 'contact_form_name')->first()->value }}</label>
                    <input type="text" id="name" name="name" placeholder="{{ $translations->where('key', 'contact_form_name_placeholder')->first()->value }}" value="{{ old('name') }}" required>
                    @error('name')
                        <span style="color: #dc3545; font-size: 14px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-item">
                    <label for="email">{{ $translations->where('key', 'Contact_form_mail')->first()->value }}</label>
                    <input type="email" id="email" name="email" placeholder="{{ $translations->where('key', 'contact_form_mail_placeholder')->first()->value }}" value="{{ old('email') }}" required>
                    @error('email')
                        <span style="color: #dc3545; font-size: 14px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-item">
                    <label for="phone">{{ $translations->where('key', 'contact_form_phone')->first()->value }}</label>
                    <input type="text" id="phone" name="phone" placeholder="{{ $translations->where('key', 'contact_form_phone_placeholder')->first()->value }}" value="{{ old('phone') }}" required>
                    @error('phone')
                        <span style="color: #dc3545; font-size: 14px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-item">
                    <label for="message">{{ $translations->where('key', 'contact_form_message')->first()->value }}</label>
                    <textarea id="message" name="message" placeholder="{{ $translations->where('key', 'contact_form_message_placeholder')->first()->value }}" required>{{ old('message') }}</textarea>
                    @error('message')
                        <span style="color: #dc3545; font-size: 14px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <button class="send-onlineApplication" type="submit">{{ $translations->where('key', 'contact_form_send')->first()->value }}</button>
            </form>
            <div class="online-application-img">
                <img src="{{ asset($contactdata->image) }}" alt="">
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

