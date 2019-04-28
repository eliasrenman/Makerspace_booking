<?php

namespace App\Traits\Admin;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

trait AdminResetsPassword {


    use ResetsPasswords;


    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string|null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
    }
}