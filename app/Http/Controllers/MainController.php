<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Content;
class MainController extends Controller
{
    static public $data = ['title'=>'iCar | '];

    function __construct()
    {
        self::$data['menu'] = Menu::all()->toArray();

    }
}
