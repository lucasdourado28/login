<?php
	$email=$_POST['email']; //peguei o email que o usuario digitou no index.php;
	$senha=$_POST['senha']; //peguei a senha que o usuario digitou no index.php;

	session_start();
	if(($email=="emaildoroot")&&($senha=="senharoot")){ /* aqui é o root, entra sem acessar o banco */
		$_SESSION['login']="root"; //sessao utilizada para verificar se possui acesso a pagina ou nao;

		header("Location: paginadestino.php");
	}
	else{
		//faz a conexao com o banco ao verificar que não é o root
		include "conexao.php"; //pagina que faz a conexão com o banco
		$sql= "SELECT * FROM tabela WHERE email='$email'"; //seleciona a coluna email do banco
		$contatos = $conec -> prepare($sql); //prepara os dados para conexão
		$contatos -> execute(); //executa a conexão com o banco
	
		foreach($contatos as $banco){	//passa os dados do banco 		
			$email_bd  = $banco['email'];//login do banco
			$senha_bd  = $banco['senha'];//senha do banco
			$perfil = $banco["perfil"]; //coluna perfil na sua tabela do banco no formato int
			
		}


		if(($email_bd == $email) && ($senha_bd == $senhaC)){ //compara o email e senha digitada pelo usuário

			if ($perfil == 0) { /* perfil 0 é o Admin*/
				$_SESSION['login'] = "usuario0";//sessao utilizada para verificar se possui acesso a pagina ou nao;
				header("Location: paginadestino.php");
			}

			else if($perfil == 1){ /* perfil 1 */
				$_SESSION['login']="usuario1";//sessao utilizada para verificar se possui acesso a pagina ou nao;
				header("Location: paginadestino.php");
			}	
			
		}
		else{//se o email ou senha nao existirem no banco
				$_SESSION['login'] = "login incorreto"; //sessao utilizada para verificar se usuario tentou logar mas digitou algum dados inexistente no banco;
				header("Location: index.php");
			}	
	}
?>
