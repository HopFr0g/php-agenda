<!DOCTYPE html>

<html>
    <head>
        <!-- CSS main file: --> 
        @yield('css')
        
        <!-- CSS general purpose files: -->
        <link rel="stylesheet" type="text/css" href="/resources/css/env.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/fancy.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/responsive.css">
        
        <!-- Settings: -->
        <meta charset="utf-8">

        <!-- Title and icon: -->
        <title id="tab-title">PHP Agenda</title>
        <link id="tab-icon" rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Meta viewport tag: -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons script: -->
        <script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>

        <!-- Fonts: -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="responsive-menu__blur"></div>
        
        <header class="header">
            <h1 id="header-title">PHP Agenda</h1>
        </header>

        <nav class="nav">
            <div class="nav__button-container">
                <div class="nav__button fas fa-bars"></div>
            </div>
            <div class="nav__a-container">
                <a href="/tasks" class="nav__a"><i class="fas fa-clock"></i>Tasks</a>
                <a href="/categories" class="nav__a"><i class="fas fa-book"></i>Categories</a>
            </div>
        </nav>
        
        <main class="main">
            @yield('content')
        </main>
        
        <footer class="footer">
            <div class="footer__contact" id="footer-contact">Created by HopFr0g</div>
        </footer>
        
        <script src="/resources/js/responsive.js"></script>
        
        @yield('js')
    </body>
</html>