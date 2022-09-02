<?php
session_start();
    if(isset($_POST['username'],$_POST['password'])){
            try{
                $conn = new PDO('mysql:host=localhost;dbname=pokehub', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $username = $_POST['username'];  
                $password = $_POST['password']; 

                $stm = $conn->query("SELECT username FROM user_register WHERE username='$username' and password='$password'");
                $stmt = $conn->query("SELECT password FROM user_register WHERE username='$username' and password='$password'");

                $db_username = $stm->fetch(PDO::FETCH_ASSOC);
                $db_password = $stmt->fetch(PDO::FETCH_ASSOC);

                if(strlen("$password") < 7){
                    echo "<script type='text/javascript'>toastr.warning('Senha não pode ser menor do que <b>7</b> dígitos!', 'Situation', {
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
                else if(isset($db_username['username']) == "$username" && isset($db_password['password']) == "$password"){
                    $stm = $conn-> prepare('INSERT INTO user_login(username,password) VALUES (:username,:password)');
                    $stm->bindParam('username', $username);
                    $stm->bindParam('password', $password);
                    $stm->execute();
                    $_SESSION['username'] = $username;
                    header("Refresh: 5;url=index.php");
                    echo "<script type='text/javascript'>toastr.success('Login successful, redirecting in <b>5 seconds</b>', 'Situation', {
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
                else if($_SESSION['count'] > 5){
                    echo "<script type='text/javascript'>toastr.warning('Suas tentativas acabaram, você será bloqueado!', 'Situação', {
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
                    if(!isset($_SESSION['start'])){
                        $initial = new DateTime();
                        $_SESSION['start'] = $initial;
                        $_SESSION['end'] = $initial->add(new DateInterval('PT30S'));
                    }
                    else{
                        $now = new DateTime();
                        if($_SESSION['end'] <= $now){
                            $_SESSION['count'] = 0;
                            unset($_SESSION['start']);
                            unset($_SESSION['end']);
                        }
                    }
                }
                else if(isset($db_username['username']) !== "$username" or isset($db_password['password']) !== "$password"){
                    echo "<script type='text/javascript'>toastr.error('Username or Password <b>incorrect</b>!', 'Situation', {
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
                    $_SESSION['count'] ++;
                }
            }
            catch(PDOException $e){
                $error_message = $e->getMessage();
                echo $error_message;
            }
    }
?>