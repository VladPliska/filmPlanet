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
    <div class="user-info"><a href="{{route('editInfoPage')}}">{{$user}}</a></div>
</div>

    <div class="content">
        <div class="content-title">Список ваших улюблених фільмів</div>
            <div class="allFilm"><a href="{{route('index')}}">Всі фільми</a></div>
        <br><br>
        <div class="katalog">
            @foreach($listFavFilm as $key=> $value)
                <div class="favFilmList decoration">
                    <a href="{{route('film',['filmName'=>$value->film_name])}}">
                         <img src="/img/{{$value->film_name}}.jpg" alt="{{$value->film_name}}">
                        <div class="title-film">{{$value->film_name}}</div>
                    </a>
                </div>
                @if(($key+1)%5 == 0)
                    <br><br>
                @endif
            @endforeach
        </div>

    </div>
        <div class="footer"></div>

{{--<h1>Hello,{{$_POST['email_login']}}</h1>--}}
{{--    <h2>{{$_SESSION['autorized']}}</h2>--}}
{{--<a href="{{route('editInfoPage')}}">ProfileSetting</a>--}}
{{--<a href="{{route('index')}}">AllFilm</a>--}}
</body>
</html>
