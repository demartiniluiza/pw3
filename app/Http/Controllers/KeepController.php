<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class keepController extends Controller
{
    public function index(Request $request){
        $notas = Nota::all();
        return view('keep/index', [
            'notas' => $notas,
        ]);
    }

    public function create(Request $request){
        if ($request->isMethod('post')){

            $dados =  $request->validate([
                'nota' => 'required|min:5|max:255',
                'cor' => 'required',
            ]);
            
            Nota::create($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota criada com sucesso.');
        }
        return view('keep/create');
    }

}
