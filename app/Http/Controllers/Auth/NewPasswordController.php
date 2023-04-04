<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Actions\NewPasswordAction;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, NewPasswordAction $newpass): RedirectResponse
    {
        //action to New Password Action
        $newpass->handle($request);

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $newpass == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($newpass))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($newpass)]);
    }
}
