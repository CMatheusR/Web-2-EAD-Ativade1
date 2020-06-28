@extends('templates.main', ['titulo'=>'true'])

@section('titulo') Cidades @endsection

@section('conteudo')

    <div class="container">
        <div class='row'>
            <div class='col-sm-12'>
                <a href="{{ route('cidade.create') }}" type="button" class="btn btn-primary btn-block">
                    <b>Cadastrar Novo Cidade</b>
                </a>
            </div>
        </div>
        <x-tablelist :header="['CIDADE', 'EVENTO']" :data="$cidade"/>
    </div>

@endsection

