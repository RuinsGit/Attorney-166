<nav class=" {{request()->url() == url('/') ? 'home-navbar' : ''}} p-lr">
    <div class="navbar-container">
        <div class="navbar">
            <a href="{{ route('home') }}" class="nav-logo">
                <img src="{{ asset('uploads/'.$header->logo) }}" alt="">
            </a>
            <div class="navbar-links">
                <a href="{{ route('home') }}" class="navbar-link {{ request()->url() == url('/') ? 'active' : '' }}">{{ $header->{"homepage_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('about.index') }}" class="navbar-link {{ request()->url() == route('about.index') ? 'active' : '' }}">{{ $header->{"about_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('service.index') }}" class="navbar-link {{ request()->url() == route('service.index') ? 'active' : '' }}">{{ $header->{"services_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('blog.index') }}" class="navbar-link {{ request()->url() == route('blog.index') ? 'active' : '' }}">{{ $header->{"blog_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('testimonial.index') }}" class="navbar-link {{ request()->routeIs('testimonial.index') ? 'active' : '' }}">{{ $header->{"testimonials_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('experience.index') }}" class="navbar-link {{ request()->routeIs('experience.index') ? 'active' : '' }}">{{ $header->{"experience_title_" . app()->getLocale()} }}</a>
                <a href="{{ route('contactfront') }}" class="navbar-link {{ request()->routeIs('contactfront') ? 'active' : '' }}">{{ $header->{"contact_title_" . app()->getLocale()} }}</a>
            </div>
            <button class="hamburger" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17H21M3 12H21M3 7H21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
</nav>