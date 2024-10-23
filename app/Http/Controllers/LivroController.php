<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $livros = Livro::with('employer')->latest()->simplePaginate(4);
        return view('livros.index', //ou tbm livros/index
                       [
                        'livros' => $livros
                        ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('livros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(){
        request()->validate([
            'tittle' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
    
        Livro::create([
            'tittle' => request('tittle'),
            'salary' => request('salary'),
            'employer_id' => 1001
        ]);
    
        return redirect('/livros');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro){
        return view('livros.show', ['livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro){
        return view('livros.edit', ['livro' => $livro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Livro $livro){
        // authorize (on hold...)
    
        // validate
        request()->validate([// validation...
            'tittle' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
    
    
        $livro->update([
            'tittle' => request('tittle'),
            'salary' => request('salary')
        ]);
    
        return redirect("/livros" . "/" . $livro->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro){
        // authorize (On hold...)
        // delete the livro
        // $livro = Livro::findOrFail($id);
        $livro->delete();
        
        // redirect
        return redirect("/livros");
    }
}
