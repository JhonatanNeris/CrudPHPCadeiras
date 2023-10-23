<?php
    define("HOST","localhost:3307");
    define("USUARIO","root");
    define("SENHA","");
    define("NOMEBD","provaa2_31286551_29694256_31948006_31065210_31100007");

    $conexao = new mysqli(HOST,USUARIO,SENHA,NOMEBD);
    
    if($conexao->error)
    {
        //A função die, significa que vamos matar o processo, encerrar o processo
        die("<pre>"."Não foi possível conectar-se ao MySQL. Favor contactar o Administrador !!!!". $conexao->error);
    }
?>
