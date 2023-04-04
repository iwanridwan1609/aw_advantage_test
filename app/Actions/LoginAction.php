<?php
namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\Auth\LoginRequest;

class LoginAction
{
    use AsAction;

    public function handle(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
    }
}
