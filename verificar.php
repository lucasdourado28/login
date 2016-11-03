<?php
	$email=$_POST['email'];
	$senha=$_POST['senha'];

	session_start();
	if(($email=="emaildoroot")&&($senha=="senharoot")){ /* aqui é o root, entra sem acessar o banco */
		$_SESSION['login']="adm";
		$_SESSION['nome']="Administrador";
		/*echo "Voce logou como ADMINISTRADOR";
		echo "Variavel recebeu: ".$_SESSION['login'];*/


		header("Location: paginadestino.php");
	}
	else{
		//faz a conexao com o banco ao verificar que não é o root
		include "conexao.php";
		$sql= "SELECT * FROM tabela WHERE email='$email'"; 
		$contatos = $fusca -> prepare($sql);
		$contatos -> execute();
	
		foreach($contatos as $bolacha){			
			$email_bd  = $bolacha['email'];
			$senha_bd  = $bolacha['senha'];
			$nome_bd  = $bolacha['nome'];
			$perfil = $bolacha["perfil"];
			//echo "perfil = ".$perfil;
		}


		if(($email_bd == $email) && ($senha_bd == $senhaC)){	

			$_SESSION['login']="func";
			$_SESSION['nome']="funcionário";

			if ($perfil == 0) { /* perfil 0 é o Admin*/
				$_SESSION['login'] = "adm";
				$_SESSION['nome'] = $nome_bd;
				header("Location: ../telaPrincipal.php");
			}

			else if($perfil == 1){ /* perfil 1 é o funcionário */
				$_SESSION['login']="funcionario";
				$_SESSION['nome'] = $nome_bd;
				// echo "			Voce logou como: FUNCIONÁRIO";
				// echo "Variavel recebeu: ".$_SESSION['login'];
				header("Location: ../telaPrincipal.php");
			}	
			
		}
		else{
				$_SESSION['login'] = "Login incorreto";
				header("Location: index.php");
			}	
	}
?>
