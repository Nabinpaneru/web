<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;

class HomeSlideController extends Controller
{
    public function homeslider(){

        $homeslide=HomeSlide::find(1);

        return view('home.home_slide',['homeslide'=>$homeslide]);



        

    }
}
