<?php
	require("conecta.php");

    // Recebe o código do produto, para concatenar no nome da foto a ser enviada
		$id_cliente	= $_POST["id_cliente"];

    // Removendo foto antiga do diretório

    $sql_consulta_img = "SELECT * FROM cliente_thomaz WHERE id_cliente = $id_cliente";
    $consulta_img = mysqli_query($conecta, $sql_consulta_img);
    $cont_img = mysqli_num_rows($consulta_img);

    if($cont_img >= 1) {
        
        // Consulta o nome da imagem atual do cadastro

        while($pesq_img = mysqli_fetch_array($consulta_img)) {
            $nome_img_exc = $pesq_img['foto'];
        }

        //  Removendo o arquivo localizado dentro do diretório de imagens

        $filename = "img/img3x4/$nome_img_exc";

        if(unlink($filename)) {
            echo "Arquivo removido com sucesso!";
        } else {
            echo "Impossível remover o arquivo!";
        }
    }

	// Pasta onde a arquivo vai ser salvo
	$_UP['pasta'] = 'img/img3x4/';
	 
	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
	 
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');
	 
	// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
	$_UP['renomeia'] = false;

	// Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	 
	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	if ($_FILES['arquivo']['error'] != 0) {
		die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
		exit; // Para a execução do script
	}
	 
	// Faz a verificação da extensão do arquivo
	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if (array_search($extensao, $_UP['extensoes']) === false) {
		echo "Por favor, envie arquivos com as seguintes extensões: jpg, jpeg, png ou gif";
	}
	 
	// Faz a verificação do tamanho do arquivo
	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
		echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
	}
 
	// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	else 
	{
		// Primeiro verifica se deve trocar o nome do arquivo
		if ($_UP['renomeia'] == true) {
			// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			$nome_final = time().'.jpg';
		} 
		else 
		{
			// Mantém o nome original do arquivo
			$nome_final = $_FILES['arquivo']['name'];
		}
	 
		// Depois verifica se é possível mover o arquivo para a pasta escolhida
	   if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].date('Ymd_His')."_".$id_cliente."_".$nome_final)) 
		{
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			echo "Upload efetuado com sucesso!";
			$nome_concatenado = date('Ymd_His')."_".$id_cliente."_".$nome_final;
			
			//echo '<br /><a href="' . $nome_concatenado. '">Clique aqui para acessar o arquivo</a>';
		}
		else
		{
			// Não foi possível fazer o upload, provavelmente a pasta está incorreta
			echo "Não foi possível enviar o arquivo, tente novamente";
		}
	}
	
	// Recebe o nome do arquivo concatenado para ser gravado no BD
	$foto	= $nome_concatenado;

	echo "<br>Nome do arquivo: ".$foto."<br>";
	echo "<br>Nome final: ".$nome_concatenado."<br>";

	$sqlinsert = ("UPDATE cliente_thomaz set foto='".$foto."' WHERE id_cliente='".$id_cliente."';");

	mysqli_query($conecta, $sqlinsert) or die ("Não foi possível realizar alterações!");

	header("LOCATION:principal.php");
?>