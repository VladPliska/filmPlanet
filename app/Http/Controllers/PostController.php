<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Hamcrest\Core\SampleBaseClass;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Mail;
use App\Films;
use App\Category;
use App\likeFilm;
use function MongoDB\BSON\toJSON;

class PostController extends Controller
{

    public function showReg()
    {
        return view('login.register');
    }

    public function showLog()
    {
        return view('login.login');
    }

    public function index()
    {
        session_start();

        if(!isset($_SESSION['autorized']))
        {
            $_SESSION['autorized'] = false;
            $dara = Films::all();

            $category = Category::all();

            return view('welcome', compact('dara', 'category'));
        }else {

            $dara = Films::all();

            $category = Category::all();

            return view('welcome', compact('dara', 'category'));
        }
    }

    public function insertData()
    {
        session_start();

        try {

            $data = [
                'name' => null,
                'birthday' => null,
                'email' => $_POST['email'],
                'password' => $_POST['pass'],
                'phone_number' => $_POST['phone']
            ];

            $_SESSION['email'] = $_POST['email'];

            DB::table('users')->insert($data);


            Mail::send(['text' => 'mail'], ['name' => 'VerificationCode'], function ($message) {
                $message->to($_POST['email'], 'VarCode')->subject('Verif Code');
                $message->from('pluska2015@gmail.com', 'Submit registration');
            });

            return view('login.verMail');
        } //
        catch (\PDOException $e) {
            echo 'Користувач з указаною почтовою скринькою вже існує';
        } catch (\Exception $e) {
            return view('login.sendErr');
        }

    }

    public function checkVar()
    {
        session_start();
        if ($_SESSION['varCode'] == $_POST['submitVarCode']) {
            DB::table('users')->where('email', $_SESSION['email'])->update(['email_verified_at' => true]);
            return view('login.login');
        } else {
            return view('login.register');
        }

    }

    public function showSignIn()
    {
        return view('login.login');
    }

    public function logining()
    {
        session_start();

        $data = DB::select("select email from `users` where email = :email and password = :pass",
            ['email'=>$_POST['email_login'],'pass'=>$_POST['pass_login']]);



        if (empty($data))
        {
            echo 'account is not exits1';
            $autorized = false;
        }
        else
        {      $_SESSION['email_user'] = $_POST['email_login'];
                $autorized = true;
                $_SESSION['autorized'] = $autorized;
                $_SESSION['email'] = $_POST['email_login'];
                $user = $_POST['email_login'];
                $listFavFilm = likeFilm::where('email','=',$user)->get();

                //dd($_SESSION['autorized']);
                    return view('user.favouriteFilm', compact('user','listFavFilm',$_POST['email_login']));

        }
    }

    public function editPage()
    {
        session_start();

        $data =
            [
                'name' => null,
                'email' => null,
                'birthday' => null,
                'phone_number' => null
            ];

        $data['email'] =$_SESSION['email_user'];

//      $data['name'] = DB::table('users')->select('name')->where('email','=','vlad1')->pluck('name'); work+-

        $query = DB::table('users')->select('name')->where('email','=',$data['email'])->first();
        $data['name'] = $query->name;

       // echo $data['name'];

        $query =DB::table('users')->select('birthday')->where('email','=',$data['email'])->first();
        $data['birthday'] = $query->birthday;

      //  echo $data['birthday'];

        $query = DB::table('users')->select('phone_number')->where('email','=',$data['email'])->first();
        $data['phone_number'] = $query->phone_number;

      //  echo $data['phone_number'];


         return view('user.profileUser',compact('data'));
    }

    public function editMainInfo()
    {
        session_start();
        //записати в бд то шо змінив користувач і далі вивести йому все на форму
         DB::update("update `users` 
                                set name = :newName,email= :newEmail,phone_number = :newPhone,
                                birthday = :newBirthday 
                                where email = :userEmail",
            [
                'userEmail' =>$_SESSION['email_user'],
                'newName' => $_POST['editName'],
                'newEmail'=> $_POST['editEmail'],
                'newPhone'=> $_POST['editNumber'],
                'newBirthday'=>$_POST['editBirthday']
            ]);

            $succes = DB::select('select changes() from users');

            if(empty($succes))
            {
                echo "Збій";
            }else {

                echo 'Успех';
//                if($_SESSION['email_user'] != $_POST['editEmail'])
//                {
//                    $mainEmail = $_POST['editEmail'];
//                }else
//                    {
//                        $mainEmail = $_SESSION['email_user'];
//                    }
                $data = [
                    'name' => strval($_POST['editName']),
                    'email' => strval($_POST['editEmail']),
                    'birthday' => strval($_POST['editBirthday']),
                    'phone_number' => strval($_POST['editNumber'])
                ];
                return view('user.profileUser',compact('data'));
            }

    }

    public function editPass()
    {
        session_start();

        $getOldPass = DB::table('users')->select('password')->where('email','=',$_SESSION['email_user'])->first();

        $oldPass = $getOldPass->password;



        if($oldPass != $_POST['oldPass'])
        {
            echo 'Ваш пароль не співпадає з введеним';
        }else
        {
            $newpass = $_POST['newPass'];

             DB::table('users')->where('email','=',$_SESSION['email_user'])->update(['password'=>$newpass]);

            $querySucces = DB::select('select changes() from users');

            if(empty($querySucces))
            {
                echo 'Err';
            }else
                {
                    echo "пароль змінено";
                  //  return view('');
                }

        }

    }

//    public function mainPage()
//    {
//        return view();
//    }

    public function filmPage($filmName)
    {
        session_start();
        $filmData = Films::where('title','=', $filmName)->get();

        if(!isset($_SESSION['autorized']))
        {
            $_SESSION['autorized'] = false;
        }

        if($_SESSION['autorized'] == 1 || $_SESSION['autorized'] == true)
        {
            $user = $_SESSION['email'];
        }else
            {
                $user = null;
            }
        return view('film',compact('filmData','user'));
    }


    public function addFavourite($nameFilm)
    {
        session_start();

        if(empty($_SESSION['autorized']))
        {
            echo "<script>alert('Для того щоб продовжити роботу увійдіть в профіль ще раз');</script>";
            return view('login.login');

        }

        if(!$_SESSION['autorized'])
        {
          echo "<script>alert('Для того щоб додати фільм до улюблених ви повинні увійти');</script>";
          return view('login.login');
        }else
            {

                $user = $_SESSION['email'];

               $lifeFilm = likeFilm::select('id')->where('email','=',$user)->where('film_name','=',$nameFilm)->first();

                if(empty($lifeFilm)){
                likeFilm::insert(array(
                'email' => $user,
                'film_name' => $nameFilm
                ));
                    echo "<script>alert('Фільм додано до улюбених');</script>";
                $listFavFilm = likeFilm::select('film_name')->where('email','=',$user)->get();       // назви всіх
                return view('user.favouriteFilm',compact('user','listFavFilm'));
                }else
                    {
                        $listFavFilm = likeFilm::select('film_name')->where('email','=',$user)->get();       //
                        // назви
                        return view('user.favouriteFilm',compact('user','listFavFilm'));
                    }
            }
    }

        public function selectCategor($nameCategor)
        {
            session_start();
            $filmInfo = Films::where('category','LIKE','%'.$nameCategor.'%')->get();
            if($_SESSION['autorized'] =! true)
            {
                $user = null;
            }else{
                $user = $_SESSION['email'];
            }
            $category = $nameCategor;

            return view('filmByCategor',compact('filmInfo','user','category'));
        }

        public function showFavourite()
        {
            session_start();

            $user = $_SESSION['email'];
            $listFavFilm = likeFilm::select('film_name')->where('email','=',$user)->get();       //
            return view('user.favouriteFilm',compact('user','listFavFilm'));

        }
}

