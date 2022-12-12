<?php

namespace App\Database;
use \PDO;
use PDOException;

/**
 * Class para conectar com o banco de dados
 */
class Database
{
    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'bd_vagas';

    /**
     * Nome do usuário do banco de dados
     */
    const USER = 'root';

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = '';

    /**
     * Nome da tabela manipulada
     */
    private $table;

    /**
     * Instancia de conexao com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //caso algo de errado
        } catch (PDOException $e) {
            die($e->getMessage()); //Não colocar em produção
        }
    }

    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
            
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco
     * @param array $values [ field => value]
     * @return integer ID Inserido
     */
    public function insert($values){
        //DADOS DA QUERY
        $fields = array_keys($values); //retorna em um array os campos titulo, descricao, ativo e data
        $binds = array_pad([], count($fields), '?'); //cria um array vazio, count conta os num de posições de $fields, caso ultrapasse esse num, as novas serão ?

        
        
        //MONTA A QUERY
        /**
         * $this->table retorna a tabela selecionada em vagas
         * o implode transformando ele em string e concatena e separa por virgula as variaveis de Vagas chamada pela funcao insert
         * 
         */
        $query = 'INSERT INTO '. $this->table.'('.implode(',',$fields).') VALUES ('.implode(',', $binds).')';

        //EXECUTA O INSERT
        $this->execute($query,array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
       
    }

    /**
     * Metodo responsavel por executar uma consulta no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */
    public function select($where = null,$order = null,$limit = null, $fields = '*'){
        //DADOS DA QUERY            - IF TERNARIO - Se tiver algo dentro de alguma dessas variaveis, concatenará o SQL + o valor da variável
        $where = !empty($where) ? 'WHERE '.$where : '';
        $order = !empty($order) ? 'ORDER BY '.$order : '';
        $limit = !empty($limit) ? 'LIMIT '.$limit : '';

        //MONTA A QUERY
        $query = 'SELECT '.$fields.'  FROM '. $this->table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }
}
