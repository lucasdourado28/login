<?php
	$email=$_POST['email'];
	$senha=$_POST['senha'];

	session_start();
	if(($email=="luvithi@autoescola.com")&&($senha=="luvithi")){ /* aqui é o root, o tal do superadmin que entra sem acessar o banco */
		$_SESSION['login']="adm";
		$_SESSION['nome']="Administrador";
		/*echo "Voce logou como ADMINISTRADOR";
		echo "Variavel recebeu: ".$_SESSION['login'];*/

		// seta configurações fusuhorario e tempo limite de inatividade//
		date_default_timezone_set("Brazil/East");
		$tempolimite = 3;
		//fim das configurações de fuso horario e limite de inatividade//

		// aqui ta o seu script de autenticação no momento em que ele for validado você seta as configurações abaixo.//
		// seta as configurações de tempo permitido para inatividade//
		 $_SESSION['registro'] = time(); // armazena o momento em que autenticado //
		 $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade //
		// fim das configurações de tempo inativo//



		header("Location: ../menu.php");
	}
	elseif(($email == "func@teste.com") && ($senha=="luvithi")) {
		$_SESSION['login']="func";
		$_SESSION['nome']="funcionário";

		// seta configurações fusuhorario e tempo limite de inatividade//
		date_default_timezone_set("Brazil/East");
		$tempolimite = 5;
		//fim das configurações de fuso horario e limite de inatividade//

		// aqui ta o seu script de autenticação no momento em que ele for validado você seta as configurações abaixo.//
		// seta as configurações de tempo permitido para inatividade//
		 $_SESSION['registro'] = time(); // armazena o momento em que autenticado //
		 $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade //
		// fim das configurações de tempo inativo//


		header("Location: ../menu.php");
	}
	else{

		$senhaC = md5($senha);

		include "conexao.php";
		$sql= "SELECT * FROM usuarios_tb WHERE email='$email'";
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

			// seta configurações fusuhorario e tempo limite de inatividade//
			date_default_timezone_set("Brazil/East");
			$tempolimite = 5;
			//fim das configurações de fuso horario e limite de inatividade//

			// aqui ta o seu script de autenticação no momento em que ele for validado você seta as configurações abaixo.//
			// seta as configurações de tempo permitido para inatividade//
			 $_SESSION['registro'] = time(); // armazena o momento em que autenticado //
			 $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade //
			// fim das configurações de tempo inativo//	
			
			

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