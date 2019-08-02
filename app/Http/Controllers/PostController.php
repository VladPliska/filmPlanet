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
use App\User;
use function MongoDB\BSON\toJSON;

class PostController extends Controller
{

    public function index()
    {
        session_start();

        if(!isset($_SESSION['autorized']))
        {
            $_SESSION['autorized'] = false;
            $dara = Films::all();

            $category = Category::all();

            return view('welcome', compact('dara', 'category'));
        }else{
            $dara = Films::all();

            $category = Category::all();

            return view('welcome', compact('dara', 'category'));
        }
    }











}

