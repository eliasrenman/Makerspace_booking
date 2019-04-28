<?php

namespace App\Traits\Admin;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

trait AdminSendPasswordResetEmails {
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('admin.passwords.email');
    }

}