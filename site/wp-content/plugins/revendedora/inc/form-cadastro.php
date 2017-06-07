<?php  ?>
<form>
	<div>
		<label for="cpf">CPF :</label>
		<input type="text" name="cpf" id="cpf" placeholder="000000000-00" required>
	</div>
	<div>
		<label for="nome">Nome :</label>
		<input type="text" name="nome" placeholder="Nome e Sobrenome" required>
	</div>
	<div>
		<label for="data_nascimento">Data de Nascimento:</label>
		<input type="date" idname"data_nascimento" placeholder="dd/mm/aaaa" required>
	</div>
	<div>
		<label for="sexo">Sexo:</label>
		<label><input type="radio" name="sexo" value="FEMININO">Feminino</label>
		<label><input type="radio" name="sexo" value="MASCULINO">Masculino</label>
	</div>
	<div>
		<label for="estado_civil">Estado Civil:</label>
		<label><input type="radio" name="estado_civil" value="SOLTEIRA">Solteira</label>
		<label><input type="radio" name="estado_civil" value="CASADA">Casada</label>
		<label><input type="radio" name="estado_civil" value="DIVORCIADA">Divorciada</label>
		<label><input type="radio" name="estado_civil" value="VIUVA">Viúva</label>
		<label><input type="radio" name="estado_civil" value="AMASIADA">Amasiada/Mora Junto:</label>
	</div>
	<div>
		<label for="residencia">Residencia:</label>
		<label><input type="radio" name="residencia" value="PROPRIA">Própria</label>
		<label><input type="radio" name="residencia" value="ALUGADA">Alugada</label>
		<label><input type="radio" name="residencia" value="CEDIDA">Cedida</label>
		<label><input type="radio" name="residencia" value="PARENTES">Pais/Parentes</label>
	</div>
	<div>
		<label for="tel">Telefone :</label>
		<input type="tel" name="telefone" placeholder="(00)00000-0000" required>
	</div>
	<div>
		<label for="tel">Email :</label>
		<input type="email" name="email" placeholder="nome@dominio.com" required>
	</div>
	<div>
		<label for="cep">Endereço :</label>
		<input type="text" name="cep" placeholder="00000-000" required>
		<input type="numeric" name="numero" placeholder="Número" required>
		<input type="text" name="cidade" placeholder="Cidade" readonly required>
		<input type="text" name="estado" placeholder="Estado" readonly required>
	</div>
	<div>
		<input type="submit" id="send-first-step" value="Enviar">
	</div>
</form>
<?php  ?>