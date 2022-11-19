<?php

namespace App\Controller;

use App\Model\ProdutoModel;
use App\Model\CategoriaModel;

class ProdutoController extends Controller
{
    public static function index()
    {
        parent::isAuthenticated();

        //include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();
        $model->getAllRows();

        include 'View/modules/Produto/ListaProdutos.php';
    }

    /**
     * 
     */
    public static function form()
    {
        parent::isAuthenticated();

        //include 'Model/CategoriaModel.php';
        $modelCategoria = new CategoriaModel();
        $modelCategoria->getAllRows();

        //include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();

        if (isset($_GET['id']))
            $model = $model->getById((int) $_GET['id']);

        include 'View/modules/Produto/FormProduto.php';
    }

    /**
     * 
     */
    public static function save()
    {
        parent::isAuthenticated();
        //include 'Model/ProdutoModel.php';

        $produto = new ProdutoModel();
        $produto->id = $_POST['id'];
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->valor = $_POST['valor'];
        $produto->data_adicionado = $_POST['data_adicionado'];
        $produto->id_categoria = $_POST['id_categoria'];
        $produto->save();

        header('location: /produto');
    }

    public static function delete()
    {
        parent::isAuthenticated();
        //include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->delete((int) $_GET['id']);

        header("Location: /produto");
    }
}
