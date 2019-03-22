<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function kek($id)
    {
        
        $user = \App\User::find($id);

        return view('profile')->withUser($user);

    }
}
