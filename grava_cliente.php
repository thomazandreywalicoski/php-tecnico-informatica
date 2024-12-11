<?php

    // Incluindo a conexão com o banco de dados
    include('conecta.php');

    // Recebendo valores e guardando em variáveis

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
    $senha = md5($_POST['senha']);
    $status = 1;

    // Script para inserção do SQL no banco de dados
    $sql_insert = "INSERT INTO cliente_thomaz (cpf, nome, cep, endereco, numero, complemento, bairro, cidade, uf, telefone, email, senha, status) VALUES ('$cpf', '$nome', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$telefone', '$email', '$senha', '$status')";

    if($cpf != "" && $nome != "") {

        // Enviando os dados para o banco de dados usando o script acima
        mysqli_query($conecta, $sql_insert) or die("Não foi possível gravar o novo cliente!");

    } else {
        echo"<script> window.alert('Opereção não permitida!');
        window.location='cadastro_cliente.php'</script>";
    }
    
?>