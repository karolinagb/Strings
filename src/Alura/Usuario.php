<?php

namespace App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;

    public function __construct(string $nome = null, string $senha = null)
    {
        //Para acesar os valores que estão vindo do formulário
        //$_POST['nome']

        //função explode - argumentos = delimitador (quebra em espaços no nosso caso), valor, máximo que pode quebrar
        //explode() vai retornar um array contendo strings
        $nomeSobrenome = explode(" ", $nome, 2);

        if($nomeSobrenome[0] === ""){
            $this->nome = "Nome inválido";
        }
        else{
            $this->nome = $nomeSobrenome[0];
        }

        if($nomeSobrenome[1] === null){
            $this->sobrenome = "Sobrenome inválido";
        }
        else{
            $this->sobrenome = $nomeSobrenome[1];
        }

        $this->validaSenha($senha);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string{
        return $this->sobrenome;
    }

    public function getSenha() : string{
        return $this->senha;
    }

    private function validaSenha(string $senha) : void{

        //trim() - Retira espaço no inicio ou no final de uma string
        //Tira também alguns caracteres a mais como de tab

        //retorna o tamanho da string
        $tamanhoSenha = strlen(trim($senha));


        if($tamanhoSenha > 6){
            $this->senha = $senha;
        }
        else{
            $this->senha = "Senha inválida";
        }
    }

    //expressao regular = sequência de caracteres que define um padrão a ser buscado numa string
}