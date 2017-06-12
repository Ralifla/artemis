<?php  ?>
<form id="first-step">
	<div>
		<label for="cpf">CPF :</label>
		<input type="text" name="cpf" id="cpf" placeholder="000000000-00" required>
	</div>
	<div>
		<label for="nome">Nome :</label>
		<input type="text" name="nome" placeholder="Nome e Sobrenome" required>
	</div>
	<div class="msg-append">
		<label for="sexo">Sexo :</label>
		<select name="sexo">
			<option disabled="disabled" selected>--</option>
			<option value="FEMININO">Feminino</option>
			<option value="MASCULINO">Masculino</option>
		</select>
	</div>
	<div class="msg-append">
		<label for="estado_civil">Estado Civil :</label>
		<select name="estado_civil">
			<option disabled="disabled" selected>--</option>
			<option value="SOLTEIRA">Solteira</option>
			<option value="CASADA">Casada</option>
			<option value="DIVORCIADA">Divorciada</option>
			<option value="VIUVA">Viúva</option>
			<option value="AMASIADA">Amasiada/Mora Junto:</option>
		</select>
		<div class="parceiro" style="display:none;">
			<div>
				<label for="nome_parceiro">Nome do Parceiro:</label>
				<input type="text" name="nome_parceiro" placeholder="Nome e Sobrenome">
			</div>
			<div>
				<label for="telefone_parceiro">Telefone :</label>
				<input type="tel" name="telefone_parceiro" placeholder="(00)00000-00000" required>
			</div>
		</div>
	</div>
	<div class="msg-append">
		<label for="residencia">Residencia :</label>
		<select name="residencia">
			<option disabled="disabled" selected>--</option>
			<option value="PROPRIA">Própria</option>
			<option value="ALUGADA">Alugada</option>
			<option value="CEDIDA">Cedida</option>
			<option value="PARENTES">Pais/Parentes</option>
		</select>
	</div>
	<div>
		<label for="data_nascimento">Data de Nascimento :</label>
		<input type="text" name="data_nascimento" placeholder="dd/mm/aaaa" required>
	</div>
	<div>
		<label for="telefone">Telefone :</label>
		<input type="tel" name="telefone" placeholder="(00)00000-00000" required>
	</div>
	<div>
		<label for="email">Email :</label>
		<input type="email" name="email" placeholder="nome@dominio.com" required>
	</div>
	<div class="container-endereco">
		<div>
			<label for="cep">CEP :</label>
			<input type="text" name="cep" id="cep" placeholder="00000-00000" required>
		</div>
		<div>
			<label for="numero">Número :</label>
			<input type="numeric" name="numero" placeholder="Número" required>
		</div>
		<div>
			<label for="logradouro">Logradouro :</label>
			<input type="text" name="logradouro" placeholder="Rua" required>
		</div>
		<div>
			<label for="bairro">Bairro :</label>
			<input type="text" name="bairro" placeholder="Bairro" required>
		</div>
		<div>
			<label for="localidade">Cidade :</label>
			<input type="text" name="localidade" placeholder="Cidade" readonly required>
		</div>
		<div>
			<label for="uf">Estado :</label>
			<input type="text" name="uf" placeholder="Estado" readonly required>
		</div>
	</div>
	<div>
		<input type="submit" id="send-first-step" value="Enviar">
	</div>
</form>
<form id="second-step" style="display:none;">
	<h3>Dados Pessoais:</h3>
	<div>
		<label for="rg">RG :</label>
		<input type="text" name="rg"  placeholder="00000000-0" required>
	</div>
	<div>
		<label for="fone_residencial">Telefone Residencial :</label>
		<input type="tel" name="fone_residencial"  placeholder="(00)00000-00000" required>
	</div>
	<div>
		<label for="facebook">Usuário no Facebook :</label>
		<input type="text" name="facebook"  placeholder="Nome completo ou URL do perfíl" required>
	</div>
	<div class="referencias">
		<h4>Referências<span>(recomendado 3)</span></h4>
		<div class="container-referencia">
			<div>
				<label for="referencia_1_nome">Nome :</label>
				<input type="text" name="referencia_1_nome" id="referencia-1" placeholder="Nome Completo" required>
			</div>
			<div>
				<label for="referencia_1_parentesco">Parentesco :</label>
				<select name="referencia_1_parentesco"></select>
			</div>
			<div>
				<label for="referencia_1_fone">Telefone :</label>
				<input type="tel" name="referencia_1_fone" placeholder="(00)00000-00000" required>
			</div>
		</div>
		<span id="add-referencia">adicionar referencia</span>
	</div>
</form>
<?php  ?>