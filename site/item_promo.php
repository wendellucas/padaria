<?php
include 'load_item_promo.php';

$doc = "
<!DOCTYPE html>
<html lang='pt-BR'>

<head>

	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<meta name='description' content=''>
	<meta name='author' content=''>

	<title>Recanto Doce - Promoções</title>

	<!-- Bootstrap core CSS -->
	<link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

	<!-- Fontes -->
	<link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
		type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Spicy+Rice' rel='stylesheet'>
	<!-- https://fonts.google.com/specimen/Lobster -->
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
	<!-- CSS tema -->
	<link href='css/agency.css' rel='stylesheet'>
    <link href='css/estilos.css' rel='stylesheet'>
    <style>
        @media (min-width: 992px) {
            #mainNav {
                padding-top: 8px;
                padding-bottom: 8px;
                transition: padding-top 0.3s, padding-bottom 0.3s;
                border: none;
                background-color: #212529;
            }
		}
		img.itemcardapio {
			max-width: 700px;
		  }
    </style>

</head>

<body id='page-top'>

	<!-- Navigation -->
	<nav class='navbar navbar-expand-lg navbar-dark fixed-top' id='mainNav'>
		<div class='container'>
			<a class='navbar-brand js-scroll-trigger' href='index.php'><img src='img/logo.png' width='65'/></a>

			

			<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse'
				data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false'
				aria-label='Toggle navigation'>
				Menu
				<i class='fas fa-bars'></i>
			</button>
			<div class='collapse navbar-collapse' id='navbarResponsive'>
				<ul class='navbar-nav text-uppercase ml-auto'>
					<!-- <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='#services'>Cardápio</a>
          </li> -->
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
							data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Cardápio
						</a>
						<!-- <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
							<a class='dropdown-item' href='#'>Almoço</a>
							<a class='dropdown-item' href='#'>Coffee Break</a>
							<a class='dropdown-item' href='#'>Matinais</a>
							<a class='dropdown-item' href='#'>Saladas</a>
						</div> -->";
						$doc .= load_cat_menu();

					$doc .= "</li>

					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='index.php#encomendas'>Encomendas</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='index.php#delivery'>Delivery</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='index.php#local'>Como Chegar</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='index.php#eventos'>Eventos</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='index.php#historia'>Quem Somos</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='index.php#contact'>Contato</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Grade Portfolio -->
	<section class='bg-light page-section' id='portfolio'>
		<div class='container'>
			<div class='row'>
                <div class='col-lg-12 text-center'>";
                $doc .= load_title();
				$doc .= "</div>
			</div>
            <div class='row'>
            </div>
			
		</div>
		
	</section>

	<!-- Footer -->
	<footer class='footer'>
		<div class='container'>
			<div class='row align-items-center'>
				<div class='col-md-4'>
					<span class='copyright'>Copyright &copy; Nosso site 2020</span>
				</div>
				<div class='col-md-4'>
					<ul class='list-inline social-buttons'>
						<li class='list-inline-item'>
							<a href='https://www.instagram.com/padaria.recantodoce/'>
								<i class='fab fa-instagram'></i>
							</a>
						</li>
						<li class='list-inline-item'>
							<a href='https://www.facebook.com/padariarecantodoce/'>
								<i class='fab fa-facebook-f'></i>
							</a>
						</li>
					</ul>
				</div>
				<div class='col-md-4'>
					<ul class='list-inline quicklinks'>
						<li class='list-inline-item'>
							<a href='https://www.facebook.com/mariano.ribeiro.3'>Mariano Lucas Ribeiro</a>
						</li>
						<li class='list-inline-item'>
							<a href='https://www.instagram.com/wendellucaslrd/'>Wendel Lucas Ribeiro Damião</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src='vendor/jquery/jquery.min.js'></script>
	<script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

	<!-- Plugin JavaScript -->
	<script src='vendor/jquery-easing/jquery.easing.min.js'></script>

	<!-- Custom scripts for this template -->
	<script src='js/agency.min.js'></script>

</body>

</html>";
echo $doc;
?>