<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Editar Cliente</title>
    <style>
        .container {
            max-width: 1024px !important;
        }

        .img-perfil {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .perfil-editar {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 5px;
        }

        .editar-foto {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin: 0px;
            text-decoration: none;
        }

        .texto-editar {
            margin: 0px;
        }

        .formulario-editar-foto {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 5px;
        }

        .selecionar-img-editar-foto {
            width: 100%;
        }
    
    </style>
</head>
<body>

    <?php

        include('menu.php');
        include('conecta.php');

        // Recebendo o ID do cliente via URL

        $id_cliente = $_REQUEST['cliente'];

        $sql_cliente =  "SELECT * FROM cliente_thomaz WHERE id_cliente = $id_cliente";
        $consulta_cliente = mysqli_query($conecta, $sql_cliente);

        while($exibe_cliente = mysqli_fetch_assoc($consulta_cliente)) {

    ?>

    <div class="container p-4">
       
        <form name="edita" method="post" action="atualiza_cliente.php">
            <div class="row">
                <h5>Dados Pessoais</h5>
                
                <div class="col-sm-4">
                    <small>* CPF</small>
                    <input required class="form-control" type="text" name="cpf" placeholder="Informe o CPF" maxlength="14" onKeyPress="formatar('###.###.###-##', this)" oninput="this.value = this.value.replace(/[^0-9.\-]/g, '');" autocomplete="off" value="<?php echo $exibe_cliente['cpf'];?>">
                </div>
                <div class="col-sm-6">
                    <small>* Nome completo</small>
                    <input class="form-control" type="text" name="nome" placeholder="Informe o nome completo" autocomplete="off" value="<?php echo $exibe_cliente['nome'];?>"> 
                </div>
                <div class="col-sm-2">
                    <div class="perfil-editar">
                        <img class="rounded-circle img-perfil" src="img/img3x4/<?php echo $exibe_cliente["foto"]; ?>" widht="50px" alt="Foto">
                        <a href="#" class="editar-foto" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ccc"><path d="M440-440ZM120-120q-33 0-56.5-23.5T40-200v-480q0-33 23.5-56.5T120-760h126l74-80h240v80H355l-73 80H120v480h640v-360h80v360q0 33-23.5 56.5T760-120H120Zm640-560v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80ZM440-260q75 0 127.5-52.5T620-440q0-75-52.5-127.5T440-620q-75 0-127.5 52.5T260-440q0 75 52.5 127.5T440-260Zm0-80q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Z"/>
                            </svg>
                            <p class="texto-editar">Editar foto</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <small>* CEP</small>
                    <input class="form-control" type="text" name="cep" placeholder="Informe o CEP" maxlength="10" onKeyPress="formatar('##.###-###', this)" oninput="this.value = this.value.replace(/[^0-9.\-]/g, '');" autocomplete="off" value="<?php echo $exibe_cliente['cep'];?>">
                </div>

                <div class="col-sm-5">
                    <small>* Endereço</small>
                    <input class="form-control" type="text" name="endereco" placeholder="Informe seu endereço" autocomplete="off" value="<?php echo $exibe_cliente['endereco'];?>">
                </div>

                <div class="col-sm-1">
                    <small>N°</small>
                    <input class="form-control" type="text" name="numero" autocomplete="off" value="<?php echo $exibe_cliente['numero'];?>">
                </div> 
                
                <div class="col-sm-4">
                    <small>Complemento</small>
                    <input class="form-control" type="text" name="complemento" placeholder="Complemento" autocomplete="off" value="<?php echo $exibe_cliente['complemento'];?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <small>* Bairro</small>
                    <input class="form-control" type="text" name="bairro" placeholder="Informe seu bairro" autocomplete="off" value="<?php echo $exibe_cliente['bairro'];?>">
                </div>

                <div class="col-sm-4">
                    <small>* Cidade</small>
                    <input class="form-control" type="text" name="cidade" placeholder="Informe sua cidade" autocomplete="off" value="<?php echo $exibe_cliente['cidade'];?>">
                </div>

                <div class="col-sm-4">
                    <small>* Estado</small>
                    <select name="uf" id="estado" class="form-select">
                        <option selected>Selecione um estado</option>
                        <option value="AC" <?php if($exibe_cliente['uf'] == "AC") { echo "selected" ;} ?>>Acre</option>
                        <option value="AL" <?php if($exibe_cliente['uf'] == "AL") { echo "selected" ;} ?>>Alagoas</option>
                        <option value="AP" <?php if($exibe_cliente['uf'] == "AP") { echo "selected" ;} ?>>Amapá</option>
                        <option value="AM" <?php if($exibe_cliente['uf'] == "AM") { echo "selected" ;} ?>>Amazonas</option>
                        <option value="BA" <?php if($exibe_cliente['uf'] == "BA") { echo "selected" ;} ?>>Bahia</option>
                        <option value="CE" <?php if($exibe_cliente['uf'] == "CE") { echo "selected" ;} ?>>Ceará</option>
                        <option value="DF" <?php if($exibe_cliente['uf'] == "DF") { echo "selected" ;} ?>>Distrito Federal</option>
                        <option value="ES" <?php if($exibe_cliente['uf'] == "ES") { echo "selected" ;} ?>>Espírito Santo</option>
                        <option value="GO" <?php if($exibe_cliente['uf'] == "GO") { echo "selected" ;} ?>>Goiás</option>
                        <option value="MA" <?php if($exibe_cliente['uf'] == "MA") { echo "selected" ;} ?>>Maranhão</option>
                        <option value="MT" <?php if($exibe_cliente['uf'] == "MT") { echo "selected" ;} ?>>Mato Grosso</option>
                        <option value="MS" <?php if($exibe_cliente['uf'] == "MS") { echo "selected" ;} ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php if($exibe_cliente['uf'] == "MG") { echo "selected" ;} ?>>Minas Gerais</option>
                        <option value="PA" <?php if($exibe_cliente['uf'] == "PA") { echo "selected" ;} ?>>Pará</option>
                        <option value="PB" <?php if($exibe_cliente['uf'] == "PB") { echo "selected" ;} ?>>Paraíba</option>
                        <option value="PR" <?php if($exibe_cliente['uf'] == "PR") { echo "selected" ;} ?>>Paraná</option>
                        <option value="PE" <?php if($exibe_cliente['uf'] == "PE") { echo "selected" ;} ?>>Pernambuco</option>
                        <option value="PI" <?php if($exibe_cliente['uf'] == "PI") { echo "selected" ;} ?>>Piauí</option>
                        <option value="RJ" <?php if($exibe_cliente['uf'] == "RJ") { echo "selected" ;} ?>>Rio de Janeiro</option>
                        <option value="RN" <?php if($exibe_cliente['uf'] == "RN") { echo "selected" ;} ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php if($exibe_cliente['uf'] == "RS") { echo "selected" ;} ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php if($exibe_cliente['uf'] == "RO") { echo "selected" ;} ?>>Rondônia</option>
                        <option value="RR" <?php if($exibe_cliente['uf'] == "RR") { echo "selected" ;} ?>>Roraima</option>
                        <option value="SC" <?php if($exibe_cliente['uf'] == "SC") { echo "selected" ;} ?>>Santa Catarina</option>
                        <option value="SP" <?php if($exibe_cliente['uf'] == "SP") { echo "selected" ;} ?>>São Paulo</option>
                        <option value="SE" <?php if($exibe_cliente['uf'] == "SE") { echo "selected" ;} ?>>Sergipe</option>
                        <option value="TO" <?php if($exibe_cliente['uf'] == "TO") { echo "selected" ;} ?>>Tocantins</option>
                    </select>
                </div> 
            </div>

            <hr>

            <div class="row">
                <h5>Contato</h5>
                <div class="col-sm-4">
                    <small>* Telefone</small>
                    <input class="form-control" type="text" name="telefone" placeholder="Informe seu telefone" autocomplete="off" value="<?php echo $exibe_cliente['telefone'];?>">
                </div>

                <div class="col-sm-5">
                    <small>* E-mail</small>
                    <input class="form-control" type="email" name="email" placeholder="Informe seu e-mail" autocomplete="off" value="<?php echo $exibe_cliente['email'];?>">
                </div>

                <div class="col-sm-3">
                    <small>Status</small>
                    <div class="d-flex gap-2 align-items-center mt-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1" <?php if($exibe_cliente['status'] == 1) { echo 'checked'; } ?>>
                            <label class="form-check-label" for="flexRadioDefault1">Ativo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2" <?php if($exibe_cliente['status'] == 0) { echo 'checked'; } ?>>
                            <label class="form-check-label" for="flexRadioDefault2">Inativo</label>
                        </div>
                    </div>

                    <!-- Campo oculto para passar o ID -->

                    <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">

                </div>

            </div>

            <br>

            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" value="Atualizar" class="btn btn-success" onclick="return validar()"> &nbsp;
                    <input type="reset" value="Limpar" class="btn btn-danger">
                </div>
            </div>

        </form>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 300px;">
                <div class="modal-content" style=" background-color: #00BAF0;">
                    <div class="modal-header border-0 p-0 px-3">
                        <button type="button" class="btn-close mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center flex-column gap-1 px-3 pb-3 p-0">
                        
                        <form action="atualiza_foto.php" method="POST" enctype="multipart/form-data" class="formulario-editar-foto">
                            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
                            <p class="selecionar-img-editar-foto">Selecionar imagem:</p>
                            <input type="file" class="form-control" name="arquivo" accept=".jpg, .png, .jpeg">
                            <button type="submit" class="btn btn-success btn-sm mt-4">Salvar</button>
                        </form>

                    </div> 
            
                </div>
            </div>
        </div>

    </div> <!-- .container -->

    <?php
        }
    ?>

<script>
    function formatar(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(i)

        if(texto.substring(0,1) != saida) {
            documento.value += texto.substring(0,1);
        }
    }

    function validar() {
        var nome = edita.nome.value;
        var cep = edita.cep.value;
        var uf = edita.uf.value;
        var senha = edita.senha.value;
        var confirmaSenha = edita.confirma_senha.value;

        if(nome.length < 7) {
            alert("Preencha o nome completo!");
            edita.nome.focus();
            return false;
        }

        if(cep == "") {
            alert("Preencha o CEP do endereço!");
            edita.cep.focus();
            return false;
        }

        if(cep.length < 10) {
            alert("Preencha o CEP completodo endereço!");
            edita.cep.focus();
            return false;
        }

        if(uf == "Selecione um estado") {
            alert("Selecione seu estado!");
            edita.uf.focus();
            return false;
        }

        if(senha.length < 8) {
            alert("A senha ter no mínimo 8 caractéres")
            edita.senha.focus();
            return false;
        }

        if(senha != confirmaSenha) {
            alert("As senhas estão diferentes, por favor verifique!")
            edita.senha.value = "";
            edita.confirma_senha.value = "";
            edita.senha.focus();
            return false;
        }
        
    }
</script>

</body>
</html>