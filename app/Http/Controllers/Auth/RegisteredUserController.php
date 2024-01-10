<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Tutor;
use App\Models\Parents;
use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => ['required', Rule::in(['parent', 'tutor', 'admin', 'kid'])],
            'birth_date'=>['required','date'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' =>$request->type,
            'birth_date'=>$request->birth_date,
        ]);

        event(new Registered($user));

        Auth::login($user);

        $type = $request->type;

        switch($type)
        {
            case 'parent':
                $parent = Parents::create([
                    'id'=>Auth::id(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'birth_date'=>$request->birth_date,
                ]);
                break;
            case 'tutor':
                $tutor = Tutor::create([
                    'id'=>Auth::id(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'birth_date'=>$request->birth_date,
                    'salary' =>$request->salary,
                    'qualifications'=>$request->qualifications,
                    'subject'=>$request->subject,
                    'image'=>null,
                ]);
                break;
            case 'admin':
                $admin = Admin::create([
                    'id'=>Auth::id(),
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password'=> Hash::make($request->password),

                ]);
                break;
            default:
                return view('404');
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
