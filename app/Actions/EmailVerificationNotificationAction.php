<?php
namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class EmailVerificationNotificationAction
{
    use AsAction;

    public function handle(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        $request->session()->put('auth.password_confirmed_at', time());
    }
}
