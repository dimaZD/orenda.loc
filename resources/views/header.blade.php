<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i>Головна</a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @auth
                    <li><a href="{{ route('cabinet') }}">Кабінет</a></li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">Вхід</a>
                    <li><a href="{{ route('register') }}">Реєстрація</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>