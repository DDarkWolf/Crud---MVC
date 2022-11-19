<?php

namespace App\Model;
use App\DAO\CategoriaDAO;

class CategoriaModel
{
    public $id, $nome; // Atributos ID e Nome

    public $rows; //Atributo rows (registros do BD, para qdo precisar)
    
    public function save() // Função de salvar
    {
        //include 'DAO/CategoriaDAO.php'; //Inclui o arquivo da classe CategoriaDAO para poder usar nessa parte do projeto

        $dao = new CategoriaDAO(); //Instancia um novo objeto DAO

        if($this->id == null) { // Se ESSE objeto não tiver ID,
            $dao->insert($this); //vai executar a função de inserir do DAO, passando esse objeto como parâmetro para a função
        } else { // Senão
            $dao->update($this); //Vai executar a função de update do DAO, passando esse objeto como parâmetro para a função
        }
    }

    public function getAllRows() //Função que retorna todos os registros do BD
    {
        //include 'DAO/CategoriaDAO.php'; //Inclui o arquivo da classe CategoriaDAO para poder usar nessa parte do projeto

        $dao = new CategoriaDAO(); //Instancia um novo objeto DAO

        $this->rows = $dao->getAllRows(); //O atributo "rows" da classe vai receber os registros retornados pelo DAO
    }

    public function getById(int $id) //Função que retorna os dados de um registro específico do BD
    {
        //include 'DAO/CategoriaDAO.php'; //Inclui o arquivo da classe CategoriaDAO para poder usar nessa parte do projeto

        $dao = new CategoriaDAO(); //Instancia um novo objeto DAO
        $obj = $dao->selectById($id); //Parâmetro objeto vai receber os dados retornados pela função do DAO

        
        return ($obj) ? $obj : new CategoriaModel(); //Se tiver um objeto, vai retornar ele, senão vai instanciar um novo objeto Model
    }

    public function delete(int $id) // Função para deletar um registro pelo ID
    {
        //include 'DAO/CategoriaDAO.php'; //Inclui o arquivo da classe CategoriaDAO para poder usar nessa parte do projeto

        $dao = new CategoriaDAO(); //Instancia um novo objeto DAO
        $dao->delete($id); //Executa a função de deletar do DAO, e passa o parâmetro ID da função do Model como parâmetro do DAO
    }
}