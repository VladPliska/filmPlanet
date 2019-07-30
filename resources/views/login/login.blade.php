<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="logo">FilmPlanet</div>
        <div class="form-autoriz">
            <div class ='autoriz_title'>Авторизація <br>
                <div class="enterEmail">Для входу введіть Ваш Email</div>
            </div>
                <form action="{{route('checkLog')}}" method = 'post'>
                    {{ csrf_field() }}
                    <input type="text" name = 'email_login' required class = 'login_label' placeholder="Email"
                    ><br>
                    <input type="password" name="pass_login" required class = 'pass_label' placeholder ="Пароль">
                    <label class="saveMe"><input type="checkbox" >Запам'ятати мене</label>
                    <button class="btn" type="submit">Увійти</button>
                    <div class="newAcc" ><a href="{{route('register')}}">Реєстрація </a>нового користувача</div>
                </form>
        </div>

</body>
</html>
