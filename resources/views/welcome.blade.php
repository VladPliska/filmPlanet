<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/styleMain.css">
    <title>Document</title>
</head>
<body>
    <div class="logining">
        @if($_SESSION['autorized'] == true)
            <div class="user"><a href="{{route('editInfoPage')}}">{{$user}}</a></div>
            <a  class = 'favFilm' href="{{route('showFavourite')}}">Улюблені фільми</a>
            <a class="btnExit" href="{{route('exit')}}">Вихід</a>
        @else
        <a href="{{route('register')}}" class="reg">Registration</a>
        <a href="{{route('signin')}}" class="signin">SignIn</a>
            @endif
    </div>
    <div class="logo">FilmPlanet</div>

        <div class="category">
            @foreach($category as $value)
                <a class="categor-name" href ="{{route('selectCategor',['nameCategor'=>$value->category])}}">{{$value->category}}</a>
            @endforeach
        </div>

        <div class="katalog">
             @foreach($dara as $key => $value)
                 <div class="decoration">
                     <a href="{{route('film',['nameFilm' => $value->title])}}">
                         <img class ='poster' src="{{$value->img}}" alt="{{$value->title}}">
                         <p class="title-text">{{$value->title}}</p>
                     </a>
                 </div>
                @if(($key+1)%4 == 0)
                     <br><br>
                @endif
                 @endforeach
        </div>


</body>
</html>
