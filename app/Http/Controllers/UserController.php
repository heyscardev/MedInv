<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user.index')->only(['index']);
        $this->middleware('can:user.store')->only(['store']);
        $this->middleware('can:user.destroy')->only(['destroy']);
        $this->middleware('can:user.update')->only(['update']);
        $this->middleware('can:user.restore')->only(['restore']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $withTrash = $request->has('deleted');
        if ($withTrash) {
            $users = User::with('roles')->onlyTrashed()->orderBy('created_at', 'asc')->get();
            return Inertia::render('Users/index', ['data' => $users]);
        }

        $users = User::with('roles')->orderBy('created_at', 'asc')->get();
        return Inertia::render('Users/index', ['data' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $user = new User($validated);
        $user->password = Hash::make($request->password);
        $user->assignRole('empleado');
        return $user->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
     /*    if ($user->id == Auth::id())
            return back()->withErrors(['noCurrentUser' => 'el usuario actual solo se puede modificar desde preferencias']); */
    if (!auth()->user()->hasRole('administrador') && auth()->user()->id !== $user->id) return abort(403);

        $validated = $request->validated();
        $user->update($validated);
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
    public function destroy(User $user)
    {
        $error = false;
        if ($user->hasRole('administrador')) {
            $error = 'no puede eliminar un administrador';
        } else {
            // with soft deletes
            $user->state = false;
            $user->save();
            $user->delete();
        }
        return !$error ? back() : back()->withErrors(['noDelete' => $error]);
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return back()->with('success', 'El usuario fue restaurado');
    }


    // public function forceDelete(Model $model)
    // {
    //     $fund->forceDelete();
    //     return redirect()->route('model.index')->with('success', __('The model was destroyed'));
    // }

}
