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
    <div class="logo"><a href="{{route('index')}}">FilmPlanet</a></div>
    <span class="user-info"><a href="{{route('editInfoPage')}}">{{$_SESSION['email']->email}}</a></span>
</div>

    <div class="content">
        <div class="content-title">Список Ваших улюблених фільмів</div>
            <div class="allFilm"><a href="{{route('index')}}">Всі фільми</a></div>
        <br><br>
        <div class="katalog">
            @foreach($listFavFilm as $key=> $value)
                <div class="favFilmList decoration">
                    <a href="{{route('film',['filmName'=>$value->film_name])}}">
                        <img src="/img/{{$value->film_name}}.jpg" alt="{{$value->film_name}}">
                        <div class="title-film">{{$value->film_name}}</div>
                    </a>
                    <div class="deleteBtn"><a href="{{route('deleteFav',['user' => $user,'nameFilm'=>
                    $value->film_name])
                    }}">Видалити з
                            улюблених</a></div>
                </div>
                @if(($key+1)%5 == 0)
                    <br><br>
                @endif
            @endforeach
        </div>

    </div>
        <div class="footer"></div>

</body>
</html>
