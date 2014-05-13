	<?php 

		$conexao = mysqli_connect("127.0.0.1", "root", "123456", "WD43");
		$dados   = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $_GET[id]");
		$produto = mysqli_fetch_array($dados);

		$cabecalho_title = $produto["nome"];
		$cabecalho_css = '<link rel="stylesheet" href="css/produto.css">'; 
		include("cabecalho.php"); 
	?>
	<div class="produto-back">
		<div class="container">
			<div class="produto">
				<h1><?= $produto["nome"] ?></h1>
				<p>por apenas <?= $produto["preco"] ?></p>

				<form action="checkout.php" method="POST">
					<input type="hidden" name="id" value="<?= $produto["id"] ?>">
					<input type="hidden" name="nome" value="<?= $produto["nome"] ?>">
					<input type="hidden" name="preco" value="<?= $produto["preco"] ?>">
					<div class="fb-like" data-href="http://mirrorfashion.net/loja"
						data-send="false" data-layout="box_count"
						data-width="58" data-show-faces="false">
					</div>

					<fieldset class="cores">
						<legend>Escolha a cor:</legend>

						<input type="radio" name="cor" value="verde" id="verde" checked>
						<label for="verde">
							<img src="img/produtos/foto<?= $produto["id"] ?>-verde.png" alt="verde">
						</label> 

						<input type="radio" name="cor" value="rosa" id="rosa">
						<label for="rosa">
							<img src="img/produtos/foto<?= $produto["id"] ?>-rosa.png" alt="rosa">
						</label>

						<input type="radio" name="cor" value="azul" id="azul">
						<label for="azul">
							<img src="img/produtos/foto<?= $produto["id"] ?>-azul.png" alt="azul">
						</label>
					</fieldset>

					<fieldset class="tamanhos">
						<legend>Escolha o tamanho:</legend>

						<input type="range" min="36" max="46" value="42" step="2" name="tamanho" id="tamanho">
						<output for="tamanho" name="valortamanho">42</output>
					</fieldset>

					<input type="submit" class="comprar" value="Comprar">
				</form>
			</div>
			<div class="detalhes">
				<h2>Detalhes do produto</h2>

				<p><?= $produto["descricao"] ?></p>

				<table>
					<thead>
						<tr>
							<th>Característica</th>
							<th>Detalhe</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Modelo</td>
							<td>Cardigã 7845</td>
						</tr>
						<tr>
							<td>Material</td>
							<td>Algodão e poliester</td>
						</tr>
						<tr>
							<td>Cores</td>
							<td>Azul, Rosa e Verde</td>
						</tr>
						<tr>
							<td>Lavagem</td>
							<td>Lavar a mão</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include("rodape.php"); ?>
	<script src="js/produto.js"></script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "http://connect.facebook.net/pt_BR/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</body>
</html>