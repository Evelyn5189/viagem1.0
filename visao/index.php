<?php
session_start(); 


if (!isset($_SESSION["usuario"]) ) {
    if (!isset($_POST['usuario'])){
        $usuario =  $_POST['usuario'];
        header("Location: login.php?erro=usuario não logado!");
        exit;
    
    }
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['nomeusuario'] = $_POST['nomeusuario'];
}


include '..\controladora\conexao.php';
include '..\modelo\Viagens.php';
include '..\repositorio\ViagemRepositorio.php';

$viagemRepositorio = new ViagemRepositorio($conn);
$viagens = $viagemRepositorio->listarViagens();
?>
<!doctype html>
<html  lang="en">

	<head>
		<!-- META DATA -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

		<!-- TITLE OF SITE -->
		<title>Viagem 10</title>

		<!-- favicon img -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>

		<!--font-awesome.min.css-->
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />

		<!--animate.css-->
		<link rel="stylesheet" href="../assets/css/animate.css" />

		<!--hover.css-->
		<link rel="stylesheet" href="../assets/css/hover-min.css">

		<!--datepicker.css-->
		<link rel="stylesheet"  href="../assets/css/datepicker.css" >

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css"/>

		<!-- range css-->
        <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />

		<!--bootstrap.min.css-->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

		<!-- bootsnav -->
		<link rel="stylesheet" href="../assets/css/bootsnav.css"/>

		<!--style.css-->
		<link rel="stylesheet" href="../assets/css/style.css" />

		<!--responsive.css-->
		<link rel="stylesheet" href="../assets/css/responsive.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
			your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- main-menu Start -->
		<header class="top-area">
			<div class="header-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="logo">
								<a href="index.php">
									Viagem<span>10
									</span>
								</a>
							</div><!-- /.logo-->
						</div><!-- /.col-->
						<div class="col-sm-10">
							<div class="main-menu">
							
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<i class="fa fa-bars"></i>
									</button><!-- / button-->
								</div><!-- /.navbar-header-->
								<div class="collapse navbar-collapse">		  
									<ul class="nav navbar-nav navbar-right">
										<li class="smooth-menu"><a href="#home">home</a></li>
										<li class="smooth-menu"><a href="#pack">Pacotes</a></li>
										<li><a href="cadastrar-usuario.php">cadastrar</a></li>
										<?php
										if (isset($_SESSION["nomeusuario"])){
											echo "
											<li><a href='admin.php'>" .$_SESSION ["nomeusuario"] ."</a></li>";
										}?>
										<li> <a onclick="logout();" >Sair</a>
										<li>
											<button class="book-btn">Reserve agora
											</button>
										</li><!--/.project-btn--> 
										
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.main-menu-->
						</div><!-- /.col-->
					</div><!-- /.row -->
					<div class="home-border"></div><!-- /.home-border-->
				</div><!-- /.container-->
			</div><!-- /.header-area -->

		</header><!-- /.top-area-->
		<!-- main-menu End -->

		
		<!--about-us start -->
		<section id="home" class="about-us">
			<div class="container">
				<div class="about-us-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="single-about-us">
								<div class="about-us-txt">
									<h2>
										Explore a beleza de um mundo maravilhoso 

									</h2>
									<div class="about-btn">
										<button  class="about-view">
											explore agora
										</button>
									</div><!--/.about-btn-->
								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-0">
							<div class="single-about-us">
								
							</div><!--/.single-about-us-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.about-us-content-->
			</div><!--/.container-->

		</section><!--/.about-us-->
		<!--about-us end -->

        <!--service start-->
		<section id="service" class="service">
			<div class="container">

				<div class="service-counter text-center">

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="service-img">
								<img src="../assets/images/service/s1.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">
								<h2>
									<a href="#">
									Lugares incríveis
									</a>
								</h2>
								<p>Conheça lugares incríveis! Acesse nossos pacotes de viagem.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="service-img">
								<img src="../assets/images/service/s2.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">
								<h2>
									<a href="#">
										Melhores hotéis
									</a>
								</h2>
								<p>Os melhores hotéis do mundo você só encontra aqui.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="statistics-img">
								<img src="../assets/images/service/s3.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">

								<h2>
									<a href="#">
										Veja nossas inúmeras opções
									</a>
								</h2>
								<p>Temos muitos aviões esperando para te levar para lindos lugares.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

				</div><!--/.statistics-counter-->	
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->






		<!--packages start-->



		<section id="pack" class="packages">
			<div class="container">
				<div class="gallary-header text-center">
					<h2>
						Nossos pacotes
					</h2>
					<p>
						Escolha os melhores pacotes de viagem de todos os tempos!  
					</p>
						<!-- Aqui vai ficar o read (select) -->



        <?php 
               
                foreach ($viagens as $viagem):?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $viagem->getImagemDiretorio() ?>">
                        </div>
                        <p><?= $viagem->getNome() ?></p>
                        <p><?= "R$ ".number_format($viagem->getPreco(), 2) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>









		<!-- footer-copyright start -->
		<footer  class="footer-copyright">
			<div class="container">
				<div class="footer-content">
					<div class="row">

						<div class="col-sm-3">
							<div class="single-footer-item">
								<div class="footer-logo">
									<a href="index.html">
										Viagem<span>10</span>
									</a>
									<p>
										Melhor agência de viagens do mundo
									</p>
								</div>
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item">
								<h2>link</h2>
								<div class="single-footer-txt">
									<p><a href="#">home</a></p>
									<p><a href="#">Destinatários</a></p>
									<p><a href="#">Pacotes</a></p>
									<p><a href="#">Ofertas</a></p>
									<p><a href="#">blog</a></p>
									<p><a href="#">Subscrição</a></p>
									<p><a href="#">Cadastrar</a></p>
									<p><a href="#">Login</a></p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->

						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item">
								<h2>destinos populares</h2>
								<div class="single-footer-txt">
									<p><a href="#">china</a></p>
									<p><a href="#">venezuela</a></p>
									<p><a href="#">brasil</a></p>
									<p><a href="#">australia</a></p>
									<p><a href="#">london</a></p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item text-center">
								<h2 class="text-left">contatos</h2>
								<div class="single-footer-txt text-left">
									<p>4002-8922</p>
									<p class="foot-email"><a href="#">viagem10@gmail.com</a></p>
									<p>IFSP - Guarulhos</p>
									<p>São Paulo, BRASIL</p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

					</div><!--/.row-->

				</div><!--/.footer-content-->
				<hr>
				<div class="foot-icons ">
					<ul class="footer-social-links list-inline list-unstyled">
		                <li><a href="#" target="_blank" class="foot-icon-bg-1"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#" target="_blank" class="foot-icon-bg-2"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#" target="_blank" class="foot-icon-bg-3"><i class="fa fa-instagram"></i></a></li>
		        	</ul>
		        	<p>&copy; 2023 <a href="#">VIAGEM10</a>. Todos os direitos reservados</p>

		        </div><!--/.foot-icons-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->
		<script>
        function logout() {
            // Aqui você pode adicionar lógica para encerrar a sessão, por exemplo:
            // session_start();
            // <?php session_destroy(); ?>

            // Redireciona para a página de login
            window.location.href = 'login.php';
        }
    </script>
									


		<script src="../assets/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!--modernizr.min.js-->
		<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


		<!--bootstrap.min.js-->
		<script  src="../assets/js/bootstrap.min.js"></script>

		<!-- bootsnav js -->
		<script src="../assets/js/bootsnav.js"></script>

		<!-- jquery.filterizr.min.js -->
		<script src="../assets/js/jquery.filterizr.min.js"></script>

		<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!--jquery-ui.min.js-->
        <script src="../assets/js/jquery-ui.min.js"></script>

        <!-- counter js -->
		<script src="../assets/js/jquery.counterup.min.js"></script>
		<script src="../assets/js/waypoints.min.js"></script>

		<!--owl.carousel.js-->
        <script  src="../assets/js/owl.carousel.min.js"></script>

        <!-- jquery.sticky.js -->
		<script src="../assets/js/jquery.sticky.js"></script>

        <!--datepicker.js-->
        <script  src="../assets/js/datepicker.js"></script>

		<!--Custom JS-->
		<script src="../assets/js/custom.js"></script>


	</body>

</html>