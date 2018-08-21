<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    
@extends('partials.head')
<title>School Grading System</title>

    
</head>
<body class="body-background">

    @extends('partials.nav-top')
    
        <div id="main" class>
        <!-- <div id="preloader"></div> -->
        @guest
        @yield('content')
        @else
        @if(Auth::user()->role == 'admin')
        @extends('partials.sidenav')
        @yield('content')
        @else
        @yield('content')
        @endif
        @endguest
    </div>
    
   
    @extends('partials.script')
</body>
</html>
