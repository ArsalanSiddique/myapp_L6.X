<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>

        .container {
            max-width: 940px;
            margin: auto;
            padding: 20px;
            background: #ccc;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>@yield('title')</h2>

        @if($errors->any)
            <ul>
                @foreach($errors->all() as $errors)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
        @endif

        @if(Session::has('message'))
            {{Session::get('message')}}
        @endif


        @yield('content')
    </div>
</body>
</html>