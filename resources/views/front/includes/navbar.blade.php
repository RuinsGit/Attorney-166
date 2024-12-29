<nav class=" {{request()->url() == url('/') ? 'home-navbar' : ''}} p-lr">
    <div class="navbar-container">
        <div class="navbar">
            <a href="{{ route('home') }}" class="nav-logo">
                <img src="{{ asset('front/assets/images/nav-logo.svg') }}" alt="">
            </a>
            <div class="navbar-links">
                <a href="{{ route('home') }}" class="navbar-link {{ request()->url() == url('/') ? 'active' : '' }}">Ana Səhifə</a>
                <a href="{{ route('about.index') }}" class="navbar-link {{ request()->url() == route('about.index') ? 'active' : '' }}">Haqqımızda</a>
                <a href="{{ route('service.index') }}" class="navbar-link {{ request()->url() == route('service.index') ? 'active' : '' }}">Xidmətlər</a>
                <a href="{{ route('blog.index') }}" class="navbar-link {{ request()->url() == route('blog.index') ? 'active' : '' }}">Bloq</a>
                <a href="customer_reviews.html" class="navbar-link">Müştəri rəyləri</a>
                <a href="experience.html" class="navbar-link">Təcrübə</a>
                <a href="contact.html" class="navbar-link">Əlaqə</a>
            </div>
            <button class="hamburger" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17H21M3 12H21M3 7H21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
</nav>