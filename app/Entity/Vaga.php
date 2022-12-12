<?php

namespace App\Entity;

use App\Database\Database;
use \PDO;

class Vaga{

    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descricao da vaga
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga esta ativa
     * @var string('s', 'n')
     */
    public $ativo;

    /**
     *data de publicação da vaga
     *@var string
     */
    public $data;

    /**
     * Método para cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar(){
        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        //INSERIR A VAGA NO BANCO
        $obDatabase = new Database('vagas');
       $this->id = $obDatabase->insert([
                            'titulo'=>$this->titulo,
                            'descricao'=>$this->descricao,
                            'ativo'=>$this->ativo,
                            'data'=>$this->data
                         ]);
      
       

        //RETORNAR SUCESSO
        return true;
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null,$order = null, $limit = null){
        return (new Database('vagas'))->select($where,$order,$limit)
                                      ->FetchAll(PDO::FETCH_CLASS, self::class);
    }
}