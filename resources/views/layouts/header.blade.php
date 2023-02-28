@section('header')
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <a class="logo" href="/">
                <img src="assets/images/logo-Upd8.png" class="logo-light-mode" alt="">
                <img src="assets/images/logo-Upd8.png" class="logo-dark-mode" alt="">
            </a>
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <div id="navigation">
                <ul class="navigation-menu">
                    <li><a href="/customer-list" class="sub-menu-item">Listagem</a></li>
                    <li><a href="/" class="sub-menu-item">Cadastro</a></li>
                </ul>
            </div>
        </div>
    </header>
@stop
