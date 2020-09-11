<header class="header"{{asset('modules/front/')}}>
    <div class="container head">
        <div class="header__inner">
            <div class="header__inner__top">
                <div class="header__social_media">
                    <a href=""><img src="{{asset('modules/front/assets/img/instagram-icon.png')}}" alt="instagram"></a>
                    <a href=""><img src="{{asset('modules/front/assets/img/facebook-icon.png')}}"
                                    alt="facebook"></a>
                    <a href=""><img src="{{asset('modules/front/assets/img/vk-icon.png')}}" alt="vk"></a>
                    <a href=""><img src="{{asset('modules/front/assets/img/youtube-icon.png')}}" alt="youtube"></a>
                </div>
                <div class="header__auth">
                    <a href=""><img src="{{asset('modules/front/assets/img/search-icon.png')}}" alt="search"></a>
                    <a href=""><img src="{{asset('modules/front/assets/img/eyelash-icon.png')}}" alt="eyelash"></a>
                    <a href=""><img src="{{asset('modules/front/assets/img/language-icon.png')}}"
                                    alt="language"></a>
                    <a href=""><img src="{{asset('modules/front/assets/img/auth-icon.png')}}" alt="auth">Авторизация</a>
                </div>
            </div>
            <div class="header__inner__bottom">
                <div class="header__logo">
                    <img src="{{asset('modules/front/assets/img/logo.png')}}" alt="logo">
                </div>
                <div class="header__nav">
                    @foreach($navItems as $navItem)
                        <a href="{{$navItem['href']}}" class="nav__link">{{$navItem['title']}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="main__inner">
            <div class="main__inner__content">
                <h1>Жамбыл жастарының
                    ресурстық орталығы</h1>
                <button>Ресурстық орталықтар ➞</button>
            </div>
        </div>
    </div>
</header>
