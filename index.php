<?php 
include_once('assets/backend/b_index.php');
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="assets/plugins/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/themify-icons/themify-icons.css">
	<link rel="icon" href="assets/img/pokebola.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" media="screen" />
		<title>PokeHub - Index Page</title>
</head>

<body>
	<header class="banner overlay bg-cover" data-background="assets/img/background.png">
		<nav class="navbar navbar-expand-md navbar-dark">
			<div class="container">
				<a class="navbar-brand px-2" href="index.php">PokeHub</a>
				<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation"
					aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navigation">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link text-dark" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="register.php">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="forgot.php">Forgot</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="login.php">Account</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container section">
			<div class="row">
				<div class="col-lg-8 text-center mx-auto">
					<h1 class="text-white mb-3">Welcome to the PokeHub</h1>
					<p class="text-white mb-4">Pokemon Register &amp; Pokemon Index</p>
					<div class="position-relative">
						<input type="search" id="search" class="form-control" placeholder="Type your pokemon Here" value=""><a><i
							class="ti-search search-icon"></i></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<h2 class="section-title">Pokemon List</h2>
				</div>
			</div>
			<?php
				if(count($pokemons->pokemon)) {
				$i = 0;
				foreach($pokemons->pokemon as $Pokemon) {
				$i++;
			?>
			<?php if($i % 3 == 1) { ?>
			<div class="row">
			<?php } ?>
			<div class="row">
				<div class="col-md-8 mr-3 mt-3">
					<div class="card text-center pt-3" style="width: 22rem;">
						<img src="<?=$Pokemon->img?>" class="mx-auto d-block" alt="<?=$Pokemon->name?>">
						<div class="card-body px-3">
							<h5 class="card-title"><?=$Pokemon->name?></h5>
							<p>
								<?php
									if (empty($Pokemon->next_evolution)) {
										echo "Não possui próximas evoluções ";
									}
									else {
										echo "Próximas evoluções: ";
										foreach($Pokemon->next_evolution as $ProximaEvolucao) {
											echo $ProximaEvolucao->name . " ";
										}
									}  
								?>
							</p>
						</div>
					</div>
				</div>
		</div>
		<?php if($i % 3 == 0) { ?>
      </div>
      <?php } } } else { ?>
        <strong>Nenhum pokemón retornado pela API</strong>
      <?php } ?>
	</section>
	<footer class="section pb-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-8 text-md-left text-center">
					<p class="mb-md-0 mb-4">Copyright © 2022 Designed and Developed by <a
							href="https://github.com/Peagah-Vieira">PeagahVieira</a></p>
				</div>
				<div class="col-md-4 text-md-right text-center">
					<ul class="list-inline">
						<li class="list-inline-item"><a class="text-color d-inline-block p-2" href="https://twitter.com/Pea_gah" target="_blank"><i
									class="ti-twitter-alt"></i></a></li>
						<li class="list-inline-item"><a class="text-color d-inline-block p-2" href="https://github.com/Peagah-Vieira" target="_blank"><i class="ti-github"></i></a>
						</li>
						<li class="list-inline-item"><a class="text-color d-inline-block p-2" href="#" target="_blank"><i
									class="ti-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="assets/plugins/jquery/jquery-1.12.4.js"></script>
	<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="assets/plugins/match-height/jquery.matchHeight-min.js"></script>
	<script src="assets/backend/index.js"></script>
</body>

</html>