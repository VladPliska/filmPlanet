<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/sendMail.css">
</head>
<body>

<div class="logo"><a href="{{route('index')}}">FilmPlanet</a></div>
    <div class="title">Чотирьохзначний код надіслано на вказану почтову скриньку.</div>
    <form action="{{route('checkVar')}}" method="post">
        {{ csrf_field() }}
        <div class="enterCode">Введіть код</div>
        <input type="text" name ='submitVarCode'><br>
        <button type="submit" class="btnSubmit">Підтвердити</button>
    </form>

</body>
</html>
