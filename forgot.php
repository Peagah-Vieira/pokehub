<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/forgotType1.css">
    <link href="node_modules/toastr/build/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="node_modules/toastr/toastr.js"></script>
    <link rel="icon" href="assets/img/pokebola.png" type="image/x-icon">
    <title>PokeHub - Forgot Password</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/background-login.jpg" alt="">
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
                        <h2>Forgot your password?</h2>
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

                </div>

                <div class="continue-button">
                    <button><a>Reset Password</a></button>
                </div>
            </form>
        </div>
    </div>
<?php include('Assets/backend/b_forgot.php');?>
</body>

</html>