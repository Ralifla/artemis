<?php
	if(is_category('depoimentos')){
		$class = 'bg-default';
	}
?>
<article class="entry-quote <?php echo $class; ?>">
	<?php the_post_thumbnail('thumbnail', array( 'class' => 'img-circle' ) ); ?>
	<?php the_title("<p class='entry-quote-title'>","<p>"); ?>
	<img src="<?php bloginfo('template_url');?>/images/icon-estrelas.png" alt="" title="" width="" height="">
	
	<blockquote>
		<?php the_content(); ?> 
	</blockquote>
</article>