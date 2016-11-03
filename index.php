<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Tela login</title>
	
</head>
<body>
	<form action="verificar.php" method="POST"> <!--enviando os dados digitados por meio de POST-->
		<?php //abro o php para verificar se 
			session_start(); //inicio a sessão
			@$login = $_SESSION['login']; //pego a session login para verificar o perfil;
			if ($login == "Login incorreto") { //verifica se a sessao login recebeu "login incorreto";

				echo "Usuário e/ou senha inválido. Tente novamente"; //emite mensagem de login incorreto;
				$_SESSION['login'] = ""; //esvazia sessao login para quando atualizar a pagina, a mensagem desaparecer;
			}
			else{
				$_SESSION['login'] = ""; //se login nao for incorreto, apenas esvazia sessao login para nao exibir mensagem de erro; 	
			 }
		?>
		<h3>Efetue o login:</h3>
		Email: <input type="email" name="email" autofocus required class="inputtext" alt="Digite seu Emaill" placeholder="Digite o email"><br><br> <!--campo email-->
		Senha: <input type="password" name="senha" required minlength="7" class="inputtext" alt="Digite sua Senha" placeholder="Digite a senha"><br><br><!--campo senha-->
		<input type="submit" name="logar" class="btnlogar">
	</form>		
</body>
</html>
