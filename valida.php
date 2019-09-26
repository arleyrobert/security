<?php
	session_start();
	include_once("conexao/conexao.php");
	//Verifica se os campos possuem dados 
	if((isset($_POST['txt_usuario'])) && (isset($_POST['txt_senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['txt_usuario']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['txt_senha']);
		$senha = md5($senha);
		
		$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
			$data = date("Y-m-d H:i:s");
			$validade = date("Y-m-d H:i:s",strtotime($resultado["validade"]));
			
		
		
		//Encontrando um usuário na tabela usuario com os mesmos dados digitado pelo usuario
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			
		
			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: adm/administrativo.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				header("Location: colaborador.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){
				header("Location: entrar.php?id=".$resultado['id']."");
			}
		}else{
			$_SESSION['loginErro'] = "Usuário ou senha inválido";
			header("Location: index.php");
		}
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: index.php");
	}
	
?>