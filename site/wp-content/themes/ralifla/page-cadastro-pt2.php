<?php
session_start();
/*
 * Template Name: Cadastro pt2
 */
get_header(); ?>

<main id="main" class="site-main" role="main">	
	
	<?php
	if (is_home() || is_front_page()):
		echo "<h1 style='padding-top: 100px;' class='entry-home-title'> Seja uma revendedora</h1>";
    
	else:
	
		echo "<header class='page-title' role='heading'>";

			while ( have_posts() ) : the_post(); 
				echo "<h1>Seja uma revendedora</h1>";
			
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb(' <p class="page-breadcrumbs">','</p>');
				}
				
          	endwhile;

        echo "</header>";

        $class_page = 'bg-default page-content';
    endif
    ?>
	

	<section class="page-container">
		<div class="row content-area <?php echo $class_page; ?>">
			
			<div class="alert alert-success">

				<?php print '<pre>';
					$array = $_SESSION;
					print_r($array);
					
					$_SESSION['array'] = $array;
				print '</pre>'; ?>

				<p><b>Parabéns <?php echo $_SESSION['pnome']; ?>, seu cadastro foi pré-aprovado.</b> <br>Agora falta pouco! Por gentileza finalize preenchendo os campo abaixo.</p>
			</div>

			<div class="col-7">
				
				<form method="post" id="form">

					<h6>Dados Pessoais:</h6>
					
					<label for="rg">RG:</label>
					<input id="rg" name="rg" type="text" required>
			
					<label for="filiacao">Nome de sua mãe:</label>
					<input id="filiacao" name="filiacao" type="text" required>

					<label class="erro">Estado civíl:
						<input  name="estado_civil" value="SOLTEIRO/A" type="radio">    <small><b>Solteira</b></small> 
						<input  name="estado_civil" value="CASADO" type="radio">    <small><b>Casada</b></small> 
						<input  name="estado_civil" value="DIVORCIADO/A" type="radio">    <small><b>Divorciada</b></small> 
						<input  name="estado_civil" value="VIUVO/A" type="radio">    <small><b>Viúva</b></small> 
						<input  name="estado_civil" value="AMASIADO" type="radio">    <small><b>Amasiado/Mora Junto</b></small> 
					</label>
					
					<div id="estado_civil">
        			 	<div id="CASADO">
							<div class="row">
								<div class="col-8"> 
									<label for="conjuge_nome">Nome do conjugê:</label>
									<input id="conjuge_nome" name="conjuge_nome" type="text" required>
								</div>
									
								<div class="col-4">
									<label for="conjuge_telefone">Telefone do conjugê:</label>
									<input id="conjuge_telefone" name="conjuge_telefone"  type="tel" placeholder="(00) 00000 0000" required>
								</div>
							</div>
						</div>
					
        			 	<div id="AMASIADO">
							<div class="row">
								<div class="col-8"> 
									<label for="amasiado_nome">Nome do parceiro:</label>
									<input id="amasiado_nome" name="amasiado_nome" type="text" required>
								</div>
									
								<div class="col-4">
									<label for="amasiado_telefone">Telefone do parceiro:</label>
									<input id="amasiado_telefone" name="amasiado_telefone"  type="tel" placeholder="(00) 00000 0000" required>
								</div>
							</div>
						</div>
					</div>
					
					<label for="renda_familiar">Renda Média Familiar: 
						<span class="fa fa-question-circle tooltip" aria-hidden="true">
						<small class="tooltip-content alert-info">
							Para descubrir sua renda média familiar é fácil, basta somar toda a renda da casa e dividir pelos integrantes da família,
							exemplo: <br><br>

							Salário Marido: R$ 2200,00. 
							Salário Esposa: R$ 1100,00.
							Filho não possui salário <br><br>
							
							Somamos: 2200 + 1100 = 3300 (total da renda)<br>
							Dividimos: Total da Renda (3300) / Total de Pessoas da Casa(3)<br>

							Renda Familiar = 11000.
						</small>
						</span>
					
						<div class="range">
						  <input id="renda_familiar" name="renda_familiar" class="range-slider" type="range" value="0" min="0" max="5000" step="50">
						  <span class="range-value">0</span>
						</div>
					</label>

					<div class="row">
						<label for="referencia_nome">Refêrencia:</label>
						<div class="col-1"> 
							<select id="referencia_tipo" name="referencia_tipo" required>
								<option disabled selected value> - - - </option>
								<option value="PARENTE 1GRAU">Parente de 1º Grau</option>
								<option value="PARENTE 2GRAU">Parente de 2º Grau</option>
								<option value="VIZINHO">Vizinho</option>                            
								<option value="TRABALHO">Colega de Trabalho</option>
							</select>
						</div>	
					
						<div class="col-7"> 
							<input id="referencia_nome" name="referencia_nome" type="text" placeholder="Nome completo" required>
						</div>
							
						<div class="col-4">
							<input id="referencia_telefone" name="referencia_telefone" type="tel" placeholder="(00) 00000 0000" required>
						</div>
					</div>	

					<br>
					<?php echo $_SESSION['warning']; ?>

					<h6>Endereço:</h6>

					<input id="cep" name="cep" type="text" value="<?php echo $_SESSION['cep']; ?>" placeholder="00000-000" required>
							
					<div class="row address">
						<div class="col-4"> 
							<select id="tipo_logradouro" name="tipo_logradouro" required>
						        <option value="<?php $_SESSION['tipo_logradouro']; ?>"><?php echo $_SESSION['tipo_logradouro']; ?></option>
						        <option value="Alameda">Alameda</option>
						        <option value="Área">Área</option>
						        <option value="Avenida">Avenida</option>                            
						        <option value="Chácara">Chácara</option>
						        <option value="Colônia">Colônia</option>
						        <option value="Condomínio">Condomínio</option>
						        <option value="Conjunto">Conjunto</option>
						        <option value="Distrito">Distrito</option>
						        <option value="Estação">Estação</option>
						        <option value="Estrada">Estrada</option>
						        <option value="Favela">Favela</option>
						        <option value="Fazenda">Fazenda</option>
						        <option value="Feira">Feira</option>
						        <option value="Jardim">Jardim</option>
						        <option value="Ladeira">Ladeira</option>
						        <option value="Lago">Lago</option>
						        <option value="Largo">Largo</option>
						        <option value="Loteamento">Loteamento</option>
						        <option value="Morro">Morro</option>
						        <option value="Núcleo">Núcleo</option>
						        <option value="Parque">Parque</option>
						        <option value="Praça">Praça</option>
						        <option value="Quadra">Quadra</option>
						        <option value="Recanto">Recanto</option>
						        <option value="Residencial">Residencial</option>
						        <option value="Rodovia">Rodovia</option>
						        <option value="Rua">Rua</option>
						        <option value="Setor">Setor</option>
						        <option value="Sítio">Sítio</option>
						        <option value="Travessa">Travessa</option>
						        <option value="Trevo">Trevo</option>
						        <option value="Via">Via</option>
						        <option value="Viela">Viela</option>
						        <option value="Vila">Vila</option>
						      </select>
						</div>

						<div class="col-8">
							<input id="logradouro" name="logradouro" type="text" value="<?php echo $_SESSION['logradouro']; ?>" placeholder="Logradouro (rua, avenida, chacara, viela, etc )" required>
						</div>
					</div>
				
					<div class="row address">
						<div class="col-4">
							<input id="numero" name="numero" type="number" placeholder="Número" required>
						</div>

						<div class="col-8">
							<input id="bairro" name="bairro" type="text" value="<?php echo $_SESSION['bairro']; ?>" placeholder="Bairro" required>
						</div>
					</div>
					
					<div class="row">
						<div class="col-8"> 
							<input id="cidade" name="cidade" type="text" value="<?php echo $_SESSION['cidade']; ?>" placeholder="Cidade" readonly>
						</div>
							
						<div class="col-4">
							<input id="uf" name="uf" type="text" value="<?php echo $_SESSION['uf']; ?>"  placeholder="Estado"  readonly> 
						</div>
					</div>
					
					<div class="address">
						<input id="complemento" name="complemento" type="text" placeholder="Complemento (casa, apartamento, etc)" required>
					</div>

					<div class="address">
						<input id="ponto_referencia" name="ponto_referencia" type="text" placeholder="Referência (Mercadinho Silva)" required>
					</div>

					<br>
					<h6>Atividade Profissional:</h6>
				
					<label class="erro">Possui uma atividade profissional?
						<input name="atividades" value="sim_a" type="radio">    <small><b>SIM</b></small> 
						<input name="atividades" value="nao" type="radio">    <small><b>NÃO</b></small> 
					</label>
	
					<div id="atividades">
        			 	<div id="sim_a">
        			 		<label for="ativ_local">Local de trabalho:</label>
							<input id="ativ_local" name="ativ_local" type="text" required>

							<label for="ativ_funcao">Função:</label>
							<input id="ativ_funcao" name="ativ_funcao" type="text" required>

							<label for="ativ_renda">Renda média:</label>
							<input id="ativ_renda" name="ativ_renda" type="number" required>

							<label for="ativ_telefone">Telefone para contato:</label>
							<input id="ativ_telefone" name="ativ_telefone" type="tel" required>
        			 	</div>
        			</div>
					
					<br>
					<h6>Endereço de Entrega:</h6>
        			
        			<label class="erro">Gostaria de receber sua maleta em outro endereço?
						<input name="end_entrega" value="sim_ee" type="radio">    <small><b>SIM</b></small> 
						<input name="end_entrega" value="nao" type="radio">    <small><b>NÃO</b></small> 
					</label>

					<div id="end_entrega">
        			 	<div id="sim_ee">
        			 		<input id="ee_cep" name="ee_cep" type="text" placeholder="00000-000" required>
							
							<div class="row address">
								<div class="col-4"> 
									<select id="ee_tipo_logradouro" name="ee_tipo_logradouro" required>
								        <option disabled selected value> - - - </option>
								        <option value="Alameda">Alameda</option>
								        <option value="Área">Área</option>
								        <option value="Avenida">Avenida</option>                            
								        <option value="Chácara">Chácara</option>
								        <option value="Colônia">Colônia</option>
								        <option value="Condomínio">Condomínio</option>
								        <option value="Conjunto">Conjunto</option>
								        <option value="Distrito">Distrito</option>
								        <option value="Estação">Estação</option>
								        <option value="Estrada">Estrada</option>
								        <option value="Favela">Favela</option>
								        <option value="Fazenda">Fazenda</option>
								        <option value="Feira">Feira</option>
								        <option value="Jardim">Jardim</option>
								        <option value="Ladeira">Ladeira</option>
								        <option value="Lago">Lago</option>
								        <option value="Largo">Largo</option>
								        <option value="Loteamento">Loteamento</option>
								        <option value="Morro">Morro</option>
								        <option value="Núcleo">Núcleo</option>
								        <option value="Parque">Parque</option>
								        <option value="Praça">Praça</option>
								        <option value="Quadra">Quadra</option>
								        <option value="Recanto">Recanto</option>
								        <option value="Residencial">Residencial</option>
								        <option value="Rodovia">Rodovia</option>
								        <option value="Rua">Rua</option>
								        <option value="Setor">Setor</option>
								        <option value="Sítio">Sítio</option>
								        <option value="Travessa">Travessa</option>
								        <option value="Trevo">Trevo</option>
								        <option value="Via">Via</option>
								        <option value="Viela">Viela</option>
								        <option value="Vila">Vila</option>
								      </select>
								</div>

								<div class="col-8">
									<input id="ee_logradouro" name="ee_logradouro" type="text"  placeholder="Logradouro (rua, avenida, chacara, viela, etc )" required>
								</div>
							</div>
						
							<div class="row address">
								<div class="col-4">
									<input id="ee_numero" name="ee_numero" type="number" placeholder="Número" required>
								</div>

								<div class="col-8">
									<input id="ee_bairro" name="ee_bairro" type="text" placeholder="Bairro" required>
								</div>
							</div>
							
							<div class="row">
								<div class="col-8"> 
									<input id="ee_cidade" name="ee_cidade" type="text" placeholder="Cidade" required>
								</div>
									
								<div class="col-4">
									<input id="ee_uf" name="ee_uf" type="text" placeholder="Estado" required> 
								</div>
							</div>
							
							<div class="address">
								<input id="ee_complemento" name="ee_complemento" type="text" placeholder="Complemento (casa, apartamento, etc)" required>
							</div>

							<div class="address">
								<input id="ee_ponto_referencia" name="ee_ponto_referencia" type="text" placeholder="Referência (Mercadinho Silva)" required>
							</div>
        			 	</div>
        			</div>

					<br>
					<h6>Documentos:</h6>

					<label class="erro">Deseja encaminhar agora as fotos/cópias dos seus documentos?
						<input name="copia_doc" value="sim_d" type="radio">    <small><b>SIM</b></small> 
						<input name="copia_doc" value="nao" type="radio">    <small><b>NÃO</b></small> 
					</label>

					<div id="copia_doc">
        			 	<div id="sim_d">

						<!-- Doc. CPF -->
						<br>
				       	<p style="color: #3498db;">
				       		Por gentileza nos encaminhe as fotos dos seguintes documentos:<br> <b>CPF</b>, <b>RG</b> (frente e verso) e <b>Comprovante de Residência</b> 
				       		(com máximo 90 dias de postagem).</p><br>
						
						<h6>Dica:</h6>
						<small>
							<b>1 - Tire as fotos do seu celular ou webcam do seu computador caso possua. <br> 
							2 - Clique no botão ESCOLHER DOCUMENTOS selecione as imagens/foto dos documentos. <br>
							3 - Clique no botão ABRIR. <br>
							4 - Pronto, simples não? Agora é só finalizar seu cadastro! Clique em FINALIZAR CADASTRO  <br>
						
				       	</small>
						
        			 	<input id="file" name="file-1[]" type="file"  class="inputfile" data-multiple-caption="  {count} arquivos selecionados" multiple accept="image/*" />
        			 	<label for="file"><span class="fa fa-cloud-upload"></span>   ESCOLHER DOCUMENTOS</label>
					
        			 	</div>
        			</div>
		
					<br>
					<input name="btn-cadastrar" class="btn bg-primary" type="submit" value="FINALIZAR CADASTRO">
				</form>
			</div>

			<aside class="col-5">
				<div class="prerequisitos">
					<h6 class="top-prerequisitos">Porque pedimos isso:</h6>

					<ul>
						<li>Você receberá na sua casa um mostruário contendo mais de 100 peças em semijoias totalmente em consignação, você não irá pagar nada por ele, 
						não será necessário passar cartão ou número de conta bancária, nada disso, precisamos apenas conferir seus dados cadastrais e endereço, 
						para que se estabeleça uma relação de confiança entre as partes.
						</li>

						<li><h6>Dúvidas:</h6>
							<a class="a-default" href="#"><b>Clique aqui</b></a> ou entre em contatos pelos nossos canais de <a class="a-default" href="#"><b>atendimento</b></a>.
						</li>

						<li>
							<span class="fa fa-phone"></span>  0800 603 1300<br>
							<span class="fa fa-whatsapp" aria-hidden="true"></span>  (41) 988 338 535<br>
							<span class="fa fa-envelope"></span>  sac@ralifla.com.br<br>
						</li>
					</ul>
								
					
				</div>
			</aside>
		</div>

	</section>
</main>

<?php session_destroy(); get_footer(); ?>