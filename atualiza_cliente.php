<?php

    // Incluindo a conexão com o banco de dados
    include('conecta.php');

    // Recebendo valores e guardando em variáveis

    $id_cliente = $_POST['id_cliente'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $sql_update = "UPDATE cliente_thomaz SET cpf = '$cpf', nome = '$nome', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', telefone = '$telefone', email = '$email', status = '$status' WHERE id_cliente = $id_cliente";

    mysqli_query($conecta, $sql_update) or die("Não foi possível atualizar o cliente!");

    header('location: principal.php');

?>