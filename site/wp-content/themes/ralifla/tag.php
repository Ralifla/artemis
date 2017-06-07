<?php
/*
 * Category
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<header class='page-title' role="heading">

		<h1>Arquivos</h1> 
		<?php 	
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
		}
		?>
	</header>

	<section class="page-container">
		<div class="row content-area">
			<div class="col-9">
				
				<?php			
				//Condição se existe posts
				if (have_posts()) : 

					//Loop
					while (have_posts()) : the_post(); ?>
						
						<!-- Lista posts (content.php) -->
						<article class="col-6">
							<?php get_template_part('content', get_post_format() ); ?>
						</article>
					
					<?php
					endwhile; // fim loop
							
				else: 
					echo "Conteúdo novo em breve.";

				endif; // fim condição
				?> 

				<!-- Paginação -->
				<div id="page_pagination" class="col-12"><?php wp_pagination(); ?></div>

			</div>

			<aside class="col-3">
				<?php get_sidebar(); ?>
			</aside>

		</div> 
	</section>
</main>

<?php get_footer(); ?>