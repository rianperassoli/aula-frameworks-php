<?php
namespace Application\Controller;

use Zend\ {
    Mvc\Controller\AbstractActionController,
    View\Model\ViewModel
};

class UsuarioController extends AbstractActionController
{
    private $table;

    public function __construct($gateway){

        $this->table = $gateway;
    }

    public function indexAction(){

        return new ViewModel(['email' => 'rian.perassoli@gmail.com']);
    }

    public function visualizarAction(){

        $id = $this->params()->fromRoute('id', 0);

        $usuario = $this->table->buscarPorId($id);

        if ($id == 0) {
            return new ViewModel([
                'dados' => $this->table->listar()
            ]);  
        } else {
            return new ViewModel([
                'dados' => [$usuario]
            ]); 
        };
    }

    public function cadastrarAction(){
        $req = $this->getRequest();

        if ($req->isPost()) {
            $dados = $req->getPost();

            $model = new \Application\Model\Usuario();
            $model->exchangeArray(['email' => $dados['email'], 'senha' => $dados['senha']]);

            $this->table->persistir($model);

            return $this->redirect()->toRoute('usuario_perfil');
        }        
    }

    public function excluirAction(){

        $id = $this->params()->fromRoute('id',0);

        $usuario = $this->table->buscarPorId($id);

        $this->table->excluir($usuario);

        return $this->redirect()->toRoute('usuario_perfil');
    }

    public function atualizarAction(){

        $req = $this->getRequest();
        $id = $this->params()->fromRoute('id',0);
        $form = new \Application\Form\UsuarioForm();

        if ($req->isPost()) {
            $dados = $req->getPost();

            $form->setData($dados);

            $form->isValid();

            $model = new \Application\Model\Usuario();
            $model->exchangeArray($form->getData());

            $this->table->atualizar($model);

            return $this->redirect()->toRoute('usuario_perfil');
        } else {
            $dados = $this->table->buscarPorId($id);
            $form->bind($dados);

            return new ViewModel(['form' => $form]);
        }
    }

}













