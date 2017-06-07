<?php
/*
 * Template Name: BLog
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<header class='page-title' role="heading">
		<?php 
		the_title('<h1>','</h1>'); 
			
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
		}
		?>
	</header>

	<section class="page-container">
		<div class="row content-area">
			<div id="ms-container" class="col-9">
				
				<?php
				$args = array('cat'=>'-5', 'posts_per_page' => 12, 'orderby' => 'desc', );
				$aux = get_posts($args);
							
					if($aux):
						foreach( $aux as $post ) : setup_postdata($post); ?>
	
							<!-- Lista posts (content.php) -->
							<article class="ms-item col-6">
								<?php get_template_part('content', get_post_format() ); ?>
							</article>
					
					<?php 
						endforeach; 

					else: 
						echo "Nenhum conteúdo.";
					endif; 
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

