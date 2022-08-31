<?php
    if(isset($_POST['username'],$_POST['password'])){
            try{
                $conn = new PDO('mysql:host=localhost;dbname=pokehub', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                $error_message = $e->getMessage();
                echo $error_message;
            }
    }