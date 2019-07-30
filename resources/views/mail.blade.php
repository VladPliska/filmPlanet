Введіть код в наступних полях на формі
<?php
   // session_start();
  $_SESSION['varCode']= rand(1000,9999);
echo $_SESSION['varCode'];
