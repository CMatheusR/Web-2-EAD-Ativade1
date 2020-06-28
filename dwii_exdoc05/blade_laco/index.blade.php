<h1>Clínica Veterinária: {{ $clinica }}</h1>
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
        @for($a=0; $a<count($clientes); $a++)
            <tr>
                <td>{{ $clientes[$a]['id'] }}</td>
                <td>
                    @if(strcmp($clientes[$a]['nome'], "Gil Eduardo") == 0)
                        <b>{{ $clientes[$a]['nome'] }}</b>
                    @elseif(strcmp($clientes[$a]['nome'], "Carlos") == 0)
                        <i>{{ $clientes[$a]['nome'] }}</i>
                    @else
                        {{ $clientes[$a]['nome'] }}
                    @endif
                </td>
                <td>{{ $clientes[$a]['email'] }}</td>
                <td><a href="{{ route('cliente.show', $clientes[$a]['id']) }}">info</a></td>
                <td><a href="{{ route('cliente.edit', $clientes[$a]['id']) }}">editar</a></td>
                <td>
                    <form action="{{ route('cliente.destroy', $clientes[$a]['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type='submit' value='remover'>
                    </form>
                </td>
            </tr>
        @endfor
    </tbody>
</table>

