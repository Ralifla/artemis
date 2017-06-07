<footer id="footer" role="contentinfo">
	<section class="row content-area">
		
		<a href="#header" rel='m_PageScroll2id' class="up-page"></a>
		<?php if(dynamic_sidebar('r-footer-1')) : ?><?php endif; ?>
		
		<?php if(dynamic_sidebar('r-footer-2')) : ?><?php endif; ?>

		<?php if(dynamic_sidebar('r-footer-3')) : ?><?php endif; ?>

		<?php if(dynamic_sidebar('r-footer-4')) : ?><?php endif; ?>

	</section>

	<p style="border-top: 1px solid #403F4B; padding: 10px 0;" class="text-aligncenter content-area">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">GrupoRalifla</a> 
		<?php echo ralifla_copyright(); ?> - Há mais de três décadas contribuindo para a valorização da mulher.
	</p>
</footer>
	
<?php wp_footer(); ?>
</body>
</html>