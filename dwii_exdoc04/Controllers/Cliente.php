<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cliente extends Controller {

    public $clientes = [[
        'id' => 1,
        'nome'  => 'Gil Eduardo',
        'email' => 'gil@gil.com'
    ]];

    public function __construct() {

        $aux = session('clientes');

        if(!isset($aux)) {
            session(['clientes' => $this->clientes]);
        }
    }

    public function index() {

        $clientes = session('clientes');
        return view('cliente.index', compact('clientes'));
    }

    public function create() {

        return view('cliente.create');
    }

    public function store(Request $request) {

        $aux = session('clientes');
        $ids = array_column($aux, 'id');

        if(count($ids) > 0) {
            $new_id = max($ids) + 1;
        }
        else {
            $new_id = 1;
        }

        $novo = [
            'id' => $new_id,
            'nome' => $request->nome,
            'email' => $request->email
        ];

        array_push($aux, $novo);
        session(['clientes' => $aux]);

        return redirect()->route('cliente.index');
    }

    public function show($id) {

        $aux = session('clientes');
        $indice = array_search($id, array_column($aux, 'id'));
        $dados = $aux[$indice];

        return view('cliente.show', compact('dados'));
    }

    public function edit($id) {

        $aux = session('clientes');
        $indice = array_search($id, array_column($aux, 'id'));
        $dados = $aux[$indice];

        return view('cliente.edit', compact('dados'));
    }

    public function update(Request $request, $id) {

        $alterado = [
            'id' => $id,
            'nome' => $request->nome,
            'email' => $request->email
        ];

        $aux = session('clientes');
        $indice = array_search($id, array_column($aux, 'id'));

        $aux[$indice] = $alterado;
        session(['clientes' => $aux]);

        return redirect()->route('cliente.index');
    }

    public function destroy($id) {

        $aux = session('clientes');
        $indice = array_search($id, array_column($aux, 'id'));

        unset($aux[$indice]);
        session(['clientes' => $aux]);

        return redirect()->route('cliente.index');
    }
}
