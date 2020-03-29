<?php

namespace App\Http\Controllers;

use DB;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {
        $postlist = DB::table('posts')->where('user', Auth::user()->id)->get();
        return view('user')->with('postlist', $postlist);
    }
}
