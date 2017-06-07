<?php
/*
 * Template Name: Cadastro pt1
 */
get_header(); ?>

<main id="main" class="site-main" role="main">	
	
	<?php
	if (is_home() || is_front_page()) {
		echo "<h1 style='padding-top: 100px;' class='entry-home-title'> Seja uma revendedora</h1><span class='border-title-home'></span>";
		
	} else {
	
		echo "<header class='page-title' role='heading'>";

			while ( have_posts() ) : the_post(); 
				echo "<h1>Seja uma revendedora</h1>";
			
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
				}

          	endwhile;

        echo "</header";

        $classes = 'bg-default page-content';

     }
    ?>
		
	<section class="page-container" id="content">
		<div class="row content-area <?php echo $classes;?>" >
			
			<!-- Formulário -->
			<div class="col-7">
				<form id="form" method="post" action="<?php echo get_template_directory_uri(); ?>/inc/cadastro_filtra.php">
					<label for="nome">Nome Completo:</label>
					<input id="nome" name="nome" type="text" required>

					<label for="cpf">CPF:</label>
					<input id="cpf" name="cpf" type="text" required>

					<label for="data_nasc">Nome:</label>
					<input id="data_nasc" name="data_nasc" type="date" required>

					<label class="erro" for="sexo">Sou:
						<input id="sexo" name="sexo" type="radio" value="FEMININO">    <small><b>Mulher</b></small> 
						<input id="sexo" name="sexo" type="radio" value="MASCULINO">   <small><b>Homem</b></small> 
					</label>	
					
					<label for="telefone">Telefone ou WhatsApp:</label>
					<input id="vendedor_telefone" name="vendedor_telefone" type="tel" placeholder="00000 0000" required>
					
					<label for="email">E-mail:</label>
					<input id="email" name="email" type="email" placeholder="exemplo@seuemail.com" required>
					
					<label for="cep">CEP:</label>
					<input id="cep" name="cep" type="text" placeholder="00000-000" required>
					
					<div class="row">
						<div class="col-8"> 
							<label for="cidade">Cidade:</label>
							<input id="cidade" name="cidade" type="text" placeholder="cidade" required>
						</div>
							
						<div class="col-4">
							<label style="margin-left: 5px;" for="uf">Estado:</label>
							<input id="uf" name="uf" type="text" placeholder="estado" required>
						</div>
					</div>

					<!-- Dados do endereço "escondidos" (tipo_cep, tipo_logradouro, logradouro e bairro) -->
					<input id="tipo_cep" name="tipo_cep" type="hidden">
					<input id="tipo_logradouro" name="tipo_logradouro" type="hidden">
					<input id="logradouro" name="logradouro" type="hidden">
					<input id="bairro" name="bairro" type="hidden">

					<br>
					<p>Ao clicar em enviar você estará concordando com nossos <a class="a-default" href="#"><b>termos e condições</b></a>.</p>

					<input class="btn bg-primary" id="enviar" name="enviar" type="submit" value="QUERO SER REVENDEDORA">
				</form>
			</div>
			
			<!-- Pré Requisitos -->
			<aside class="col-5">
				<div class="prerequisitos">
					<h6 class="top-prerequisitos">Porque pedimos isso:</h6>

					<ul>
						<li><img src="<?php bloginfo('template_url'); ?>/images/icon-maioridade.jpg" alt="Ser maior de 25 anos">Ser maior de 25 anos. Possuimos exceções para maiores de 21 anos vide aprovação*.</li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/icon-cpf.jpg" alt="CPF sem restrições">Um cadastro por CPF e carteira de identidade sujeitos a aprovação*.</li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/icon-comprovante.jpg" alt="Comprovante de residência">Possuir um comprovante de residência como contas de luz, água ou qualquer outra em seu nome com máximo 90 dias de postagem.</li>
						<li><img src="<?php bloginfo('template_url'); ?>/images/icon-mulher.jpg" alt="Valorização da mulher">Nossa missão é desenvolver a valorização da mulher e o empreendedorismo, por este motivo aceitamos apenas revendedoras.</li>
					</ul>
								
					<footer>
						<iframe width="100%" height="200" src="https://www.youtube.com/embed/2n_dcdpMgc0" frameborder="0" allowfullscreen></iframe>
					</footer>
				</div>
			</aside>

		</div>
	</section>
</main>

<?php get_footer(); ?>