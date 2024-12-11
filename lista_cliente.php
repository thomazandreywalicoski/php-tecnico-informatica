<?php

    include('conecta.php');

    if(isset($_REQUEST['pesquisa']) && !empty($_REQUEST['pesquisa'])) {
        $pesquisa = $_GET['pesquisa'];
    }

    if($pesquisa == "") {
        $sql_cliente = "SELECT * FROM cliente_thomaz ORDER BY status DESC, nome ASC";
        $consulta = mysqli_query($conecta, $sql_cliente);
        $contador_cliente = mysqli_num_rows($consulta);
    } else {
        $sql_cliente = "SELECT * FROM cliente_thomaz WHERE nome LIKE '%$pesquisa%' ORDER BY status DESC, nome ASC";
        $consulta = mysqli_query($conecta, $sql_cliente);
        $contador_cliente = mysqli_num_rows($consulta);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="estilo_lista_cliente.css">

</head>
<body>

    <div class="container-c">

        <div class="container-cabecalho">
            <div class="titulo-lista-cliente">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/>
                </svg>
                <p>Clientes cadastrados</p>
            </div>
            <form name="consulta" methed="get" class="barra-pesquisa-clientes-cadastrados">
                <input type="search" name="pesquisa" placeholder="Digite sua pesquisa...">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                        <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                    </svg>
                </button>
            </form>
        </div>


        <div class="container-cadastrar">
            <a class="btn-cadastrar" href="cadastro_cliente.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                    <path d="M720-400v-120H600v-80h120v-120h80v120h120v80H800v120h-80Zm-360-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0-80Zm0 400Z"/>
                </svg>
                <p>Novo cliente</p>
            </a>

            <div class="quant-pesquisa-encontrada">

                <?php

                    if($contador_cliente == 1 && $pesquisa == "") {
                        echo "<p>Foi encontrado <b>'" . $contador_cliente . "'</b> registro na base de dados</p>";
                    }

                    if($contador_cliente > 1 && $pesquisa == "") {
                        echo "<p>Foi encontrado <b>'" . $contador_cliente . "'</b> registros na base de dados</p>";
                    }

                    if($contador_cliente == 1 && $pesquisa != "") {
                        echo '<p class="resultados_pesquisa_encontrada">
                                Foi encontrado <b>"' . $contador_cliente . '"</b> registro na base de dados com o termo <b>"' . $pesquisa . '"</b>
                                <a href="lista_cliente.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="red">
                                        <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                                    </svg>
                                </a>
                            </p>';
                    }

                    if($contador_cliente > 1 && $pesquisa != "") {
                        echo '<p class="resultados_pesquisa_encontrada">
                                Foi encontrado <b>"' . $contador_cliente . '"</b> registros na base de dados com o termo <b>"' . $pesquisa . '"</b>
                                <a href="lista_cliente.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="red">
                                        <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                                    </svg>
                                </a>
                            </p>';
                    }

                    if($contador_cliente < 1) {
                        echo '<p>Nenhum registro com o termo <b>"' . $pesquisa . '"</b> encontrado</p>';
                    }

                ?>

                
            </div>
        </div>


        <div class="container-lista">
            <table class="tabela-clientes">
                <tr class="cabecalho-tabela">
                    <td>
                        <div class="cabecalho-tabela-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M856-390 570-104q-12 12-27 18t-30 6q-15 0-30-6t-27-18L103-457q-11-11-17-25.5T80-513v-287q0-33 23.5-56.5T160-880h287q16 0 31 6.5t26 17.5l352 353q12 12 17.5 27t5.5 30q0 15-5.5 29.5T856-390ZM513-160l286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640Zm220 160Z"/>
                            </svg>
                            <p>ID</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M560-440h200v-80H560v80Zm0-120h200v-80H560v80ZM200-320h320v-22q0-45-44-71.5T360-440q-72 0-116 26.5T200-342v22Zm160-160q33 0 56.5-23.5T440-560q0-33-23.5-56.5T360-640q-33 0-56.5 23.5T280-560q0 33 23.5 56.5T360-480ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm0-80h640v-480H160v480Zm0 0v-480 480Z"/>
                            </svg>
                            <p>CPF</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/>
                            </svg>
                            <p>Nome</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/>
                            </svg>
                            <p>Telefone</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v58q0 59-40.5 100.5T740-280q-35 0-66-15t-52-43q-29 29-65.5 43.5T480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480v58q0 26 17 44t43 18q26 0 43-18t17-44v-58q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v80H480Zm0-280q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z"/>
                            </svg>
                            <p>E-mail</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/>
                            </svg>
                            <p>Ações</p>
                        </div>
                    </td>
                </tr>

                <?php

                while($exibe = mysqli_fetch_assoc($consulta)) { 

                    if($exibe['status'] == 1) { ?>

                        <tr class="dados-clientes">
                            <td class="dados-clientes-centro"> <?php echo $exibe['id_cliente']; ?> </td>
                            <td> <?php echo $exibe['cpf']; ?> </td>
                            <td> <?php echo $exibe['nome']; ?> </td>
                            <td> <?php echo $exibe['telefone']; ?> </td>
                            <td> <?php echo $exibe['email']; ?> </td>
                            <td>
                                <div class="dados-clientes-acao">
                                    <a href="edita_cliente.php?cliente=<?php echo $exibe['id_cliente']; ?>" class="btn-editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/>
                                        </svg>
                                    </a>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $exibe['id_cliente'];?>" class="btn-editar-senha">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                            <path d="M120-160v-112q0-34 17.5-62.5T184-378q62-31 126-46.5T440-440q20 0 40 1.5t40 4.5q-4 58 21 109.5t73 84.5v80H120ZM760-40l-60-60v-186q-44-13-72-49.5T600-420q0-58 41-99t99-41q58 0 99 41t41 99q0 45-25.5 80T790-290l50 50-60 60 60 60-80 80ZM440-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm300 80q17 0 28.5-11.5T780-440q0-17-11.5-28.5T740-480q-17 0-28.5 11.5T700-440q0 17 11.5 28.5T740-400Z"/>
                                        </svg>
                                    </a>

                                    <a href="deleta_cliente.php?cliente=<?php echo $exibe['id_cliente']; ?>" class="btn-deletar">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                                            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                        </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>

                    <?php
                    } else { ?>
                        <tr class="dados-clientes">
                            <td class="dados-clientes-centro dados-clientes-inativos"> <?php echo $exibe['id_cliente']; ?> </td>
                            <td class="dados-clientes-inativos"> <?php echo $exibe['cpf']; ?> </td>
                            <td class="dados-clientes-inativos"> <?php echo $exibe['nome']; ?> </td>
                            <td class="dados-clientes-inativos"> <?php echo $exibe['telefone']; ?> </td>
                            <td class="dados-clientes-inativos"> <?php echo $exibe['email']; ?> </td>
                            <td class="dados-clientes-inativos">
                                <div class="dados-clientes-acao">
                                    <a href="edita_cliente.php?cliente=<?php echo $exibe['id_cliente']; ?>" class="btn-editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/>
                                        </svg>
                                    </a>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $exibe['id_cliente'];?>" class="btn-editar-senha">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                            <path d="M120-160v-112q0-34 17.5-62.5T184-378q62-31 126-46.5T440-440q20 0 40 1.5t40 4.5q-4 58 21 109.5t73 84.5v80H120ZM760-40l-60-60v-186q-44-13-72-49.5T600-420q0-58 41-99t99-41q58 0 99 41t41 99q0 45-25.5 80T790-290l50 50-60 60 60 60-80 80ZM440-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm300 80q17 0 28.5-11.5T780-440q0-17-11.5-28.5T740-480q-17 0-28.5 11.5T700-440q0 17 11.5 28.5T740-400Z"/>
                                        </svg>
                                    </a>

                                    <a href="deleta_cliente.php?cliente=<?php echo $exibe['id_cliente']; ?>" class="btn-deletar">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                                            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                        </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>

                    <?php
                    } ?>

                    <!-- Modal para edição de Senha do Usuário -->

                    <div class="modal fade" id="exampleModal<?php echo $exibe['id_cliente'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar senha do usuário <?php echo $exibe['nome']; ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="altera_senha.php" name="alterar_senha">
                                    <div class="modal-body">
                                        
                                        <!-- Input oculto para passar o ID do usuário para edição da senha-->
                                        <input type="hidden" name="id_cliente" value="<?php echo $exibe['id_cliente']; ?>">

                                        <div class="form-floating mb-3">
                                            <input type="password" name="senha" class="form-control" placeholder="Digite a nova senha">
                                            <label for="floatingPassword">Digite a nova senha</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="confirmasenha" class="form-control" placeholder="Confirmar senha">
                                            <label for="floatingPassword">Confirmar senha</label>
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php
                } ?>

            </table>
        </div>

    </div>






</body>
</html>