<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>carbs.ch</title>
        <link href="{{ asset('css/style.css?v=1.0.1') }}" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('icons/favicon.png') }}">
        <script src="{{ asset('js/jquery-3.7.1.min') }}"></script>
        <script src="{{ asset('js/nav.js') }}"></script>
        <script src="{{ asset('js/items.js') }}"></script>
        <script src="{{ asset('js/search.js') }}"></script>
    </head>

    <div class='fixed-header'>

        {{-- Show the search icon only on the categories page --}}
        @if (request()->is('/') || request()->is('*Categories*'))
        <a href="{{ url('Search') }}">
            <img src="{{ asset('icons/search.svg')}}" class='item-search-button' alt='Search'>
        </a>
        @endif

        {{-- Show the search input only on the search page --}}
        @if (request()->is('*Search*'))
            <input type="text" id="search-food" class='input-search-food'>
        @endif

        {{-- Show the back button only on the item page --}}
        @if (request()->is('*Items*'))
        <a href="{{ url('Categories') }}">
            <img src="{{ asset('icons/back.svg')}}" class='item-back-button' alt='Back'>
        </a>
        @endif

        <div class='navigation-hamburger'>
            <img src="{{ asset('icons/menu.svg') }}" id='icon-menu' alt='menu'>
        </div>

    </div>

    <nav>     
        <a href="{{ route('info') }}">INFO</a>
        <a href="{{ route('categories') }}">LEBENSMITTEL</a>
        <a href="{{ route('contact') }}">KONTAKT</a>
    </nav>


    <article>