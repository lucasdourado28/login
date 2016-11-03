<?php 

	try{
		$conec= new PDO("mysql:host=hospedagem; dbname= meubanco","login", "senha");
		//echo "Conexao efetuada";
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}



 ?>
