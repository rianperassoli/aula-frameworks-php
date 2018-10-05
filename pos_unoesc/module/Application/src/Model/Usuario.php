<?php
namespace Application\Model;

class Usuario
{
    public $id;
    public $email;
    public $senha;

    public function getArrayCopy()
     {
         return get_object_vars($this);
     }

    public function exchangeArray(array $dados){
        $this->id = isset($dados['id']) ? $dados['id'] : NULL;
        $this->email = $dados['email'];
        $this->senha = $dados['senha'];
    }
}
