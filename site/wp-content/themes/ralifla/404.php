<?php
/*
 * The template for displaying 404 pages (not found)
*/
get_header(); ?>

<main id="main" class="site-main" role="main">
	
	<header class="page-title-error" role="heading">
		<h1>404</h1>

		<?php 
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
		}
		?>
		
	</header>

	<section class="page-container">
		<div class="row content-area page-content page-img">
			<div style="max-width: 800px;margin: 0 auto;	">
				<div class="error">
		            <h3 align="center">Página não encontrada</h3>
		            <p align="center">Oops! A página que você está buscando não pôde ser encontrada. <br>Por gentileza faça uma nova busca:</p>  

		          	<?php get_search_form(); ?>
				</div>
					
				<p align="center">
					<span style="margin: 0 10px;" class="fa fa-phone"></span>0800 603 1300
					<span style="margin: 0 10px;" class="fa fa-whatsapp" aria-hidden="true"></span>(41) 988 338 535
					<span style="margin: 0 10px;" class="fa fa-envelope"></span>sac@ralifla.com.br   
							
					<a  style="color: #263846; margin-left: 10px;" class="facebook" href=""><span class="fa fa-facebook"></span>    </a>
					<a  style="color: #263846; margin-left: 10px;" class="instagram" href=""><span class="fa fa-instagram"></span>    </a>
					<a  style="color: #263846; margin-left: 10px;" class="googleplus" href=""><span class="fa fa-google-plus"></span>    </a>
					<a  style="color: #263846; margin-left: 10px;" class="youtube" href=""><span class="fa fa-youtube-play"></span>    	</a>
				</p>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>