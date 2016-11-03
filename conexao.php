<?php 

	try{
		$fusca= new PDO("mysql:host=localhost; dbname=autoescola_bd","root");
		//echo "Conexao efetuada";
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}



 ?>