<html>
<head>
    <title>Sistema de Gestão de Municípios</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-success">
            @if($titulo != 'false')
                <h1>@yield('titulo')</h1>
            @endif
            <h2><b>Sistema de Gestão de Municípios</b></h2>
        </div>
        <div class="card-body">
            @yield('conteudo')
        </div>
    </div>
</div>
<hr>
</body>
<footer>
    <div class="container">
        <b>&copy;2020 - Claudio Matheus do Rosario.</b>
    </div>
</footer>
<script scr='{{asset('js/app.js')}}' type='text/javascript'></script>
</html>

