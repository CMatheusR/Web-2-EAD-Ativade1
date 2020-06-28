<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cidade extends Controller
{
    public $cidade = [[
        'id' => 1,
        'nome' => 'Paranagua',
        'porte' => 'Pequena'
        ]];


    public function __construct(){
        $aux = session('cidade');
        if(!isset($aux)){
            session(['cidade' => $this->cidade]);
        }
    }

    public function index() {
        $cidade = session('cidade');
        return view('cidade.index', compact('cidade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aux = session('cidade');
        $ids = array_column($aux, 'id');

        if (count($ids) > 0){
            $new_id = max($ids) + 1;
        }
        else{
            $new_id = 1;
        }

        $novo = [
            'id' => $new_id,
            'nome' => $request->nome,
            'porte' => $request->porte
        ];

        array_push($aux, $novo);
        session(['cidade' => $aux]);

        return redirect()->route('cidade.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aux = session('cidade');
        $indice = array_search($id, array_column($aux, 'id'));
        $dados = $aux[$indice];

        return view('cidade.show', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aux = session('cidade');
        $indice = array_search($id, array_column($aux, 'id'));
        $dados = $aux[$indice];

        return view('cidade.edit', compact('dados'));
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
        $alterado = [
            'id' => $id,
            'nome' => $request->nome,
            'porte' => $request->porte
        ];

        $aux = session('cidade');
        $indice = array_search($id, array_column($aux, 'id'));

        $aux[$indice] = $alterado;
        session(['cidade' =>$aux]);

        return redirect()->route('cidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aux = session('cidade');
        $indice = array_search($id, array_column($aux, 'id'));

        unset($aux[$indice]);
        $array_aux = array();

        foreach ($aux as $con){
            array_push($array_aux, $con);
        }

        session(['cidade' => $array_aux]);

        return redirect()->route('cidade.index');
    }
}
