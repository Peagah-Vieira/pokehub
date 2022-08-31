<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registerType1.css">
    <link href="node_modules/toastr/build/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="node_modules/toastr/toastr.js"></script>
    <link rel="icon" href="assets/img/pokebola.png" type="image/x-icon">
    <title>PokeHub - Register Page</title>
</head>

<body>
    <div class="container">
    <div class="form-image">
            <img src="assets/img/background-register.jpg" alt="">
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Welcome to the PokeHub</h1>
                    </div>
                </div>
                <div class="form-header">
                    <div class="sub-title">
                        <h2>Create Your Account</h2>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="username">Username</label>
                        <input id="username" type="text" name="username" placeholder="Type your Username" required>
                    </div>

                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Type your Email" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Type your Password" required>
                    </div>


                    <div class="input-box">
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Type your Password again" required>
                    </div>

                </div>

                <div class="continue-button">
                    <button><a href="#">Register</a></button>
                </div>
            </form>
        </div>
    </div>
<?php include('Assets/backend/b_register.php');?>
</body>

</html>