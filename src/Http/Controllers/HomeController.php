<?php

namespace OilSeller\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('oilseller::layout');
    }
}
