<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller
{
    public function pesquisar()
	{
	// Recebe o conteúdo elemento 'descricao' do formulário
        $descricao = Input::get('descricao');
        
        // Busca produtos com o conteúdo da $descricao
        $produtos = Produto::where('descricao', 'like', '%'.$descricao.'%')->get();
        
        // Chama a view produto.pesquisar e envia os produtos encontrados
        return view('produto.pesquisar')->with('produtos', $produtos);
    }
    
    public function mostrar_inserir()
    {
    	return view('produto.inserir');
    }

    public function inserir()
    {
    	// Criar OBJ produto
    	$produto = new Produto();

    	// Receber valores do forms
    	$produto->descricao = Input::get('descricao');
    	$produto->quantidade = Input::get('quantidade');
    	$produto->valor = Input::get('valor');
    	$produto->data_vencimento = Input::get('data_vencimento');
    	
    	// Salvar no BD
    	$produto->save();

    	// Gerar MSG para o usuario
    	$mensagem = "Produto inserido com sucesso!!!";
    	
    	// Retornar para o formulario
    	return view('produto.inserir')->with('mensagem', $mensagem);
    }

    public function mostrar_alterar($id)
    {
        // Busca no banco o registro com o id recebido
        $produto = Produto::find($id);
        
        // Envia os dados deste registro a view produto.alterar
        return view('produto.alterar')->with('produto', $produto);
    }

    public function alterar()
    {
        $id = Input::get('id');
        $p = Produto::find($id);

        $p->descricao = Input::get('descricao');
        $p->quantidade = Input::get('quantidade');
        $p->valor = Input::get('valor');
        $p->data_vencimento = Input::get('data_vencimento');

        $p->save();

        $mensagem = "Produto alterado com sucesso!";
        $produtos = Produto::all();
        return view('produto.pesquisar')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }

    public function excluir($id)
    {
    	// Buscar OBJ a ser excluido
    	$produto = Produto::find($id);
    	
    	// Excluir OBJ
    	$produto->delete();

    	// Criar MSG a ser enviada para View
    	$mensagem = "Produto apagado com sucesso!!!";
    	
    	// Listando OBJs para listar de volta na View
    	$produtos = Produto::all();

    	// Redirecionar para View
    	return view('produto.pesquisar')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }
}
