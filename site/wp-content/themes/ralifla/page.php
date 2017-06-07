<?php
/*
	Page 
*/
get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		
		<header class='page-title' role="heading">
			<?php 
			the_title('<h1>','</h1>'); 
			
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
			}
			?>
		</header>

		<section class="page-container">
			<div class="row content-area bg-default page-content page-img">

				<?php the_content(); ?>

			</div>
		</section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>