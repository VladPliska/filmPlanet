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
            var passReap = document.getElementById("passReap");
            if(pass.value != passReap.value)
            {
                alert("Введені паролі не співпадають,повторіть спробу");
                pass.value ="";
                passReap.value ="";
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="logo">FilmPlanet</div>
        <div class="user-info">{{$user}}</div>
    </div>
    <nav>
        <a href="{{route('index')}}">Всі фільми</a><br><br>
        <a href="{{route('showFavourite')}}">Улюблені фільми</a>
    </nav>

    <div class="editMainInfo">
        <form action="{{route('editMainInfo')}}" method = 'post'>
            {{ csrf_field() }}

            <label for="name">Ім'я</label>
            <input type="text" id="name" name ='editName' value="{{$data['name']}}"><br>

            <label for="email">Email</label>
            <input type="text" id='email' name="editEmail" value="{{$data['email']}}" required><br>

            <label for="birthday">Дата народження <span class ="format">(1969-12-31)</span></label>
            <input type="text" id="birthday" name="editBirthday" value="{{$data['birthday']}}"><br>

            <label for="phone">Номер телефону <span class ="format">(380-0000-00000)</span></label>
            <input type="text" id="phone" name="editNumber" value="{{$data['phone_number']}}"><br>

            <button type="submit">Змінити</button>
        </form>
    </div>
    <div class="editPass">
        <form action="{{route('editMainPass')}}" name="editpass" method="post">
            {{ csrf_field() }}
             <label for="oldPass">Введіть старий пароль</label>
             <input type="password"id ='oldPass' name="oldPass" required>

             <label for="pass">Введіть новий пароль</label>
             <input type="password" name="newPass" id="pass" required>

             <label for="passReap">Повторіть новий пароль</label>
             <input type="password" name="newPassRepeat" id="passReap" required><br>

             <button type="submit" onclick="chekPass()">Змінити пароль</button>
        </form>
    </div>



</body>
</html>
