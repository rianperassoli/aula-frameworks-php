<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class UsuarioGateway
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function persistir(Usuario $model)
    {
        $dados = [
            'email' => $model->email,
            'senha' => $model->senha,
        ];

        $this->tableGateway->insert($dados);
    }

    public function listar(){

        return $this->tableGateway->select();
    }

    public function visualizar($id){

        $resultados = $this->tableGateway->select(['id' => $id]);

        return $resultados->current();
    }

    public function excluir($id){

    	$this->tableGateway->delete(['id' => $id]);
    }

    public function atualizar($model){
		$dados = [
			'id' => $model->id,
            'email' => $model->email,
            'senha' => $model->senha,
        ];

    	$this->tableGateway->update($dados, ['id' => $model->id]);
    }
}

