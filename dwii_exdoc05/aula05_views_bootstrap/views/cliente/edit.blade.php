

@extends('templates.main', ['titulo' => "Alterar Cliente", 'tag' => "CLI"])

@section('titulo') {{$dados['nome']}} @endsection

@section('conteudo')

    <form action="{{ route('cliente.update', $dados['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class='row'>
                <div class='col-sm-6'>
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{$dados['nome']}}">
                </div>
                <div class='col-sm-6'>
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{$dados['email']}}">
                </div>
            </div>
            <div class='row' style="margin-top:20px">
                <div class='col-sm-4'>
                    <a href="{{route('cliente.index')}}" class="btn btn-danger btn-block"><b>Cancelar / Voltar</b></a>
                </div>
                <div class='col-sm-8'>
                    <button type="submit" class="btn btn-success btn-block"><b>Confirmar / Salvar</b></button>
                </div>
            </div>
        </div>
    </form>

@endsection
