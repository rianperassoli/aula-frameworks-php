<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class UsuarioGateway{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){

        $this->tableGateway = $tableGateway;
    }

    public function persistir(Usuario $model){

		$dados = $model->getArrayCopy();

        $this->tableGateway->insert($dados);
    }

    public function listar(){

        return $this->tableGateway->select();
    }

    public function buscarPorId($id){

        $resultados = $this->tableGateway->select(['id' => $id]);

        return $resultados->current();
    }

    public function excluir(Usuario $model){

    	$this->tableGateway->delete(['id' => $model->id]);
    }

    public function atualizar(Usuario $model){
		
		$dados = $model->getArrayCopy();

    	$this->tableGateway->update($dados, ['id' => $model->id]);
    }
}

