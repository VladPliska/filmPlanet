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

    @foreach($filmData as $value)
    <div class="film-header">
        <div class="logo">FilmPlanet</div>
        <div class="user-data">{{$user}}</div>
    </div>

    <div class="film-content">
        <div class="left-content">
            <div class="film-poster">
                <img class = 'img' src="{{$value->img}}" alt="{{$value->title}}">
            </div>
            <div class="film-title">{{$value->title}}</div>
            <div class = 'ganre' >Жанр:{{$value->category}}</div>
            <a class="addToFavourite categor-name" onclick="chekLog()" href="{{route("addFavourite",['nameFilm' =>
            $value->title])
            }}">Додати
                до
                улюлених</a>
        </div>
        <div class="right-content">
            <div class="film-video">
                <iframe width="560" height="350" src="{{$value->url}}" frameborder="0" allow="accelerometer; autoplay;
                encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="film-about">
                <p>Про фільм</p>
                {{$value->content}}</div>
        </div>
    </div>
    @endforeach
</body>
</html>
