<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            @php
                $data1 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
                $data2 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
            @endphp
            {{-- loop variables || Decomment to view loop variables--}}
            {{-- @foreach($data1 as $rows1) --}}
                {{--    @foreach($data2 as $rows2) --}}
                    {{-- @if($loop->even) --}}
                        <!-- <span style="color:red;">{{-- $rows2 --}}</span> -->
                        {{-- @else --}}
                        <!-- <span style="color:yellow;">{{-- $rows2 --}}</span> -->
                        {{-- @endif --}}
                            {{-- @php --}}
                                {{-- dd($loop->depth); --}}
                                    {{-- dd($loop); --}}
                                        {{-- @endphp --}}
                                            {{-- @endforeach --}}
                                                {{-- @php --}}
                                                    {{-- dd($loop->depth); --}}
                                                        {{-- @endphp  --}}
                <!-- <br />   -->
                {{-- @endforeach --}}
                <div class="title m-b-md">
                
                     Laravel 6 {{-- $Company --}} {{-- $name --}}
                    
                </div>
                <!-- <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    
                                    <tr>

                                    </tr>
                                    
                                @endforeach
                            </tbody>
                       </table>
                    </div> -->
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
