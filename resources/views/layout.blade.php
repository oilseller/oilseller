<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OilSeller {{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('/vendor/oilseller/css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="bg-gray-900 text-gray-400">
    <div class="w-full max-w-screen-xl mx-auto">
        <header class="flex items-center justify-center mt-4">
            <svg class="w-12 mr-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" viewBox="0 0 640 640"><defs><path d="M320.33 18.76C228.85 113.92 251.74 200.01 320.33 200.01C388.92 200.01 411.8 113.92 320.33 18.76Z" id="d1KNYB6INq"></path><path d="M90 270L270.83 270L270.83 290L90 290L90 270Z" id="buLNxLYJx"></path><path d="M370.83 270L550 270L550 290L370.83 290L370.83 270Z" id="b1zSytP7kj"></path><path d="M150 360L291.25 360L291.25 380L150 380L150 360Z" id="a18QjtVm0b"></path><path d="M350 360L490 360L490 380L350 380L350 360Z" id="aFy0JQDfm"></path><path d="M206.25 449.37L300 449.37L300 469.37L206.25 469.37L206.25 449.37Z" id="a2ugFyl7Q5"></path><path d="M340 450L433.75 450L433.75 470L340 470L340 450Z" id="aCN2VV9Xz"></path></defs><g><g><g><use xlink:href="#d1KNYB6INq" opacity="1" fill="#42c3e2" fill-opacity="1"></use><g><use xlink:href="#d1KNYB6INq" opacity="1" fill-opacity="0" stroke="#000000" stroke-width="1" stroke-opacity="0"></use></g></g><g><use xlink:href="#buLNxLYJx" opacity="1" fill="#42c3e2" fill-opacity="1"></use></g><g><use xlink:href="#b1zSytP7kj" opacity="1" fill="#42c3e2" fill-opacity="1"></use></g><g><use xlink:href="#a18QjtVm0b" opacity="1" fill="#42c3e2" fill-opacity="1"></use></g><g><use xlink:href="#aFy0JQDfm" opacity="1" fill="#42c3e2" fill-opacity="1"></use></g><g><use xlink:href="#a2ugFyl7Q5" opacity="1" fill="#42c3e2" fill-opacity="1"></use></g><g><use xlink:href="#aCN2VV9Xz" opacity="1" fill="#42c3e2" fill-opacity="1"></use></g></g></g></svg>

            <h2 class="relative text-3xl uppercase text-gray-300">OilSeller</h2>
        </header>

        <div class="mt-2">
            @livewire('oil-app-select')
        </div>
    </div>
    @livewireScripts
</body>
