<?php
/*
	Single
*/
get_header(); ?>
	<?php 
	if(have_posts()):
		while ( have_posts() ) : the_post(); ?>
		
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
				<div class="col-9 bg-default page-content page-img">
				
				<?php the_post_thumbnail('medium_large'); ?>
				
				<p><i>Este post foi escrito por: <?php the_author(); ?></i></p>
				
				<div class="page-info" role="complementary">
					<i class="fa fa-tag" aria-hidden="true"></i>  <?php the_category(', '); ?>
					<?php the_tags( '  <i class="fa fa-tags" aria-hidden="true"></i>  ', ', ', ' ' ); ?>
				</div>

				<?php the_content(); ?>

				<div class="comments" role="complementary">
					<h3>Comentários</h3>
					<p>Diga nos o que você achou da matéria acima: </p>
					<div class="fb-comments" data-href="http://localhost/_ArthemisProject/site/?p=<?php the_ID(); ?>" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
				</div>
				</div>

				<aside class="col-3" role="complementary">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</section>

    	<?php 
    	endwhile; 

    else: 
    	echo"Nenhum post encontrado";

    endif;

get_footer(); ?>