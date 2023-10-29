<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      @class(['dark' => auth()->user()->preferred_theme == 'dark']) data-theme="{{ auth()->user()->preferred_theme ?? 'light' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="A Laravel template to get you started with new projects, it includes a beautiful responsive UI and basic functionalities such as complete authentication methods, users, roles and permissions.">
    <meta name="keywords" content="foundation, laravel, starter kit, template, laravel template, projects, website, responsive, admin, admin panel">
    <meta name="author" content="Christopher Quiñonez Cespedes">

    <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    @vite(['resources/backend/css/app.css', 'resources/backend/js/app.js'])

    @livewireStyles

</head>

<body>

@include('backend.partials.topbar')

<div class="flex flex-col lg:flex-row pr-0 lg:pr-6">

    @include('backend.partials.sidebar')

    <div class="lg:flex-1 mx-4 lg:mx-0 pt-6 pl-0 lg:pr-10 lg:pl-4 pb-5 overflow-x-auto space-y-6">

        {{ $slot }}

    </div>

</div>

@livewireScripts

@include('backend.partials.alerts')

@yield('scripts')

</body>
</html>
