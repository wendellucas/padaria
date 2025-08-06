<?php
include 'load_index.php';

$doc = "
<!DOCTYPE html>
<html lang='pt-BR'>

<head>

	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<meta name='description' content=''>
	<meta name='author' content=''>

	<title>Recanto Doce</title>

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

</head>

<body id='page-top'>

	<!-- Navigation -->
	<nav class='navbar navbar-expand-lg navbar-dark fixed-top' id='mainNav'>
		<div class='container'>
			<a class='navbar-brand js-scroll-trigger' href='#page-top'><img src='img/logo.png' width='65'/></a>

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
						</a>";
						$doc .= load_cat_menu();

					$doc .= "</li>

					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='#encomendas'>Encomendas</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='#delivery'>Delivery</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='#local'>Como Chegar</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='#eventos'>Eventos</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='#historia'>Quem Somos</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='#contact'>Contato</a>
					</li>
					<!-- <li class='nav-item'>
						<a class='nav-link js-scroll-trigger' href='promocoes.php'>Promoções</a>
					</li> -->
				</ul>
			</div>
		</div>
	</nav>

	<!-- Header -->
	<header class='masthead'>
		<div class='container'>
		<br/><br/><br/><br/><br/><br/><br/>";
					$doc .= load_slider();
				$doc .= "
			<div class='intro-text logo'>
				<!-- <div class='intro-lead-in'><img src='img/logo.png' width='300' height='300' /></div> -->
				<div class='intro-heading text-uppercase'>Muito mais que uma padaria!</div>
				<a class='btn btn-primary btn-xl text-uppercase js-scroll-trigger' href='#portfolio'>Nossa Casa</a>
			</div>
		</div>
	</header>

	<!-- Grade Portfolio -->
	<section class='bg-light page-section' id='portfolio'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Nossa Casa</h2>
					<h3 class='section-subheading text-muted'>Variedades selecionadas com carinho</h3>
				</div>
			</div>
			<div class='row'>";
				 
					$doc .= load(); 
				
				
			$doc .= "</div>
			
		</div>
		
	</section>
	<!-- Encomendas -->
	<section class='bg-dark page-section' id='encomendas'>
<div class='container'>
<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Encomenas</h2>
					<h3 class='section-subheading'>Você pensa e nós criamos!</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<img src='img/encomendas.jpg' width='100%'/>
					<br/><br/>
					<p class='wp-color'>Aqui na Recanto Doce, você pode escolher diversas opções de nosso cardápio, pedir por telefone ou WhatsApp, e vir retirar.</p>
					<p class='wp-color'>Maior facilidade na hora de planejar suas reuniões e comemorações</p>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-6 text-center'>
					<h4 class='wp-color'>Telefone</h4>
					<a href='tel:551632021039'>(16)3202-1039</a>
				</div>
				<div class='col-sm-6 text-center'>
					<h4 class='wp-color'>WhatsApp</h4>
					<a href='https://api.whatsapp.com/send?phone=5516991463422><p class='text-muted'>(16) 99146-3422</p></a>
				</div>
			</div>
	</div>
</div>
	
</div>
</div>
</section>
	<!-- Disk Entregas -->
	<section class='bg-light page-section' id='delivery'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Delivery</h2>
					<h3 class='section-subheading'>Peça pelo nosso delivery e levamos onde você estiver!</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<a href='tel:551632021039'><img src='img/delivery.png' width='50%'></a>
					<br/><br/>
					<p>Nosso Delivery está a sua disposição todos os dias, seja no trabalho ou no conforto do seu lar, conte com nossas delícias na sua porta.</p>

					<p>Para pessoas como você que as vezes não podem vir até aqui, mas, não abrem mão de saborear produtos feitos com muita dedicação e qualidade.</p>
					
					<p>Fique tranquilo, nosso Delivery tem uma equipe dedicada para tratar seu pedido com muito carinho e todo cuidado necessário. Você só precisa acessar nosso Cardápio, escolher tudo que deseja e nos enviar seu pedido. Você poderá fazer isso através do WhatsApp ou nosso telefone.</p>
					
					<p>Não esqueça de verificar com nosso Atendimento as Regiões Atendidas pelo nosso Delivery.</p>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-6 text-center'>
					<h4>Telefone</h4>
					<a href='tel:551632021039'><p>(16)3202-1039</p></a>
				</div>
				<div class='col-sm-6 text-center'>
					<h4>WhatsApp</h4>
					<a href='https://api.whatsapp.com/send?phone=5516991463422><p class='text-muted'>(16) 99146-3422</p></a>
				</div>
			</div>
		</div>
	</section>

	<!-- Local -->
	<section class='bg-dark page-section' id='local'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Como Chegar</h2>
					<h3 class='section-subheading'>Venha conhecer nosso espaço</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-12'>
					<iframe
						src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.4456852353737!2d-48.325167385570445!3d-21.25381868631968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b96bd9c05170e1%3A0xd7dcd01bd3b5316f!2sPadaria%20Recanto%20Doce%20-%20Restaurante!5e0!3m2!1spt-BR!2sbr!4v1583806348889!5m2!1spt-BR!2sbr'
						width='100%' height='500'  frameborder='0' style='border:0;' allowfullscreen=''></iframe>
				</div>
			</div>
		</div>
	</section>

	<!-- Eventos -->
	<section class='bg-light page-section' id='eventos'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Eventos</h2>
					<h3 class='section-subheading'>Eventos em nosso espaço</h3>
				</div>
			</div>";
			$doc .= load_eventos();
			$doc .= "
			<a href='eventos.php'>Confira todos os eventos realizados.</a>
			</div>
	</section>

	<!-- História -->
	<section class='bg-dark page-section' id='historia'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Nossa História</h2>
					<h3 class='section-subheading'>Eventos em nosso espaço</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-6'>
					<img src='img/historia/2.jpg' width='100%' />
					<br/><br/>
					<img src='img/historia/2.jpg' width='100%' />
				</div>
				<div class='col-sm-6'>
				<p class='wp-color'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis tincidunt aliquam. Proin fermentum mattis augue sit amet porttitor. Phasellus elementum vel ligula vel rhoncus. Curabitur turpis eros, egestas at risus et, lobortis gravida turpis. Vestibulum nisi magna, pellentesque at maximus sed, aliquam ac purus. Mauris congue, justo vel imperdiet lobortis, ligula urna malesuada mi, et lobortis arcu erat ut arcu. Aenean nec consectetur turpis. Mauris nunc elit, condimentum eu justo sit amet, molestie finibus neque. In ex ligula, ultricies et metus ac, consectetur porttitor metus.

				Mauris eu euismod magna, nec dictum mauris. Vestibulum sed vehicula odio. Vivamus vitae nunc a elit cursus accumsan. Vivamus tristique ut urna id tempus. Nulla varius sagittis urna, elementum semper sapien facilisis ac. Curabitur in aliquam ante, sed feugiat augue. Etiam tempor est a elit commodo vehicula. Vestibulum fringilla lacus non interdum aliquam. Sed nec erat nisl. Mauris magna diam, vestibulum eu tempor vel, commodo sit amet ex. Vestibulum ornare viverra libero, vitae tempor dui suscipit et. Nunc sagittis augue non diam sodales, in sollicitudin metus finibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
				
				Integer aliquam, turpis ut sodales luctus, diam metus sollicitudin nibh, non tincidunt massa justo et diam. Integer ultrices mattis ultricies. Aenean sollicitudin id lectus at sagittis. Donec euismod felis id auctor laoreet. In eget ipsum fermentum, molestie libero eget, molestie sem. Donec molestie a purus eget condimentum. Maecenas et dui sit amet erat blandit imperdiet quis in orci. Vestibulum hendrerit sollicitudin sollicitudin. Aenean a cursus urna. Cras in neque vitae erat gravida rutrum. Ut pretium convallis posuere. Proin condimentum, lacus feugiat suscipit placerat, massa odio iaculis enim, quis elementum nunc purus ut nibh. Sed sollicitudin ante non lacus porttitor, eu commodo risus lacinia.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Contato -->
	<section class='bg-light page-section' id='contact'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<h2 class='section-heading text-uppercase'>Fale Conosco</h2>
					<h3 class='section-subheading text-muted'>Faça sua encomenda ou reserve o nosso espaço</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-4'>
					<div class='team-member'>
						<img class='mx-auto rounded-circle' src='img/fone.jpg' alt=''>
						<h4>Telefone</h4>
						<p class='text-muted'>(16)3202-1039 / (16)99146-3422</p>

						<ul class='list-inline social-buttons'>
							<li class='list-inline-item'>
								<a href='https://api.whatsapp.com/send?phone=5516991463422'>
									<i class='fa fa-phone'></i>
									
								</a>
							</li>
							
							<li class='list-inline-item'>
							<a href='tel:551632021039'>
									<i class='fab fa-whatsapp'></i>
									
								</a>
							</li>
							
						</ul>
					</div>
				</div>
				<div class='col-sm-4'>
					<div class='team-member'>
						<img class='mx-auto rounded-circle' src='img/social_media.jpg' alt=''>
						<h4>Redes sociais</h4>
						<p class='text-muted'>Curta, comente e compartilhe</p>
						<ul class='list-inline social-buttons'>
							<li class='list-inline-item'>
								<a href='https://www.instagram.com/padaria.recantodoce/' target='_blank'>
									<i class='fab fa-instagram'></i>
								</a>
							</li>
							<li class='list-inline-item'>
								<a href='https://www.facebook.com/padariarecantodoce/' target='_blank'>
									<i class='fab fa-facebook-f'></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class='col-sm-4'>
					<div class='team-member'>
						<img class='mx-auto rounded-circle' src='img/local.jpg' alt=''>
						<h4>Venha nos visitar</h4>
						<p class='text-muted'>Av. Rui Barbosa, 1187 14870-740 Jaboticabal</p>
						<ul class='list-inline social-buttons'>
							<li class='list-inline-item'>
								<a href='https://goo.gl/maps/zEDE9Dx9ThjzsQfK6' target='_blank'>
									<i class='fa fa-map-marker'></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class='row'>
				<div class='col-lg-8 mx-auto text-center'>
					<iframe src='https://open.spotify.com/embed/playlist/462AP3cXZJqqIbnKo9LHu5' width='300' height='80'
						frameborder='0' allowtransparency='true' allow='encrypted-media'></iframe>
				</div>
				<div class='col-lg-8 mx-auto text-center'>
					<p class='large text-muted'>Mais que uma padaria!</p>
				</div>
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

	<a href='https://br.freepik.com/fotos-vetores-gratis/medico' hidden>Médico vetor criado por freepik - br.freepik.com</a>
	<a href='https://br.freepik.com/fotos-vetores-gratis/alimento' hidden>Alimento foto criado por timolina - br.freepik.com</a>

</body>

</html>";
echo $doc;
?>