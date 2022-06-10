<?php

namespace Alura;

class Usuario
{
    private $nome;
    private $sobrenome;

    public function __construct(string $nome)
    {
        //Para acesar os valores que estão vindo do formulário
        //$_POST['nome']

        //função explode - argumentos = delimitador (quebra em espaços no nosso caso), valor, máximo que pode quebrar
        //explode() vai retornar um array contendo strings
        $nomeSobrenome = explode(" ", $nome, 2);

        $this->nome = $nomeSobrenome[0];
        $this->sobrenome = $nomeSobrenome[1];
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string{
        return $this->sobrenome;
    }
}