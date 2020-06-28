@extends('templates.main')

@section('titulo') Clientes @endsection

@section('conteudo')

    <h2>Lista de Clientes</h2>
    <a href="{{ route('cliente.create') }}"><h4>Novo Cliente</h4></a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>INFO</th>
                <th>EDITAR</th>
                <th>REMOVER</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['nome'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td><a href="{{ route('cliente.show', $item['id']) }}">info</a></td>
                    <td><a href="{{ route('cliente.edit', $item['id']) }}">editar</a></td>
                    <td>
                        <form action="{{ route('cliente.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='remover'>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

