<?php
namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\ProfileUpdateRequest;

class UpdateProfileAction
{
    use AsAction;

    public function handle(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
    }
}
