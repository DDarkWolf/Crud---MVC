<?php

namespace App\Controller;

use App\Model\CategoriaModel;

class CategoriaController extends Controller
{

    public static function index() //Função index é a função que é executada quando está na página principal (nesse caso, só lista todos os registros)
    {
        parent::isAuthenticated();
        //include 'Model/CategoriaModel.php'; //Inclui o arquivo da classe CategoriaModel para poder usar nessa parte do projeto
        $model = new CategoriaModel(); //Instancia um novo objeto do tipo CategoriaModel

        $model->getAllRows(); //Executa a função de pegar todos os registros do objeto model

        include 'View/modules/Categoria/ListaCategorias.php'; //Inclui o arquivo que exibe os dados
    }


    public static function form() //Função que exibe o formulário na tela
    {
        parent::isAuthenticated();
        //include 'Model/CategoriaModel.php'; //Inclui o arquivo da classe CategoriaModel para poder usar nessa parte do projeto
        $model = new CategoriaModel(); //Instancia um novo objeto do tipo CategoriaModel

        if (isset($_GET['id'])) //Se tiver um ID definido na rota (por ex: /categoria/form?id=1),
            $model = $model->getById((int) $_GET['id']); //O model que vai ser exibido no formulário vai ser o model com os dados daquele id

        include 'View/modules/Categoria/FormCategoria.php'; //Inclui o arquivo do formulário
    }


    public static function save() //Função para salvar um registro (pode ser inserir ou atualizar, vai ser o model que vai decidir isso)
    {
        parent::isAuthenticated();
        //include 'Model/CategoriaModel.php'; //Inclui o arquivo da classe CategoriaModel para poder usar nessa parte do projeto

        $categoria = new CategoriaModel(); //Instancia um novo objeto do tipo CategoriaModel
        $categoria->id = $_POST['id']; //Atributo ID do objeto recebe o id que vir do formulário
        $categoria->nome = $_POST['nome']; //Atributo nome do objeto recebe o nome que vir do formulário
        $categoria->save(); //Executa a função de salvar do model

        header('location: /categoria'); //Redireciona para a rota "/categoria"
    }

    public static function delete() //Função para excluir um registro
    {
        parent::isAuthenticated();
        //include 'Model/CategoriaModel.php'; //Inclui o arquivo da classe CategoriaModel para poder usar nessa parte do projeto

        $model = new CategoriaModel(); //Instancia um novo objeto do tipo CategoriaModel
        $model->delete((int) $_GET['id']); //Executa a função delete do model, passando o parâmetro ID
        //O parâmetro é pego da rota, por exemplo: /categoria/delete?id=2

        header("Location: /categoria"); //Redireciona para a rota "/categoria"
    }
}
