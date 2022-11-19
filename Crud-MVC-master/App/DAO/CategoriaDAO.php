<?php

namespace App\DAO;
use App\Model\CategoriaModel;
use \PDO;

class CategoriaDAO
{
    private $conexao;

    function __construct() //Método construtor da classe. Sempre que essa classe é instanciada, vai ser executada essa função
    { 
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database']; //dsn = data source name. Contém o host e o nome do BD
        $user = $_ENV['db']['user']; //Usuário p/ acessar o banco de dados
        $pass = $_ENV['db']['pass']; //Senha do usuário
        
        $this->conexao = new PDO($dsn, $user, $pass); //Atributo conexao da DAO vai receber um novo objeto do tipo PDO
    }

    function insert(CategoriaModel $model) //Função para inserir um Model
    {
        $sql = "INSERT INTO categorias 
                (nome) VALUES (?)"; //Código SQL que vai ser executado
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome); //"substitui" o primeiro "?" da query pelo nome que está armazenado no model. 
                                           // O nome vai vir do form

        $stmt->execute(); //Executa a query no BD
    }

    
    function getAllRows() //Função para retornar todos os registros de categoria
    {
        $sql = "SELECT * FROM categorias"; //Código SQL que vai ser executado

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); //Executa a query no BD

        return $stmt->fetchAll(); //Quando o método é chamado, retorna todos os dados de quando executa a query
    }

    
    public function selectById(int $id) //Função para selecionar os dados de um registro específico (pelo ID)
    {
        //include_once 'Model/CategoriaModel.php'; //Inclui o arquivo da classe CategoriaModel para poder usar nessa parte do projeto

        $sql = "SELECT * FROM categorias WHERE id = ?"; //Código SQL que vai ser executado

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id); //Troca o 1º ? pelo parâmetro ID da função
        $stmt->execute(); //Executa a query

        return $stmt->fetchObject("App\Model\CategoriaModel"); //Constrói um objeto após executar a query e retorna ele
    }

    public function update(CategoriaModel $model) //Função para atualizar um registro, através do Model
    {
        $sql = "UPDATE categorias SET nome=? WHERE id=? "; //Código SQL que vai ser executado

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome); //Troca o 1º ? pelo atributo nome do parâmetro Model da função
        $stmt->bindValue(2, $model->id); //Troca o 2º ? pelo atributo id do parâmetro Model da função
        $stmt->execute(); //Executa a query
    }
    
    public function delete(int $id) //Função para excluir um registro pelo ID
    {
        $sql = "DELETE FROM categorias WHERE id = ? "; //Código SQL que vai ser executado

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id); //Troca o 1º ? pelo parâmetro ID da função
        $stmt->execute(); //Executa a query
    }
}