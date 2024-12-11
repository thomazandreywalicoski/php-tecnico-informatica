<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Cadastrar Cliente</title>
    <style>
        .container {
            max-width: 1024px !important;
        }

        .titulo-cadastro {
            margin-top: 20px;
        }
    
    </style>
</head>
<body>

    <?php

        include('menu.php');

    ?>

    <div class="container">
        <h3 class="titulo-cadastro">Novo cliente</h3>
        <hr>

        <form name="cadastro" method="post" action="grava_cliente.php">
            <div class="row">
                <h5>Dados Pessoais</h5>
                <div class="col-sm-4">
                    <small>* CPF</small>
                    <input required class="form-control" type="text" name="cpf" placeholder="Informe o CPF" maxlength="14" onKeyPress="formatar('###.###.###-##', this)" oninput="this.value = this.value.replace(/[^0-9.\-]/g, '');" autocomplete="off">
                </div>
                <div class="col-sm-8">
                    <small>* Nome completo</small>
                    <input class="form-control" type="text" name="nome" placeholder="Informe o nome completo" autocomplete="off"> 
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <small>* CEP</small>
                    <input class="form-control" type="text" name="cep" placeholder="Informe o CEP" maxlength="10" onKeyPress="formatar('##.###-###', this)" oninput="this.value = this.value.replace(/[^0-9.\-]/g, '');" autocomplete="off">
                </div>

                <div class="col-sm-5">
                    <small>* Endereço</small>
                    <input class="form-control" type="text" name="endereco" placeholder="Informe seu endereço" autocomplete="off">
                </div>

                <div class="col-sm-1">
                    <small>N°</small>
                    <input class="form-control" type="text" name="numero" autocomplete="off">
                </div> 
                
                <div class="col-sm-4">
                    <small>Complemento</small>
                    <input class="form-control" type="text" name="complemento" placeholder="Complemento" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <small>* Bairro</small>
                    <input class="form-control" type="text" name="bairro" placeholder="Informe seu bairro" autocomplete="off">
                </div>

                <div class="col-sm-4">
                    <small>* Cidade</small>
                    <input class="form-control" type="text" name="cidade" placeholder="Informe sua cidade" autocomplete="off">
                </div>

                <div class="col-sm-4">
                    <small>* Estado</small>
                    <select name="uf" id="estado" class="form-select">
                        <option selected>Selecione um estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div> 
            </div>

            <hr>

            <div class="row">
                <h5>Contato</h5>
                <div class="col-sm-6">
                    <small>* Telefone</small>
                    <input class="form-control" type="text" name="telefone" placeholder="Informe seu telefone" autocomplete="off">
                </div>

                <div class="col-sm-6">
                    <small>* E-mail</small>
                    <input class="form-control" type="email" name="email" placeholder="Informe seu e-mail" autocomplete="off">
                </div>
            </div>

            <hr>

            <div class="row">
                <h5>Acesso</h5>
                <div class="col-sm-6">
                    <small>Senha</small>
                    <input class="form-control" type="password" name="senha" placeholder="Digite sua senha">
                </div>
                <div class="col-sm-6">
                    <small>Confirmar senha</small>
                    <input class="form-control" type="password" name="confirma_senha" placeholder="Confirmar senha">
                </div>
            </div>


            <br>
            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" value="Cadastrar" class="btn btn-success" onclick="return validar()"> &nbsp;
                    <input type="reset" value="Limpar" class="btn btn-danger">
                </div>
            </div>

        </form>

    </div> <!-- .container -->

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
        var nome = cadastro.nome.value;
        var cep = cadastro.cep.value;
        var uf = cadastro.uf.value;
        var senha = cadastro.senha.value;
        var confirmaSenha = cadastro.confirma_senha.value;

        if(nome.length < 7) {
            alert("Preencha o nome completo!");
            cadastro.nome.focus();
            return false;
        }

        if(cep == "") {
            alert("Preencha o CEP do endereço!");
            cadastro.cep.focus();
            return false;
        }

        if(cep.length < 10) {
            alert("Preencha o CEP completodo endereço!");
            cadastro.cep.focus();
            return false;
        }

        if(uf == "Selecione um estado") {
            alert("Selecione seu estado!");
            cadastro.uf.focus();
            return false;
        }

        if(senha.length < 8) {
            alert("A senha ter no mínimo 8 caractéres")
            cadastro.senha.focus();
            return false;
        }

        if(senha != confirmaSenha) {
            alert("As senhas estão diferentes, por favor verifique!")
            cadastro.senha.value = "";
            cadastro.confirma_senha.value = "";
            cadastro.senha.focus();
            return false;
        }
        
    }
</script>

</body>
</html>