<?php
$username = 0;
$email = 0;
$password = 0;
$confirmPassword = 0;
    if(isset($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirmPassword'])){
        try{
            $conn = new PDO('mysql:host=localhost;dbname=pokehub', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_STRING);
            $confirmPassword = filter_input(INPUT_POST,"confirmPassword", FILTER_SANITIZE_STRING);

            $stm = $conn->query("SELECT email FROM user_register WHERE email='$email'");
            $db_email = $stm->fetch(PDO::FETCH_ASSOC);

            if(!$username || !$email || !$password || !$confirmPassword){
                echo "<script type='text/javascript'>toastr.warning('Dados Inválidos!', 'Situação', {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-left',
                    'preventDuplicates': false,
                    'onclick': null,
                    'showDuration': '300',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut'
                });</script>"; 
            }
            else if(strlen("$password") < 7){
                echo "<script type='text/javascript'>toastr.warning('Senha não pode ser menor do que <b>7</b> dígitos!', 'Situação', {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-left',
                    'preventDuplicates': false,
                    'onclick': null,
                    'showDuration': '300',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut'
                });</script>"; 
            }
            else if($password !== $confirmPassword){ 
                echo "<script type='text/javascript'>toastr.warning('Senhas diferentes!', 'Situação', {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-left',
                    'preventDuplicates': false,
                    'onclick': null,
                    'showDuration': '300',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut'
                });</script>"; 
            }
            else if($email == isset($db_email['email'])){
                echo "<script type='text/javascript'>toastr.warning('E-mail já registrado!', 'Situação', {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-left',
                    'preventDuplicates': false,
                    'onclick': null,
                    'showDuration': '300',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut'
                });</script>";
            }
            else{  
                $stm = $conn-> prepare('INSERT INTO user_register(username,email,password) VALUES (:username,:email,:password)'); 
                $stm->bindParam('username', $username);
                $stm->bindParam('email', $email);
                $stm->bindParam('password', $password);
                $stm->execute();
                header("Refresh: 5;url=login.php");
                echo "<script type='text/javascript'>toastr.success('Dados Cadastrados, você será redirecionado em 5 segundos!', 'Situação', {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': true,
                    'positionClass': 'toast-bottom-left',
                    'preventDuplicates': false,
                    'onclick': null,
                    'showDuration': '300',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut'
                });</script>";
            }
            
        }
        catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }    
    }