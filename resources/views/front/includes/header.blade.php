<header class="p-lr">
        <div class="header-lang">
            <a href="{{ route('lang.switch', 'az') }}" class="lang-item {{ app()->getLocale() == 'az' ? 'active' : '' }}">AZ</a>
            <a href="{{ route('lang.switch', 'en') }}" class="lang-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
            <a href="{{ route('lang.switch', 'ru') }}" class="lang-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
        </div>
        <div class="header-socials">
            <a href="" class="header-social-item">
                <img src="./assets/icons/fb-black.svg" alt="">
            </a>
            <a href="" class="header-social-item">
                <img src="./assets/icons/insta-black.svg" alt="">
            </a>
            <a href="" class="header-social-item">
                <img src="./assets/icons/wp-black.svg" alt="">
            </a>
        </div>
    </header>