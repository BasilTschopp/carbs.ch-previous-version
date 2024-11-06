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
    </head>

    @if (request()->is('*Items*'))
    <a href="{{ url('Categories') }}">
        <img src="{{ asset('icons/back.svg')}}" class='item-back-button' alt='Back'>
    </a>
    @endif

    <div class='navigation-hamburger'>
        <img src="{{ asset('icons/menu.svg') }}" id='icon-menu' alt='menu'>
    </div>

    <nav>     
        <a href="{{ route('info') }}">INFO</a>
        <a href="{{ route('categories') }}">LEBENSMITTEL</a>
        <a href="{{ route('contact') }}">KONTAKT</a>
    </nav>

    <article>