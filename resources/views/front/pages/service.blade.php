@extends('front.layouts.master')

@section('title', $settings['service'])

@section('content')
<div class="page-direction p-lr">
    <a href="{{ route('home') }}" class="prev-page">Ana Səhifə</a>
    <span>/</span>                   
    <a href="{{ route('service.index') }}" class="current-page">Xidmətlər</a>
</div>
<div class="service-container p-lr">
    <h1 class="pageTitle">Xidmətlərimiz</h1>
    <div class="service-main">
        <div class="serviceImg">
            <img src="./front/assets/images/serviceImg.png" alt="">
        </div>
        <div class="service-items">
            <div class="service-item">
                <button class="service-title" type="button">
                    <p>Ümumi hüquqi xidmətlər</p>

                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41635 1.16667L10.9997 10.75L20.583 1.16667" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                            
                </button>
                <div class="service-detail">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type </p>
                </div>
            </div>
            <div class="service-item">
                <button class="service-title" type="button">
                    <p>Miqrasiya və Əmək münasibətləri</p>

                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41635 1.16667L10.9997 10.75L20.583 1.16667" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                            
                </button>
                <div class="service-detail">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type </p>
                </div>
            </div>
            <div class="service-item">
                <button class="service-title" type="button">
                    <p>Biznesin qurulması</p>

                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41635 1.16667L10.9997 10.75L20.583 1.16667" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                            
                </button>
                <div class="service-detail">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type </p>
                </div>
            </div>
            <div class="service-item">
                <button class="service-title" type="button">
                    <p>Məhkəmə mübahisələri</p>

                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41635 1.16667L10.9997 10.75L20.583 1.16667" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                            
                </button>
                <div class="service-detail">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="online-application-container p-lr">
    <div class="online-application-main">
        <h2 class="section-title">Online Müraciət formu</h2>
        <form action="" class="online-application-from" method="post">
            <h3 class="form-title">Əlaqə forması</h3>
            <div class="form-item">
                <label for="">Ad</label>
                <input type="text" placeholder="Adınız">
            </div>
            <div class="form-item">
                <label for="">Telefon</label>
                <input type="text" placeholder="+994 00 000 00 00">
            </div>
            <div class="form-item">
                <label for="">Sualınız</label>
                <textarea name="" id="" placeholder="Sualınızı yazın"></textarea>
            </div>
            <button class="send-onlineApplication" type="submit">Göndər</button>
        </form>
        <div class="online-application-img">
            <img src="./front/assets/images/online-application.svg" alt="">
        </div>
    </div>
</div>
@endsection
