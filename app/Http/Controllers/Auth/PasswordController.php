<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Actions\UpdatePasswordAction;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request, UpdatePasswordAction $updatepass): RedirectResponse
    {
        //action to UpdatePasswordAction
        $updatepass->handle($request);

        return back()->with('status', 'password-updated');
    }
}
