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
}

