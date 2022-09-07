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
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link href="assets/css/index.css" rel="stylesheet" media="screen" />
		<title>PokeHub - Index Page</title>
</head>

<body>
	<header class="baanner overlay bag-cover" data-background="assets/img/index.gif">
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
					<h2 class="text-white mb-3"><?=$_SESSION['username']?></h2>
					<p class="text-white mb-4">Pokemon Register &amp; Pokemon Index</p>
					<div class="position-relative">
                        <form action="" method="GET">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Type your pokemon Here">
                            <button type="submit" class="search-icon"><i class="ti-search" aria-hidden="true"></i></button>
                        </form>
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
				if($number['num'] == 3) {
					$i = 3;
					while($i < 154){
                            $stm = $conn->query("SELECT num,name,img,next_evolution0name,next_evolution1name,weaknesses0,weaknesses1,weaknesses2 FROM pokemons WHERE num=$i");
                            $pokemon = $stm->fetch(PDO::FETCH_ASSOC);
						$i++;
			?>
			<!-- Modal Ainda não Funcionando-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?=$pokemon['name']?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
                    <span aria-hidden="true">&times;</span>
				</div>
				<div class="modal-body">
				<img src="<?=$pokemon['img']?>" class="mx-auto d-block" alt="<?=$pokemon['name']?>">
				</div>
				<div class="modal-footer">
                    <h5>Weaknesses:</h5>
                    <h6><?=$pokemon['weaknesses0']?></h6>
                    <h6><?=$pokemon['weaknesses1']?></h6>
                    <h6><?=$pokemon['weaknesses2']?></h6>
				</div>
				</div>
			</div>
			</div>
			<!-- Exit Modal -->
			<?php 
				if($i % 3 == 1){ 
			?>
			<div class="row">
			<?php
			 	} 
			?>
			<div class="row">
				<div class="col-md-8 mr-3 mt-3">
					<div class="card text-center pt-3" data-toggle="modal" data-target="#exampleModal" style="width: 22rem;">
						<img src="<?=$pokemon['img']?>" class="mx-auto d-block" alt="<?=$pokemon['name']?>">
						<div class="card-body px-3">
							<h5 class="card-title"><?=$pokemon['name']?></h5>
							<p>
								<?php
									if ($pokemon['next_evolution0name'] == NULL) {
										echo "Without Next Evolution ";
									}
									else if($pokemon['next_evolution1name'] == NULL){
										echo "Next Evolution: $pokemon[next_evolution0name]";
									}
									else {
										echo "Next Evolution: $pokemon[next_evolution0name] & $pokemon[next_evolution1name]";
									}
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php
			 if($i % 3 == 0) { 
				?>
      </div>
      <?php 
	  } } } 
	  else { 
		?>
      <?php
	   } 
	  ?>
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