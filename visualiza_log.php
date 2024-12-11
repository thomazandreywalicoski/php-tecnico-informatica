<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo_lista_cliente.css">
    <link rel="stylesheet" href="estilo_lista_logs.css">
    <title>Lista de logs do sistema</title>
</head>
<body>
    
    <?php
        include('conecta.php');
        include('menu.php');
    ?>

    <div class="container-c">

        <div class="container-cabecalho">
            <div class="titulo-lista-cliente">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/>
                </svg>
                <p>Logs do sistema</p>
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
                    <path d="M400-240v-80h160v80H400ZM240-440v-80h480v80H240ZM120-640v-80h720v80H120Z"/>
                </svg>
                <p>Filtrar logs</p>
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


        <div class="container-lista-logs">
            <table class="tabela-lista-logs">
                <tr class="cabecalho-tabela-lista-logs">
                    <td>
                        <div class="cabecalho-tabela-lista-logs-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M680-80q-83 0-141.5-58.5T480-280q0-83 58.5-141.5T680-480q83 0 141.5 58.5T880-280q0 83-58.5 141.5T680-80Zm67-105 28-28-75-75v-112h-40v128l87 87Zm-547 65q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v250q-18-13-38-22t-42-16v-212h-80v120H280v-120h-80v560h212q7 22 16 42t22 38H200Zm280-640q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/>
                            </svg>
                            <p>Data/Hora</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-lista-logs-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M400-240v-80h160v80H400ZM240-440v-80h480v80H240ZM120-640v-80h720v80H120Z"/>
                            </svg>
                            <p>Tipo</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-lista-logs-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/>
                            </svg>
                            <p>Descrição</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-lista-logs-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-82q26-36 45-75t31-83H404q12 44 31 83t45 75Zm-104-16q-18-33-31.5-68.5T322-320H204q29 50 72.5 87t99.5 55Zm208 0q56-18 99.5-55t72.5-87H638q-9 38-22.5 73.5T584-178ZM170-400h136q-3-20-4.5-39.5T300-480q0-21 1.5-40.5T306-560H170q-5 20-7.5 39.5T160-480q0 21 2.5 40.5T170-400Zm216 0h188q3-20 4.5-39.5T580-480q0-21-1.5-40.5T574-560H386q-3 20-4.5 39.5T380-480q0 21 1.5 40.5T386-400Zm268 0h136q5-20 7.5-39.5T800-480q0-21-2.5-40.5T790-560H654q3 20 4.5 39.5T660-480q0 21-1.5 40.5T654-400Zm-16-240h118q-29-50-72.5-87T584-782q18 33 31.5 68.5T638-640Zm-234 0h152q-12-44-31-83t-45-75q-26 36-45 75t-31 83Zm-200 0h118q9-38 22.5-73.5T376-782q-56 18-99.5 55T204-640Z"/>
                            </svg>
                            <p>IP/Host</p>
                        </div>
                    </td>
                    <td>
                        <div class="cabecalho-tabela-lista-logs-dado">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/>
                            </svg>
                            <p>Usuário</p>
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