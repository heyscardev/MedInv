<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:doctor.index')->only(['index']);
        $this->middleware('can:doctor.store')->only(['store']);
        $this->middleware('can:doctor.destroy')->only(['destroy']);
        $this->middleware('can:doctor.update')->only(['update']);
    }

    public function index()
    {
        $data = Doctor::orderBy('created_at','asc')->skip(0)->take(500)->get();
        return Inertia::render('Doctors/index', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $yesterday = date('Y-m-d', strtotime('1 days'));
        $nowMinus150years = date('Y-m-d', strtotime('-150 years'));
        $validate = $request->validate([
            'c_i' => ['required', 'numeric', 'digits_between:0,8', 'unique:doctors'],
            'first_name' => ['required', 'alpha', 'max:80'],
            'last_name' => ['required', 'alpha', 'max:80'],
            'birth_date' => ['required', 'date_format:Y-m-d', 'after:' . $nowMinus150years, 'before:' . $yesterday],
            'gender' => ['required', 'in:Male,Female'],
            'email' => ['required',  'email', 'max:255', 'unique:doctors'],
            'phone' => ['nullable', 'max:25'],
            'direction' => ['nullable', 'max:250']
        ]);
        $item = new Doctor($validate);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $yesterday = date('Y-m-d', strtotime('1 days'));
        $nowMinus150years = date('Y-m-d', strtotime('-150 years'));
        $valido = $request->validate([
            'id' => ['required', 'integer', 'exists:doctors'],
            'c_i' => ['numeric', 'digits_between:0,8', Rule::unique('doctors')->ignore($request->id)],
            'first_name' => ['alpha', 'max:80'],
            'last_name' => ['alpha', 'max:80'],
            'birth_date' => ['date_format:Y-m-d', 'after:' . $nowMinus150years, 'before:' . $yesterday],
            'gender' => ['in:Male,Female'],
            'email' => ['email', 'max:255', Rule::unique('doctors')->ignore($request->id),],
            'phone' => ['nullable', 'max:25'],
            'direction' => ['nullable', 'max:250']
        ]);
        $item = Doctor::find($request->id);
        $item->update($valido);
       
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Doctor::find($id);

        if (!$item) {
            return back()->withErrors(['noDelete' => 'Este Recurso No existe']);
        }
        $item->delete();
        return back();
    }
}
