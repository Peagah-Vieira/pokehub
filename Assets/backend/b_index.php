<?php
session_start();
	try{
		$conn = new PDO('mysql:host=localhost;dbname=pokehub', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stm = $conn->query("SELECT username FROM user_register WHERE username='$_SESSION[username]'");
		$db_username = $stm->fetch(PDO::FETCH_ASSOC);

		$stm = $conn->query("SELECT num FROM pokemons");
		$number = $stm->fetch(PDO::FETCH_ASSOC);

		if($db_username['username'] == $_SESSION['username']){
			echo "<script>console.log('Logado com Sucesso');</script>";
		}
		else{
			echo "Não foi encontrado nenhum Json com este Username";
		}
	}
	catch(PDOException $e){
		$error_message = $e->getMessage();
		echo $error_message;
	}