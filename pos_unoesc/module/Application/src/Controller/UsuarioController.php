<?php
namespace Application\Controller;

use Zend\ {
    Mvc\Controller\AbstractActionController,
    View\Model\ViewModel
};

class UsuarioController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel(['email' => 'galvao@galvao.eti.br']);
    }
}
