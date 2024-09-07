<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
  </script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body class="bg-white">
    @include('base.navbar')

    <main class="container mx-auto px-4 md:flex py-4">
        <aside>
            @include('base.sidebar')
        </aside>
        <!-- strat content -->
        <div class="flex flex-wrap w-full">
            
        <section class="w-full mx-4 py-4">
            <div class="w-full">
                <div class="w-full">
                    <h1 class="text-3xl pb-4">@yield('h1_title')</h1>
                    <div class="lead-xl font-light ">@yield('description')</div>
                </div>
                <hr>
            </div>
        </section>
        <section>
        @yield('content')
        </section>
        
        </div>
        <!-- end content -->

    </main>

    @include('base.end')
