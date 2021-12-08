<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <!--official bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <div>
        <nav class="navbar navbar-light bg-light">
            <a href="" class="navbar-brand">registration</a>
            <ul class="navbar-nav">
                <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">home</a></li>
               <li class="nav-item"><a href="{{route('add_item')}}" class="nav-link">add item</a></li>
                @if(session()->has("login_id"))
                    <li class="nav-item"><a href="" class="nav-link">show items</a></li>
                    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">logout</a></li>
                    <p>{{session()->get("name")}}</p>
                @elseif(!session()->has("login_id"))
                    <li class="nav-item"><a href="{{route('register')}}" class="nav-link">registration</a></li>
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                @endif
            </ul>
        </nav>
    </div>
    @if(Session::has("message"))
    <div class="container">
        <p class="alert {{Session::get('alert-class')}}">{{Session::get("message")}}</p>
    </div>
        
    @endif
    @yield("content")
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!--off bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("p.alert").delay(5000).slideUp(300);
            });
        </script>
    @yield("script")
</body>
</html>