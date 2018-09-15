<?php
namespace Application\Controller;

use Zend\ {
    Mvc\Controller\AbstractActionController,
    View\Model\ViewModel
};

class UsuarioController extends AbstractActionController
{
    private $table;

    public function __construct($gateway)
    {
        $this->table = $gateway;
    }

    public function indexAction()
    {
        return new ViewModel(['email' => 'galvao@galvao.eti.br']);
    }

    public function visualizarAction()
    {
        $id = $this->params()->fromRoute('id', 0);

        return new ViewModel([
            'id' => $id,
        ]);
    }

    public function cadastrarAction()
    {
        $req = $this->getRequest();

        if ($req->isPost()) {
            $dados = $req->getPost();

            $model = new \Application\Model\Usuario();
            $model->exchangeArray(['email' => $dados['email'], 'senha' => $dados['senha']]);

            $this->table->persistir($model);
        }

        return new ViewModel([
            'teste' =>  isset($dados['email']) ? $dados['email'] : '',
        ]);
    }
}













