Введіть код у відкритому вікні на сайті.
<?php
   // session_start();
  $_SESSION['varCode']= rand(1000,9999);
echo $_SESSION['varCode'];
