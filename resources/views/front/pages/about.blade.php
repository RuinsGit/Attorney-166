@extends('front.layouts.master')

@section('title', $settings['about_us'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home') }}" class="prev-page">Ana Səhifə</a>
        <span>/</span>                   
        <a href="{{ route('about.index') }}" class="current-page">Haqqımızda</a>
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
            <p>Bizi izləyin</p>
        </div>
        <div class="about-content">
            <h1 class="pageTitle">Haqqımızda</h1>
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
    <div class="our-staff-container p-lr">
        <h2 class="section-title">Komandamız</h2>
        <div class="our-staff-carts">
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff1.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff2.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff3.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff4.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff4.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff3.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                                <img src="./front/assets/images/staff2.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
            <div class="our-staff-cart">
                <img src="./front/assets/images/staff1.png" alt="">
                <div class="cart-body">
                    <h3 class="staffName">Joseph-Siffred Duplessis</h3>
                    <p>Lawyer</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-service-container p-lr">
        <h2 class="section-title"><span class="line"></span><p>XİDMƏTLƏR</p></h2>
        <div class="service-slide swiper">
            <div class="swiper-wrapper">
                <a href="service.html" class="service-cart swiper-slide">
                    <div class="icon">
                        <img src="./front/assets/icons/general-law.svg" alt="">
                    </div>
                    <h3 class="cart-name">Ümumi hüquqi xidmətlər</h3>
                    <div class="cart-desc">
                        <p>Biz müntəzəm, təkrarlanan və faktiki hüquqi məsələlərlə bağlı olan xidmətlər və həllər təqdim edirik.</p>
                    </div>
                    <div class="cart-bottom">
                        <p>Daha çox</p>
                        <span class="line"></span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9999 26.8801C22.0159 26.8801 26.8799 22.0161 26.8799 16.0001C26.8799 9.98412 22.0159 5.12012 15.9999 5.12012C9.98388 5.12012 5.11988 9.98412 5.11988 16.0001C5.11988 22.0161 9.98388 26.8801 15.9999 26.8801ZM15.9999 6.40012C21.3119 6.40012 25.5999 10.6881 25.5999 16.0001C25.5999 21.3121 21.3119 25.6001 15.9999 25.6001C10.6879 25.6001 6.39988 21.3121 6.39988 16.0001C6.39988 10.6881 10.6879 6.40012 15.9999 6.40012Z" fill="black"/>
                            <path d="M15.8081 22.208L22.0161 16L15.8081 9.79199L14.9121 10.688L20.2241 16L14.9121 21.312L15.8081 22.208Z" fill="black"/>
                            <path d="M21.1201 15.3601H10.2401V16.6401H21.1201V15.3601Z" fill="black"/>
                        </svg>
                    </div>
                </a>
                <a href="service.html" class="service-cart swiper-slide">
                    <div class="icon">
                        <img src="./front/assets/icons/commersion.svg" alt="">
                    </div>
                    <h3 class="cart-name">Kommersiya və koorperativ hüquq</h3>
                    <div class="cart-desc">
                        <p>Biz kommersiya və korporativ məsələlərlə bağlı xidmətlər və həllər təqdim edərək, eyni zamanda biznesinizin bütün müvafiq qanunlara və qaydalara uyğun olmasını və bütün biznes hərəkətlərinizin və əməl edilir</p>
                    </div>
                    <div class="cart-bottom">
                        <p>Daha çox</p>
                        <span class="line"></span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9999 26.8801C22.0159 26.8801 26.8799 22.0161 26.8799 16.0001C26.8799 9.98412 22.0159 5.12012 15.9999 5.12012C9.98388 5.12012 5.11988 9.98412 5.11988 16.0001C5.11988 22.0161 9.98388 26.8801 15.9999 26.8801ZM15.9999 6.40012C21.3119 6.40012 25.5999 10.6881 25.5999 16.0001C25.5999 21.3121 21.3119 25.6001 15.9999 25.6001C10.6879 25.6001 6.39988 21.3121 6.39988 16.0001C6.39988 10.6881 10.6879 6.40012 15.9999 6.40012Z" fill="black"/>
                            <path d="M15.8081 22.208L22.0161 16L15.8081 9.79199L14.9121 10.688L20.2241 16L14.9121 21.312L15.8081 22.208Z" fill="black"/>
                            <path d="M21.1201 15.3601H10.2401V16.6401H21.1201V15.3601Z" fill="black"/>
                        </svg>
                    </div>
                </a>
                <a href="service.html" class="service-cart swiper-slide">
                    <div class="icon">
                        <img src="./front/assets/icons/migration.svg" alt="">
                    </div>
                    <h3 class="cart-name">Miqrasiya və əmək münasibətləri</h3>
                    <div class="cart-desc">
                        <p>
                            Biz miqrasiya və əmək münasibətləri ilə bağlı xidmətlər və həllər təqdim edirik. Biz sahibkarlıq subyektlərinə əmək müqavilələri, iş və yaşayış icazələri, əmək mübahisələri və digər mürəkkəb məsələlər
                        </p>
                    </div>
                    <div class="cart-bottom">
                        <p>Daha çox</p>
                        <span class="line"></span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9999 26.8801C22.0159 26.8801 26.8799 22.0161 26.8799 16.0001C26.8799 9.98412 22.0159 5.12012 15.9999 5.12012C9.98388 5.12012 5.11988 9.98412 5.11988 16.0001C5.11988 22.0161 9.98388 26.8801 15.9999 26.8801ZM15.9999 6.40012C21.3119 6.40012 25.5999 10.6881 25.5999 16.0001C25.5999 21.3121 21.3119 25.6001 15.9999 25.6001C10.6879 25.6001 6.39988 21.3121 6.39988 16.0001C6.39988 10.6881 10.6879 6.40012 15.9999 6.40012Z" fill="black"/>
                            <path d="M15.8081 22.208L22.0161 16L15.8081 9.79199L14.9121 10.688L20.2241 16L14.9121 21.312L15.8081 22.208Z" fill="black"/>
                            <path d="M21.1201 15.3601H10.2401V16.6401H21.1201V15.3601Z" fill="black"/>
                        </svg>
                    </div>
                </a>
                <a href="service.html" class="service-cart swiper-slide">
                    <div class="icon">
                        <img src="./front/assets/icons/business.svg" alt="">
                    </div>
                    <h3 class="cart-name">Biznesin qurulması</h3>
                    <div class="cart-desc">
                        <p>Biz biznes qurmaqla bağlı xidmətlər və həllər təqdim edirik. İlkin məsləhətləşmədən sonra komandamız yeni başlayan biznesə vergi və əməliyyat məsələləri baxımından ən effektiv hüquqi şəxs formasını</p>
                    </div>
                    <div class="cart-bottom">
                        <p>Daha çox</p>
                        <span class="line"></span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9999 26.8801C22.0159 26.8801 26.8799 22.0161 26.8799 16.0001C26.8799 9.98412 22.0159 5.12012 15.9999 5.12012C9.98388 5.12012 5.11988 9.98412 5.11988 16.0001C5.11988 22.0161 9.98388 26.8801 15.9999 26.8801ZM15.9999 6.40012C21.3119 6.40012 25.5999 10.6881 25.5999 16.0001C25.5999 21.3121 21.3119 25.6001 15.9999 25.6001C10.6879 25.6001 6.39988 21.3121 6.39988 16.0001C6.39988 10.6881 10.6879 6.40012 15.9999 6.40012Z" fill="black"/>
                            <path d="M15.8081 22.208L22.0161 16L15.8081 9.79199L14.9121 10.688L20.2241 16L14.9121 21.312L15.8081 22.208Z" fill="black"/>
                            <path d="M21.1201 15.3601H10.2401V16.6401H21.1201V15.3601Z" fill="black"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
