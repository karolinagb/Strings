<?php

namespace Alura;

class Contato
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getUsuario() : string
    {
        //Retorna a posição onde está o @
        $posicaoArroba= strpos($this->email, "@");

        if($posicaoArroba === false){
            return "Usuario inválido";
        }

        //Retorna parte de uma string
        //parametros string, de onde começa a contar, e onde acaba de contar
        return substr($this->email, 0, $posicaoArroba);
    }
}