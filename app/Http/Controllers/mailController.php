<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class mailController extends Controller
{
    public function  checkVar(){

        Mail::send(['text' =>'mail'],['name' => 'VerificationCode'],function ($message)
        {
            $message->to('ghostman10x@gmail.com','VarCode')->subject('Verif Code');
            $message->form('pluska2015@gmail.com','Submit registration');
        });
    }
}
