<?php get_header(); ?>

	<main id="main" class="site-main" role="main">
		
		<!-- Destaques -->
		<section id="destaques" class="bg-default">
			<div class="row content-area">
				<div class="col-6">
					<h2>Revenda semijoias sem nenhum investimento.</h2>
					<p>Tenha <b>renda extra sem precisar de investimento</b> inicial e com <b>lucro de até 40%</b>. 
						Pague somente o que você vender descontando seu lucro. <b>Monte seu mostruário</b> pelo nosso site e <b>receba em casa</b>.</p>
					<a class="btn bg-primary" href="#">VEJA COMO FUNCIONA</a>
				</div>

				<div class="col-6">
					<img src="<?php bloginfo('template_url'); ?>/images/maleta-semijoias-ralifla.png" alt="Maleta Semijoias Ralifla" title="Maleta Semijoias Ralifla" width="" height="">
				</div>
			</div>
		</section>

		<!-- Vantagens -->
		<section id="vantagens" class="">
			<div class="row content-area">
				<h2 class="entry-home-title text-aligncenter">Vantagens Ralifla</h2>
				<span class="border-title-home"></span>

				<div class="col-3">
					<div class="vantagens">
						<img src="<?php bloginfo('template_url');?>/images/icon-montarkit.png" alt="" title="" width="" height="">
						<h6>Escolha suas peças e monte seu kit</h6>
						<p class="text-aligncenter">Além de fazer pedidos via internet, telefone ou nas Centrais de Serviço, ainda há um site para os revendedores. Sem nehum custo.</p>
					</div>
				</div>

				<div class="col-3">
					<div class="vantagens">
						<img src="<?php bloginfo('template_url');?>/images/icon-horarioflexivel.png" alt="" title="" width="" height="">
						<h6>Trabalhe onde e quando puder</h6>
						<p class="text-aligncenter">Faça seu horário, agende suas visitas ao seus clientes, trabalhe conforme sua rotina.</p>
					</div>
				</div>

				<div class="col-3">
					<div class="vantagens">
						<img src="<?php bloginfo('template_url');?>/images/icon-melhormostruario.png" alt="" title="" width="" height="">
						<h6>Melhor maleta de Semijoias do Brasil</h6>
						<p class="text-aligncenter">Possuimos o melhor mix de semijoias do Brasil. Um belo mostruário com mais de R$ 3000,00 reais em peças.</p>
					</div>
				</div>

				<div class="col-3">
					<div class="vantagens">
						<img src="<?php bloginfo('template_url');?>/images/icon-seminvestimento.png" alt="" title="" width="" height="">
						<h6>Renda extra com lucro de até 40%</h6>
						<p class="text-aligncenter">Trabalhamos com revenda em consignado, ou seja pague somente o que você vender. Com lucro de até 40%.</p>
					</div>
				</div>
			</div>
		</section>

		<!-- Depoimentos -->
		<section id="depoimentos">
			<div class="row content-area">

				<?php 
				$args = array('category_name'=>'depoimentos', 'numberposts'=>1, 'orderby'=>'rand', );
				$aux = get_posts($args);
						
					if($aux):
						foreach( $aux as $post ) : setup_postdata($post); 
					   		get_template_part('content', get_post_format() ); 
						endforeach; 

					else: 
						echo "Nenhum conteúdo.";
					endif; 
				?>
     			
			</div>
		</section>

		<!-- #DicasRalifla -->
		<section id="blog">
			<div class="row content-area">
				<h2 class="entry-home-title text-aligncenter">#DicasRalifla</h2>
				<span class="border-title-home"></span>
					
					<?php 
					$args = array('cat'=>'-5', 'posts_per_page' => 3, 'orderby' => 'desc', );
					$aux = get_posts($args);
							
						if($aux):
							foreach( $aux as $post ) : setup_postdata($post); ?>

						   		<article class="col-4">
				           			<?php get_template_part('content', get_post_format() ); ?>
				           		</article>

							<?php 
							endforeach; 

						else: 
							echo "Nenhum conteúdo.";
						endif; 
					?>

			</div>
		</section>

		<!-- Seja uma revendedora -->
		<section id="cadastro" class="bg-default">
			<div class="content-area">
				<div class="cadastro row">
					<div class="col-5">
						<img src="<?php bloginfo('template_url');?>/images/modelo.jpg" alt="" title="" width="" height="400">
					</div>

					<div class="col-7">
						<div class="box-cadastro">
							<h2>Seja uma revendedora</h2>
							<span class="border-title-cadastro"></span>
							<p class="text-alignleft">Acredite em você! Seja uma revendedora Ralifla. Tenha renda extra sem precisar de investimento inicial e com lucro de até 40%, conquiste sua independência financeira e REALIZE SEUS SONHOS.</p>
							<a class="btn bg-primary">QUERO SER REVENDEDORA</a> <a class="btn bg-secondary">COMO FUNCIONA</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>	

<?php get_footer(); ?>