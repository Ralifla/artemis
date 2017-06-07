<div class="bg-default entry-content page-img">
	<header role="heading">
		<?php the_post_thumbnail(); ?>
		<?php the_title("<h6>","</h6>"); ?>
	</header>
	<footer>
		<?php the_excerpt(); ?>

		<a class="btn bg-primary" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Leia Mais</a>
	</footer>
</div>