<header class="header__small">
    <nav class="container navbar navbar-expand-lg header__small__inner">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="burger-icon fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar d-flex navbar-nav justify-content-between">
                <div class="header__social-media">
                    <a class="nav-link" href="https://instagram.com"> <i class=" nav__social-media fa fa-instagram"></i></a>
                    <a class="nav-link" href="https://facebook.com"> <i class=" nav__social-media fa fa-facebook-f"></i></a>
                    <a class="nav-link" href="https://vk.com"> <i class=" nav__social-media fa fa-vk"></i></a>
                    <a class="nav-link" href="https://youtube.com"> <i class=" nav__social-media fa fa-youtube"></i></a>
                </div>
                <div class="header__auth">
                    {{--<a class="nav-link" href=""> <i class="nav__auth fa fa-search"></i></a>--}}
                    <a class="nav-link  bvi-open" href=""> <i class="nav__auth fa fa-eye-slash"></i></a>
                    <a class="nav-link" href=""> <i class="nav__auth fa fa-language"></i></a>
                    <a class="nav-link" href="{{route('login')}}"> <i class="nav__auth fa fa-user-circle"></i></a>
                </div>
            </div>
        </div>
    </nav>
</header>
