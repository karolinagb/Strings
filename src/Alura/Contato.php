<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;

    public function __construct(string $email = null, string $endereco = null, string $cep = null, string $telefone = null)
    {
        if($this->ValidaEmail($email) !== false){
            $this->setEmail($email);
        }
        else{
            $this->setEmail("Email inválido.");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;

        if($this->validaTelefone($telefone) == true){
            $this->setTelefone($telefone);
        }
        else{
            $this->setTelefone("Telefone inválido");
        }

    }

    private function validaTelefone(string $telefone) : int{
        //Possibilita usarmos uma expressão regular no php
        //Parâmetros - expressão regular, em qual string ela vai ser executada, variável com os retornos
        //6455-7546
        //^[0-9]{4}-[0-9]{4}$ - do começo da linha encontrar um conjunto de 0-9 com um tamanho de até 4, depois separado por - outro conjunto
        //com o mesmo critério e depois finaliza $
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrados);
    }

    private function setTelefone(string $telefone) : void{
        $this->telefone = $telefone;
    }

    private function setEmail(string $email) : void{
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

    public function getTelefone() : string {
        return $this->telefone;
    }
}