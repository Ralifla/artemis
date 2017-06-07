<?php
/**
 * The header for our theme.
 */ 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php the_title(); ?></title>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<?php wp_head(); ?>
</head>	

<body>
<!-- Facebook API -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=345991722203736";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<header id="header" role="banner">
		<div class="top top-navigation">

			<div id="menu-social" class="content-area">
				<ul>
					<li><a href="" target="_blank">JÁ SOU REVENDEDORA</a></li>
					<li><a href="http://localhost/_ArthemisProject/site/tire-suas-duvidas/">DÚVIDAS</a></li>
					<li><a href="http://localhost/_ArthemisProject/site/fale-conosco/">FALE CONOSCO</a></li>
					<li><a class="facebook" href="https://www.facebook.com/Ralifla/" target="_blank"><span class="fa fa-facebook"></span></a></li>
					<li><a class="instagram" href="https://www.instagram.com/ralifla_semijoias_oficial/" target="_blank"><span class="fa fa-instagram"></span></a></li>
					<li><a class="googleplus" href="https://plus.google.com/+ralifla" target="_blank"><span class="fa fa-google-plus"></span></a></li>
					<li><a class="youtube" href="https://www.youtube.com/user/Ralifla" target="_blank"><span class="fa fa-youtube-play"></span></a></li>
				</ul>
			</div>
		</div>


		<div class="top main-navigation">
			<div class="content-area">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="logo" src="<?php bloginfo('template_url'); ?>/images/ralifla1.png" alt="Ralifla" title="Ralifla" width="152" height="47">
				</a>

				<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => 'nav', 'container_id' => 'menu' ) ); ?>
				
			</div>
		</div>
	</header>

	<!-- Slider Revolution -->
	<div class="slider">
		<?php // putRevSlider('parallax_scroll_slider', 'homepage'); ?>
	</div>
	<!-- Fim Slider Revolution -->
	