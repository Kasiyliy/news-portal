<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__inner__top row justify-content-between">
                <div class="header__social-media col-12 col-lg-3 justify-content-center">
                    <a class="nav-link" href="https://instagram.com"> <i class="nav__social-media fa fa-instagram"></i></a>
                    <a class="nav-link" href="https://facebook.com"> <i class="nav__social-media fa fa-facebook-f"></i></a>
                    <a class="nav-link" href="https://vk.com"> <i class="nav__social-media fa fa-vk"></i></a>
                    <a class="nav-link" href="https://youtube.com"> <i class="nav__social-media fa fa-youtube"></i></a>
                </div>
                <div class="header__auth col-12 col-lg-3 justify-content-center">
                    <a class="nav-link" href=""> <i class="nav__auth fa fa-search"></i></a>
                    <a class="nav-link" href=""> <i class="nav__auth fa fa-eye-slash"></i></a>
                    <a class="nav-link" href=""> <i class="nav__auth fa fa-language"></i></a>
                    <a class="nav-link" href="{{route('login')}}"> <i class="nav__auth fa fa-user-circle"></i></a>
                </div>
            </div>
            <div class="header__inner__bottom navbar navbar-expand-lg ">
                <div class="header__logo">
                    <img src="{{asset('modules/front/assets/img/logo.png')}}" alt="logo">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="burger-icon fa fa-bars"></i>
                </button>
                <div class="header__nav collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav header__nav">
                        @foreach($navItems as $navItem)
                            <a href="{{$navItem['href']}}" class="nav__link nav-link">{{$navItem['title']}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="main__inner">
            <div class="main__inner__content">
                <h1>Жамбыл жастарының
                    ресурстық орталығы</h1>
                <a href="{{route('resource')}}"><button>Ресурстық орталықтар ➞</button></a>
            </div>
        </div>
    </div>
</header>
