 <!-- https://material.io/resources/icons/?icon=delete&style=baseline -->

@extends('templates.main', ['titulo' => "Clientes", 'tag' => "CLI"])

@section('titulo') Clientes @endsection

@section('conteudo')

    <div class='row'>
        <div class='col-sm-6'>
            <a  href="{{ route('cliente.create') }}" type="button" class="btn btn-primary btn-block">
                <b>Cadastrar Novo Cliente</b>
            </a>
        </div>
        <div class='col-sm-5' style="text-align: center">
            <input type="text" list="clientes" class="form-control" autocomplete="on" placeholder="buscar">
            <datalist id="clientes">
                @foreach ($clientes as $item)
                    <option value="{{ $item['nome'] }}">
                @endforeach
            </datalist>
        </div>
        <div class='col-sm-1' style="text-align: center">
            <button type="button" class="btn btn-default btn-block">
                <img src="{{ asset('img/icons/search.svg') }}">
            </button>
        </div>
    </div>
    <br>
    <div class="table-responsive" style="overflow-x: visible; overflow-y: visible;">
        <table class='table table-striped'>
            <thead>
                <tr style="text-align: center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Eventos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $item)
                    <tr style="text-align: center">
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['nome'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>
                            <a href="{{ route('cliente.show', $item['id']) }}"><img src="{{ asset('img/icons/info.svg') }}"></a>
                            <a href="{{ route('cliente.edit', $item['id']) }}"><img src="{{ asset('img/icons/edit.svg') }}"></a>
                            <a href="javascript:form_{{$item['id']}}.submit()"><img src="{{ asset('img/icons/delete.svg') }}"></a>
                        </td>
                    </tr>
                    <form action="{{ route('cliente.destroy', $item['id']) }}"
                        method="POST" name="form_{{$item['id']}}">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

