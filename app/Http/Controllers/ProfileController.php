<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Parents;
use App\Models\Tutor;
use App\Models\Admin;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse|View
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        switch(Auth::user()->type)
        {
            case 'parent':
                $update = Parent::find(Auth::id());
               $update->name = $request->name;
               $update->email = $request->email;
               $update->save();
                break;
            case 'tutor':
                $update = Tutor::find(Auth::id());
                $update->name = $request->name;
                $update->email = $request->email;
                $update->save();
                break;
            case 'admin':
                $update = Admin::find(Auth::id());
                $update->name = $request->name;
                $update->email = $request->email;
                $update->save();
                break;
            default:
                return view('404');
        }
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
