<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $yesterday = date('Y-m-d', strtotime('1 days'));
        $nowMinus150years = date('Y-m-d', strtotime('-150 years'));
        $request->validate([
            'c_i' =>['required', 'numeric', 'digits_between:0,8','unique:users'],
            'first_name' => ['required', 'alpha', 'max:80'],
            'last_name' => ['required', 'alpha', 'max:80'],
            'birth_date' => ['required', 'date_format:Y-m-d','after:'.$nowMinus150years,'before:'.$yesterday],
            'gender' => ['required','in:Male,Female'],
            'email' => ['required',  'email', 'max:255', 'unique:users'],
            'phone' => ['nullable','max:25'],
            'direction' => ['nullable','max:250'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::create([
            'c_i' =>$request->c_i,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'direction' =>$request->direction,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
