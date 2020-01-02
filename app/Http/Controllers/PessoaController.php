<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller


{
    public function index() {
        $pessoas = Pessoa::all();
        $total = Pessoa::all()->count();
        return view('list-pessoas', compact('pessoas', 'total'));
    }

    public function create() {
        return view('include-pessoas');
    }

    public function store(Request $request) {
        $pessoa = new Pessoa;
        $pessoa->firstName = $request->firstName;
        $pessoa->lastName = $request->lastName;
        $pessoa->gender = $request->gender;
        $pessoa->age = $request->age;
        $pessoa->email = $request->email;
        $pessoa->password = $request->password;
        $pessoa->save();
        return redirect()->route('pessoa.index')->with('message', 'Pessoa criada com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $pessoa = Pessoa::findOrFail($id);
        return view('alter-pessoas', compact('pessoa'));
    }

    public function update(Request $request, $id) {
        $pessoa = Pessoa::findOrFail($id); 
        $pessoa->firstName = $request->firstName;
        $pessoa->lastName = $request->lastName;
        $pessoa->gender = $request->gender;
        $pessoa->age = $request->age;
        $pessoa->email = $request->email;
        $pessoa->password = $request->password;
        $pessoa->save();
        return redirect()->route('pessoa.index')->with('message', 'Pessoa alterada com sucesso!');
    }

    public function destroy($id) {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect()->route('pessoa.index')->with('message', 'Pessoa excluída com sucesso!');
    }

}
