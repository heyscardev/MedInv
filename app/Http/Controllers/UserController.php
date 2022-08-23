<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

use function PHPSTORM_META\map;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user.index')->only(['index']);
        $this->middleware('can:user.store')->only(['store']);
        $this->middleware('can:user.destroy')->only(['destroy']);
        $this->middleware('can:user.update')->only(['update']);
    }

    public function index()
    {
        $users = User::orderBy('created_at','asc')->skip(0)->take(500)->get();
        return Inertia::render('Users/index', ['data' => $users]);
    }

    public function store(Request $request)
    {
        $yesterday = date('Y-m-d', strtotime('1 days'));
        $nowMinus150years = date('Y-m-d', strtotime('-150 years'));
        $validate = $request->validate([
            'c_i' => ['required', 'numeric', 'digits_between:0,8', 'unique:users'],
            'first_name' => ['required', 'alpha', 'max:80'],
            'last_name' => ['required', 'alpha', 'max:80'],
            'birth_date' => ['required', 'date_format:Y-m-d', 'after:' . $nowMinus150years, 'before:' . $yesterday],
            'gender' => ['required', 'in:Male,Female'],
            'email' => ['required',  'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'max:25'],
            'direction' => ['nullable', 'max:250'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        $user = new User($validate);
        $user->password = Hash::make($request->password);
        return $user->save() ? back() : back(500)->withErrors('save', 'error al guardar');

    }

    public function show($id)
    {
    
    }

    public function update(Request $request, $id)
    {
        $yesterday = date('Y-m-d', strtotime('1 days'));
        $nowMinus150years = date('Y-m-d', strtotime('-150 years'));
        $valido = $request->validate([
            'id' => ['required', 'integer', 'exists:users'],
            'c_i' => ['numeric', 'digits_between:0,8', Rule::unique('users')->ignore($request->id)],
            'first_name' => ['alpha', 'max:80'],
            'last_name' => ['alpha', 'max:80'],
            'birth_date' => ['date_format:Y-m-d', 'after:' . $nowMinus150years, 'before:' . $yesterday],
            'gender' => ['in:Male,Female'],
            'email' => ['email', 'max:255', Rule::unique('users')->ignore($request->id),],
            'phone' => ['nullable', 'max:25'],
            'direction' => ['nullable', 'max:250'],
            'password' => ['confirmed', 'min:8', Rules\Password::defaults()]
        ]);
        $user = User::find($request->id);
        if($user->id == Auth::id())return back()->withErrors(['noCurrentUser'=>'el usuario actual solo se puede modificar desde preferencias']);
        else if($user->hasRole('administrador'))return back()->withErrors(['noAdmin'=>'no se puede modificar un administrador']);
        $user->update($valido);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        return $user->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->withErrors(['noDelete' => 'Este Usuario No existe']);
        } else if ($user->hasRole('administrador')) return back()->withErrors(['noDelete' => 'no puede eliminar un administrador']);


        $user->delete();
        return back();
    }
}
