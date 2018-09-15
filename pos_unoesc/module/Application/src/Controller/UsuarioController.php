<?php
namespace Application\Controller;

use Zend\ {
    Mvc\Controller\AbstractActionController,
    View\Model\ViewModel
};

class UsuarioController extends AbstractActionController
{
    public function indexAction(){

        return new ViewModel(['email' => 'galvao@galvao.eti.br']);
    }

    public function visualizarAction(){

   		$id = $this->params()->fromRoute('id', 0);

   		return new ViewModel(['id' => $id]);
    }

    public function cadastrarAction(){

   		$req = $this->getRequest();

   		if ($req->isPost()){
   			$dados = $req->getPost();
   		}

   		return new ViewModel([
   			'email' => isset($dados['email']) ? $dados['email'] : '',
   			'senha' => isset($dados['senha']) ? $dados['senha'] : '',
   		]);
    }
}
