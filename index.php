<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">
     <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<title>Oficina</title>
	
</head>
<body>
	<div class="pagina" align="center">
		<form action="php/verificar.php" method="POST">
			<div class="login">
				<fieldset style="border: none;">
					<img src="img/logo.png" style="width: 80%; height: 50%;"><br>
					<div id="aviso">
						<?php 

							session_start();
							@$login = $_SESSION['login'];
							 if ($login == "Login incorreto") {
						
							 	echo "<div class='notification error'>
		 						<img src='img/erro.png' style='height: 15px; width: 15px;'>&nbspUsuário e/ou senha inválido. Tente novamente.
									</div>";
							 	$_SESSION['login'] = "";
							 }
							 elseif($login == "expirou"){

							 	echo "<script> alert('Você foi desconectado por inatividade!');</script>";
							 	$_SESSION['login'] = "";	

							 }
							 else{

							 	$_SESSION['login'] = "";	
							 }
						?>
					</div>
					<h3>Efetue o login:</h3>
					Email: <input type="email" name="email" autofocus required class="inputtext" alt="Digite seu Emaill" placeholder="Digite o email"><br><br>
					Senha: <input type="password" name="senha" required minlength="7" class="inputtext" alt="Digite sua Senha" placeholder="Digite a senha"><br><br>
					<input type="submit" name="logar" class="btnlogar">
				</fieldset>
			</div>
		</form>
	</div>			
</body>
</html>