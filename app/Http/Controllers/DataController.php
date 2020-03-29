<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index () {
        $demopost1 = DB::table('posts')->orderBy('id', 'DESC')->limit(3)->get();
        $demopost2 = DB::table('posts')->inRandomOrder()->limit(3)->get();
        $data = array(
            'demopost1' => $demopost1,
            'demopost2' => $demopost2
        );
        return view('home')->with($data);
    }
}
