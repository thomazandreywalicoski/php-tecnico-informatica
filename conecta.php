<?php

    $hostname = 'localhost';
    $username = 'cedup124';
    $password = 'tonicodasneves';
    $banco = 'cedup124';

    // Cria uma conexão com o banco de dados
    $conecta = mysqli_connect($hostname, $username, $password, $banco);

    // Verifica a conexão com o banco de dados
    if(!$conecta) {
        die("A conexão falhou: " . mysqli_connect_error());
    }

    // Caso a conexão seja estabelecida com sucesso
    //echo "Conexão estabelecida com sucesso!";


?>