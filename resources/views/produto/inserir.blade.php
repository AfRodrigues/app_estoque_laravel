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
                <h1 class="mt-2">Inserir produto</h1>
                @if(!empty($mensagem))
                    <div class="alert alert-success">Produto inserido com sucesso!</div>
                @endif
                
                <form action="/produtos/inserir" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="descricao">Descrição: <span class="text-danger">*</span></label>
                        <input type="text" id="descricao" name="descricao" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade: <span class="text-danger">*</span></label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor: <span class="text-danger">*</span></label>
                        <input type="number" id="valor" name="valor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="data_vencimento">Data de vencimento: </label>
                        <input type="date" id="data_vencimento" name="data_vencimento" class="form-control">
                    </div>
                    <div>Os campos marcados com <span class="text-danger">*</span> não podem estar em branco.</div>
                    <input type="submit" class="btn btn-success mt-2" value="Inserir">
                </form>
            </div>
    </body>
</html>
