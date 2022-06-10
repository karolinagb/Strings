<?php

//O auto load serve para carregar os arquivos das classes automaticamente sem termos que dá um require

//Essa função recebe uma função de auto load
spl_autoload_register(function($classe)
{
    //Temos que identificar quais classes são do nosso projeto em específico
    //Vamos criar um prefixo para o namespace das classes
    $prefixo = "App\\";

    //Agora as classes que forem do namespace App vão ter que ficar em um diretório específico
    //E temos que informar o direito que criamos no arquivo de autoload
    //__DIR__ = pega o diretório do nosso projeto
    $diretorio = __DIR__ . '/src/';

    //Fazer o carregamento só das classes que tiverem o prefixo App:
    //strncmp() - compara 2 strings, porém vamos comparar só o começo, retorn um número inteiro positivo se não for achado o prefixo
    //Comparamos só até o tamanho do prefixo com strlen()
    if(strncmp($prefixo, $classe, strlen($prefixo)) != 0){
        return;
    }

    $namespace = substr($classe, strlen($prefixo));

    //Vamos trocar a barra invertida por barra normal
    //caracter para buscar na string
    //Essa barra invertida quando utilizada dentro de uma string ela também é utilizada como caracter de escape
    //Quando so digitamos a barra antes da string de fechamento, ela perde o sentido de fechamento e fica como se fosse uma aspa simples literal
    //Se quisessemos usar uma aspa simples literal fariamos assim:  str_replace('\'')
    //Para pesquisar uma barra literal colocamos 2 barras
        //2º argumento é pelo oq vamos substituir - DIRECTORY_SEPARATOR = PEGA o separador do sistema operacional usado e coloca
        //3º Qual string queremos fazer essa substituição
    $namespaceArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);

    //Nome do arquivo completo com diretorio onde o autoload deve carregar ele na pagina que suar a classe
    //projeto/src/Alura/NomeClasse.php
    $arquivo = $diretorio . $namespaceArquivo . '.php';

    

    var_dump($arquivo);
});