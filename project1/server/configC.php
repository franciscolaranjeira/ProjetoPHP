<?php
	$server = "localhost"; 												
	$utilizador = "root";												
	$pass = "";															
	$bd = "project"; 										
	 			
	$connect = mysqli_connect($server,$utilizador,$pass,$bd);
	mysqli_set_charset($connect,"utf8");
	
	if(!$connect){
		die("A ligaçao falhou: " . mysqli_connect_error());}
	//echo "Ligação efectuada com sucesso á base de dados " . $bd;
		//com ligação a base de dados
?>