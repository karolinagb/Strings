<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;

    public function __construct(string $email = null, string $endereco = null, string $cep = null)
    {
        if($this->ValidaEmail($email) !== false){
            $this->setEmail($email);
        }
        else{
            $this->setEmail("Email inválido.");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    public function setEmail(string $email) : void{
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

    private function ValidaEmail(string $email){
        //Filtra a variável como se ela fosse um e-mail
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getEnderecoCep() : string{
        //junta duas strings
        //parametros - string $glue (cola), array do que vai ser juntado
        return implode(" - ", [$this->endereco, $this->cep]);
    }
}