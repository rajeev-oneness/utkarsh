<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = 'profile';

    public function __construct()
    {
        $this->middleware('guest:users');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('site.auth.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

    protected function guard()
    {
        return Auth::guard('users');
    }

    protected function broker() {
        return Password::broker('users');
    }
}
