<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LeitorController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('leitores-auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store() {
        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to log in user
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => "Sorry, credentials don't match.",
            ]);
        }

        //redirect
        return redirect('/livros');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(){
        Auth::logout(); //nao precisa passar um $user como argumento, pois ele considera o usuario ja logado

        return redirect('/');
    }
}
