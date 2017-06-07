<?php
/**
 * The template for displaying search results pages.
 */
get_header(); ?>
  
<main id="main" class="site-main" role="main">
	<header class='page-title' role="heading">
	
		<h1>Resultado da Busca</h1>

		<?php 
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
		}
		?>
		
	</header>

	<section class="page-container">
		<div class="row content-area ">
			<div id="search" class="col-9 page-content bg-default ">
			
	          	<?php
	          	if (have_posts()) : 

	          	while(have_posts()) : the_post() ?>
						<div class="page-search">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_title('<h6>','</h6>'); ?>
								<?php the_excerpt(); ?>
							</a>
						</div>
	              	<?php endwhile; 

	              	// Paginação
	              	wp_pagination(); 
      			
      			else : ?>

	      			<h3><?php _e( 'Não existe resultados ', 'ralifla' ) ?></h3>
	            	<?php _e( 'Desculpe, mas nada corresponde aos seus critérios de busca. Por favor, tente novamente com algumas palavras diferentes.', 'ralifla' ); ?>  
	          		<?php get_search_form(); 

	          	endif; 
	          	?>  
     			
			</div>

			<aside class="col-3">

				<?php get_sidebar(); ?>

			</aside>
		</div>
	</section>

<?php get_footer(); ?>