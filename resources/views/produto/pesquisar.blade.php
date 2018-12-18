<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../css/app.css">
        <title>Buscar Produto</title>

    </head>
    <body>
        <div class="container">
            <h1 class="mt-2">Pesquisa de produtos</h1> 
            @if(!empty($mensagem))
                <div class="alert alert-success mt-2">{{ $mensagem }}</div>
            @endif
        <form action="/produtos/pesquisar" method="post" class="form-inline mt-2">
             @csrf
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <input type="text" id="descricao" name="descricao" class="form-control ml-2">
            </div>
            <input type="submit" class="btn btn-primary ml-2" value="Pesquisar">
        </form>
            @if(count($produtos)==0)
                <div class="alert alert-danger mt-2">Nenhum produto encontrado!!!</div>
            @else
                <table class="table mt-2 text-center">
                <tr>
                    <th>Id</th>
                    <th class="text-left">Descrição</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Data de vencimento</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($produtos as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td class="text-left">{{ $p->descricao }}</td>
                        <td>{{ $p->quantidade }}</td>
                        <td>{{ $p->valor }}</td>
                        <td>{{ $p->data_vencimento }}</td>
                        <td><a href="/produtos/excluir/{{ $p->id }}"><button class="btn btn-danger">Excluir</button></a></td>
                        <td><a href="/produtos/alterar/{{ $p->id }}"><button class="btn btn-warning">Alterar</button></a></td>
                    </tr>
                @endforeach
            </table>
            @endif
        </div>
    </body>
</html>
