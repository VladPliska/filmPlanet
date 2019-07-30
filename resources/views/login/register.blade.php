<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/register.css">
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
<div class="logo">FilmPlanet</div>
<div class="form-register">
    <div class="form_title">Реєстрація</div>
        <form method="post" action="{{route('login')}}">
            {{ csrf_field() }}
            <label  class ="reg_email"><input type="text" name="email" required placeholder="Email"></label><br>
            @csrf<label class="reg_pass" ><input type="password" name="pass" id ="pass" required
                                                 placeholder="Пароль"></label><br>
            @csrf<label clas class="reg_pass_reap"><input type="password" name="passreap" id =
                "passreap" required placeholder="Повторіть пароль"></label><br>
            <label class = 'phone_number'><input type="text" name="phone" required placeholder="Номер телефону"></label><br>
            <button type="submit" onclick="chekPass()" class ="btn_reg">Зарейструватися</button>
            <div class="sign_in"><a href="{{route("signin")}}">Вхід</a> в існуючий профіль</div>
        </form>
</div>


</body>
</html>
