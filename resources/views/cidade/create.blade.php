@extends('templates.main', ['titulo'=>'true'])

@section('titulo') Cadastro @endsection

@section('conteudo')

    <form action="{{route('cidade.store')}}" method="POST">

    @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                </div>
                <div class="col-sm-4">
                    <a href="{{route('cidade.index')}}" class="btn btn-danger btn-block"><b>Cancelar / Voltar</b></a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="col-sm-6">
                    <label>Porte</label>
                    <select class="form-control" name="porte">
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>

            </div>

        </div>
    </form>


@endsection
