@extends('front.layouts.master')

@section('title', $settings['service'])

@section('content')
<div class="page-direction p-lr">
    <a href="{{ route('home') }}" class="prev-page">Ana Səhifə</a>
    <span>/</span>                   
    <a href="{{ route('service.index') }}" class="current-page">Xidmətlər</a>
</div>
<div class="service-container p-lr">
    <h1 class="pageTitle">{{ $translations->where('key', 'service_title')->first()->value }}</h1>
    <div class="service-main">
        <div class="serviceImg">
            <img src="{{ asset($services->first()->image) }}" alt="" id="serviceImage">
        </div>
        <div class="service-items">
            @foreach($services as $key => $service)
            <div class="service-item" data-image="{{ asset($service->image) }}">
                <button class="service-title" type="button">
                    <p>{{ $service->{"title_" . app()->getLocale()} }}</p>
                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41635 1.16667L10.9997 10.75L20.583 1.16667" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                            
                </button>
                <div class="service-detail">
                    <p>{!! $service->{"description_" . app()->getLocale()} !!}</p>
                </div>
            </div>
            @endforeach
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
