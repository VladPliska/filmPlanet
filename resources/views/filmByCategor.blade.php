<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/likeFilm.css">
    <title>Document</title>

</head>
<body>

<div class="header">
    <div class="logo">FilmPlanet</div>
    <div class="user-info">{{$user}}</div>
</div>
<div class="content">
    <div class="content-title">Список фільмів категорії {{$category}}</div>
    <div class="allFilm"><a href="{{route('index')}}">AllFilm</a></div>
    <br><br>


    <div class="katalog">
        @foreach($filmInfo as $key=> $value)
            <div class="favFilmList decoration">
                {{$value->film_name}}
                <a href="{{route('film',['nameFilm'=>$value->title])}}">
                    <img src="/img/{{$value->title}}.jpg" alt="{{$value->title}}">
                    <div class="title-film">{{$value->title}}</div>
                </a>
            </div>
            @if(($key+1)%5 == 0)
                <br><br>
            @endif
        @endforeach
    </div>

</div>

</body>
</html>
