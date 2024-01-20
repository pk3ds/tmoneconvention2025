<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#F3F4F6" />
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#121826" />
    @if (isset($page['props']['event']))
        <meta name="twitter:card"
            content="{{ isset($page['props']['event']['card']) ? $page['props']['event']['card'] : 'summary' }}" />
        <meta property="og:title"
            content="{{ isset($page['props']['event']['title']) ? $page['props']['event']['title'] : config('app.name', 'Laravel') }}" />
        <meta property="og:description"
            content="{{ isset($page['props']['event']['description']) ? $page['props']['event']['description'] : '' }}" />
        <meta property="og:image"
            content="{{ isset($page['props']['event']['image']) ? $page['props']['event']['image'] : asset('/images/logo.png') }}" />
    @endif
    <meta property="og:url" content="{{ url()->current() }}" />

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    @inertia
</body>

</html>
