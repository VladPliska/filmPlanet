<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Document</title>
    <script type = "text/javascript">
        function chekPass(){
            var pass = document.getElementById("pass");
            var passreap = document.getElementById("passreap");
            if(pass.value != passreap.value)
            {
                alert("Введені паролі не співпадають,повторіть спробу");
                pass.value ="";
                passreap.value ="";
            }
        }
    </script>
</head>
<body>
<div class="header">
    <div class="logo">FilmPlanet</div>
    <div class="user-info">{{$data['email']}}</div>
</div>
    <div class="editMainInfo">
<form action="{{route('editMainInfo')}}" method = 'post'>
    {{ csrf_field() }}
{{--    coment1--}}
    <label for="name">Ім'я</label><br>
    <input type="text" id="name" name ='editName' value="{{$data['name']}}"><br>

    <label for="email">Email</label><br>
    <input type="text" id='email' name="editEmail" value="{{$data['email']}}"><br>

    <label for="birthday">Дата народження</label><br>
    <input type="text" id="birthday" name="editBirthday" value="{{$data['birthday']}}"><br>

    <label for="phone">Номер телефону</label><br>
    <input type="text" id="phone" name="editNumber" value="{{$data['phone_number']}}"><br>

    <button type="submit">Змінити</button>
</form>
    </div>
    <div class="editPass">
<form action="{{route('editMainPass')}}" name="editpass" method="post">
    {{ csrf_field() }}
    Введіть старий пароль<input type="password" name="oldPass" required><br>

    Введіть новий пароль <input type="password" name="newPass" id="pass" required><br>
    Повторіть новий пароль <input type="password" name="newPassRepeat" id="passreap" required><br>
    <button type="submit" onclick="chekPass()">Змінити пароль</button>
</form>
    </div>


<a href="{{route('index')}}">На головну</a>

</body>
</html>
