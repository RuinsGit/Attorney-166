@extends('front.layouts.master')

@section('title', 'Uğurlu ödəniş!')

@section('content')

 
    
    <div class="page-direction p-lr">
        <a href="index.html" class="prev-page">Ana Səhifə</a>
        <span>/</span>                   
        <a href="customer_reviews.html" class="current-page">{{ $translations->where('key', 'testimonials_title_page')->first()->value }}</a>

    </div>
    <div class="customerReview-container p-lr">
        <h1 class="pageTitle">{{ $translations->where('key', 'testimonials_title_page')->first()->value }}</h1>
        <div class="review-container">
            <h2 class="reviewTitle">{{ $translations->where('key', 'testimonials_title_form')->first()->value }}</h2>
            <form action="" class="reviewForm" method="post">
                <h3 class="reviewFormTitle">{{ $translations->where('key', 'testimonials_form_title')->first()->value }}</h3>
                <div class="form-item">
                    <label for="">{{ $translations->where('key', 'contact_form_name')->first()->value }}</label>
                    <input type="text" placeholder="{{ $translations->where('key', 'contact_form_name')->first()->value }}">
                </div>
                <div class="form-item">
                    <label for="">{{ $translations->where('key', 'testimonials_form_comment')->first()->value }}</label>
                    <textarea name="" id="" placeholder="{{ $translations->where('key', 'testimonials_form_comment_button')->first()->value }}"></textarea>
                </div>
                <button class="sendReviewBtn" type="submit">{{ $translations->where('key', 'testimonials_form_button_send')->first()->value }}</button>
            </form>
        </div>
        <div class="customerReview-main">
            <div class="customerReview-main-left">
                <p>Müştəri rəyləri</p>
                <h2>Müştərilərimiz nə deyir?</h2>
            </div>
            
            <div class="customerReview-main-right">
                <img src="{{ asset('front/assets/images/bubble.svg') }}" alt="">
                <div class="customerReview-boxes-main">
                    <div class="customerReview-boxes">
                        <div class="customerReview-box">
                            <div class="customerReview-box-inner">
                                <div class="own-img">
                                    <img src="{{ asset('front/assets/images/ownImg1.svg') }}" alt="">
                                </div>
                                <div class="reviewText">
                                    <p>“On the Windows talking painted pasture yet its express parties use. Sure last upon he same as knew next. Of believed or diverted no.”</p>
                                </div>
                                <h3 class="ownFullName">Dinesh singh</h3>
                            </div>
    
                        </div>
                        <div class="customerReview-box">
                            <div class="customerReview-box-inner">
                                <div class="own-img">
                                    <img src="{{ asset('front/assets/images/ownImg2.svg') }}" alt="">
                                </div>
                                <div class="reviewText">
                                    <p>“express parties use. Sure last upon he same as knew next. Of believed or diverted no.”</p>
                                </div>
                                <h3 class="ownFullName">Will Smith</h3>
                            </div>
                        </div>
                        <div class="customerReview-box">
                            <div class="customerReview-box-inner">
                                <div class="own-img">
                                    <img src="{{ asset('front/assets/images/ownImg3.svg') }}" alt="">
                                </div>
                                <div class="reviewText">
                                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, iure?”</p>
                                </div>
                                <h3 class="ownFullName">Arnold Schwarzenegger</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
