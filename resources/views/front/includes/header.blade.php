<header class="p-lr">
        <div class="header-lang">
            <a href="{{ route('lang.switch', 'az') }}" class="lang-item {{ app()->getLocale() == 'az' ? 'active' : '' }}">AZ</a>
            <a href="{{ route('lang.switch', 'en') }}" class="lang-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
            <a href="{{ route('lang.switch', 'ru') }}" class="lang-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
        </div>
        <div class="header-socials">
            @foreach($socialMedia as $social)
                <a href="{{ $social->link }}" class="header-social-item">
                    <img src="{{ asset('./'.$social->image) }}" alt="{{ $social->link }}">
                </a>
            @endforeach
        </div>
    </header>