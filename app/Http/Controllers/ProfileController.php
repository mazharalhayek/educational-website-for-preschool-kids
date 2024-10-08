<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tutor;
use App\Traits\Files;
use App\Models\Parents;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

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

        switch (Auth::user()->type) {
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
        session()->flash('success','Profile updated successfuly');
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

    public function update_pfp(Request $request)
    {
        $imagepath = null;
        if ($request->image != null) {
            $imagepath = Files::saveImageProfile($request->image);
            $user  = Auth::user()->user_type;
            $user->image = $imagepath;
            $user->save();
            session()->flash('success','Profile picture updated successfuly');
        }

        return redirect()->back();
    }
}
