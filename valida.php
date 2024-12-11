<?php

    session_start(); // Inicioando a sessão
    include('conecta.php'); // Conexão com o Banco de Dados

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql_login = "SELECT * FROM cliente_thomaz WHERE email = '$email' AND senha = '$senha' AND status = 1";
    $consulta = mysqli_query($conecta, $sql_login);
    $cont_email = mysqli_num_rows($consulta);

    if($cont_email >= 1) {

        // Consulta o nome do usuário que logou no sistema
        
        while($exibe_usuario = mysqli_fetch_assoc($consulta)) {
            $id_cliente = $exibe_usuario['id_cliente'];
            $_SESSION['id_cliente'] = $id_cliente;
            $_SESSION['nome_usuario'] = $exibe_usuario['nome'];
            $_SESSION['email'] = $email;
            $usuario = $exibe_usuario['nome'];
            $_SESSION['nivel'] = $exibe_usuario['nivel'];
        }

        // Gerando um log

        $tipo = "ACESSO";
        $descricao = "O usuário $usuario acessou o sistema com sucesso";
        $ip = $_SERVER['REMOTE_ADDR'];
        $host = $_SERVER['REMOTE_HOST'];

        // Gerar o INSERT para o log

        $sql_log = "INSERT INTO log_thomaz (tipo, descricao, ip, host, id_cliente) VALUES ('$tipo', '$descricao', '$ip', '$host', '$id_cliente')";

        // Enviando os dados para o banco de dados usando o script acima
        mysqli_query($conecta, $sql_log) or die("Não foi possível gravar o log no sistema!");

        header("location: principal.php"); // Encaminha o usuário para a tela principal

    } else {

        // Recusa a conexão do usuário


        // Gerando um log

        $tipo = "NEGADO";
        $descricao = "Tentativa de acesso do usuario $email";
        $ip = $_SERVER['REMOTE_ADDR'];
        $host = $_SERVER['REMOTE_HOST'];

        // Gerar o INSERT para o log

        $sql_log = "INSERT INTO log_thomaz (tipo, descricao, ip, host, id_cliente) VALUES ('$tipo', '$descricao', '$ip', '$host', '$id_cliente')";

        // Enviando os dados para o banco de dados usando o script acima
        mysqli_query($conecta, $sql_log) or die("Não foi possível gravar o log no sistema!");

        header("location: login.php");
    }

?>