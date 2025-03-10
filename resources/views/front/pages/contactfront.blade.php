@extends('front.layouts.master')

@section('title')
    @php echo $translations->where('key', 'contact_title')->first()->value; @endphp
@endsection

@section('content')
<div class="page-direction p-lr">
        <a href="{{ route('home') }}" class="prev-page">{{ $translations->where('key', 'blog_prev_page')->first()->value }}</a>
        <span>/</span>                   
        <a href="{{ route('home') }}" class="current-page">{{ $translations->where('key', 'contact_title')->first()->value }}</a>

    </div>
    <div class="contact-section">
        <div class="contact-container p-lr">
            <h1 class="pageTitle">{{ $translations->where('key', 'contact_title')->first()->value }}</h1>
            <div class="short-desc">
                <p>{{ $translations->where('key', 'contact_desc')->first()->value }}</p>
            </div>
            <div class="contact-boxes">
                <div class="contact-box">
                    <div class="icon">
                        <img src="{{ $contact->logo_url }}" alt="Email Icon">
                    </div>
                    <h2 class="contact-box-title">{{ $translations->where('key', 'contact_email')->first()->value }}</h2>
                    <a href="mailto:{{ $contact->email }}" class="contact-box-desc">{{ $contact->email }}</a>
                </div>
                <div class="contact-box">
                    <div class="icon">
                        <img src="{{ $contact->logo2_url }}" alt="Location Icon">
                    </div>
                    <h2 class="contact-box-title">{{ $translations->where('key', 'contact_address')->first()->value }}</h2>
                    <a href="https://maps.google.com/?q={{ urlencode($contact->{"address_" . app()->getLocale()}) }}" 
                       target="_blank" 
                       class="contact-box-desc">{{ $contact->{"address_" . app()->getLocale()} }}</a>
                </div>
                <div class="contact-box">
                    <div class="icon">
                        <img src="{{ $contact->favicon_url }}" alt="Phone Icon">
                    </div>
                    <h2 class="contact-box-title">{{ $translations->where('key', 'contact_phone')->first()->value }}</h2>
                    <a href="tel:{{ $contact->phone }}" class="contact-box-desc">{{ $contact->phone }}</a>
                </div>
            </div>
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

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceButtons = document.querySelectorAll('.service-title');
        const serviceImage = document.getElementById('serviceImage');

        serviceButtons.forEach(button => {
            button.addEventListener('click', function() {
                const serviceItem = this.closest('.service-item');
                const detail = serviceItem.querySelector('.service-detail');
                
                // Change image
                const imageUrl = serviceItem.dataset.image;
                if (imageUrl) {
                    serviceImage.src = imageUrl;
                }

                // Toggle accordion
                if (serviceItem.classList.contains('active')) {
                    serviceItem.classList.remove('active');
                    detail.style.maxHeight = null;
                } else {
                    // Close other open items
                    document.querySelectorAll('.service-item.active').forEach(item => {
                        item.classList.remove('active');
                        item.querySelector('.service-detail').style.maxHeight = null;
                    });

                    serviceItem.classList.add('active');
                    detail.style.maxHeight = detail.scrollHeight + "px";
                }
            });
        });
    });
</script>

@endsection
