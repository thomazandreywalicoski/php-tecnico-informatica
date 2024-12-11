<?php

    include('conecta.php');
    session_start(); // Inicioando a sessão

    $usuario = $_SESSION['nome_usuario'];
    $email = $_SESSION['email'];
    $id_cliente = $_SESSION['id_cliente'];

    // Gerando um log

    $tipo = "LOGOUT";
    $descricao = "O usuario $usuario ($email) encerrou a sessão do sistema com sucesso!";
    $ip = $_SERVER['REMOTE_ADDR'];
    $host = $_SERVER['REMOTE_HOST'];

    // Gerar o INSERT para o log

    $sql_log = "INSERT INTO log_thomaz (tipo, descricao, ip, host, id_cliente) VALUES ('$tipo', '$descricao', '$ip', '$host', '$id_cliente')";

    // Enviando os dados para o banco de dados usando o script acima
    mysqli_query($conecta, $sql_log) or die("Não foi possível gravar o log no sistema!");

    session_destroy(); // Destroi a sessão

    header('location: login.php');

?>