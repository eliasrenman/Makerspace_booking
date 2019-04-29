<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }
}
