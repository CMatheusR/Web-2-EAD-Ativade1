@extends('templates.main', ['titulo'=>'true'])

@section('titulo') Edição @endsection

@section('conteudo')

    <form action="{{route('cidade.update', $dados['id'])}}" method="POST">
        @csrf
        @method('PUT')
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
                    <input type="text" class="form-control" name="nome" value="{{$dados['nome']}}">
                </div>
                <div class="col-sm-6">
                    <label>Porte</label>
                    <select class="form-control" name="porte">

                        <option value="Pequeno"
                            @if($dados['porte'] == 'Pequeno')
                                selected
                            @endif
                        >Pequeno
                        </option>

                        <option value="Médio"
                            @if($dados['porte'] == 'Médio')
                                selected
                            @endif
                        >Médio
                        </option>
                        <option value="Grande"
                            @if($dados['porte'] == 'Grande')
                                selected
                            @endif
                        >Grande
                        </option>
                    </select>
                </div>

            </div>

        </div>
    </form>

@endsection
