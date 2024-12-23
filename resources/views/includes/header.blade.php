<!DOCTYPE html>

<!-- HTML language set dynamically from the app's locale -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <!-- Essential header -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>carbs.ch</title>
        <link href="{{ asset('css/style.css?v=1.0.1') }}" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('icons/favicon.png') }}">
        <script src="{{ asset('js/jquery-3.7.1.min') }}"></script>
        <script src="{{ asset('js/nav.js') }}"></script>
        <script src="{{ asset('js/items.js') }}"></script>
        <script src="{{ asset('js/search.js') }}"></script>

        <!-- Google Tag Manager Head-->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MWRD36HV');</script>

    </head>

    <body>

    <!-- Google Tag Manager Body -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MWRD36HV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <div class='fixed-header'>

        <!-- Show the search icon only on the categories page -->
        @if (request()->is('/') || request()->is('*Categories*'))
        <a href="{{ url('Search') }}">
            <img src="{{ asset('icons/search.svg')}}" class='item-search-button' alt='Search'>
        </a>
        @endif

        <!-- Show the search input only on the search page -->
        @if (request()->is('*Search*'))
            <input type="text" id="search-food" class='input-search-food'>
        @endif

        <!-- Show the back button only on the item page -->
        @if (request()->is('*Items*'))
        <a href="{{ url('Categories') }}">
            <img src="{{ asset('icons/back.svg')}}" class='item-back-button' alt='Back'>
        </a>
        @endif

        <!-- Hamburger Icon -->
        <div class='navigation-hamburger'>
            <img src="{{ asset('icons/menu.svg') }}" id='icon-menu' alt='menu'>
        </div>

    </div>

    <nav>     
        <!-- Website Links -->
        <a href="{{ route('info') }}">INFO</a>
        <a href="{{ route('login') }}">LOGIN</a>
        <a href="{{ route('categories') }}">LEBENSMITTEL</a>
        <a href="{{ route('contact') }}">KONTAKT</a>
    </nav>

    <article>