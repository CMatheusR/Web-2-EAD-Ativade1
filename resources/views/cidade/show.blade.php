@extends('templates.main', ['titulo'=>'true'])

@section('titulo') Amostra Free @endsection

@section('conteudo')

    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>ID:</b> {{$dados['id']}}</li>
        <li class="list-group-item"><b>CIDADE:</b> {{$dados['nome']}}</li>
        <li class="list-group-item"><b>PORTE:</b> {{$dados['porte']}}</li>
        <li class="list-group-item">
            <a href="{{route('cidade.index')}}" class="btn btn-secondary btn-block"><b>Voltar</b></a>
        </li>
    </ul>

@endsection
