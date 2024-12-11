<?php

    include('conecta.php');

    $id_cliente = $_POST['id_cliente'];
    $senha = md5($_POST['senha']);
    $confirma_senha = md5($_POST['confirmasenha']);

    // Verifica se a senha digitada pelo usuário são iguais

    if($senha != $confirma_senha) {
        echo "<script>
                window.alert('As senhas digitadas são diferentes!');
                window.location='lista_cliente.php';
            </script>";

    } else {
        $sql_altera_senha = "UPDATE cliente_thomaz SET senha = '$senha' WHERE id_cliente = '$id_cliente'";
        $ta_quase = mysqli_query($conecta, $sql_altera_senha) or die("Não foi possível fazer a alteração da senha!");

        header('location: lista_cliente.php');
    }


?>