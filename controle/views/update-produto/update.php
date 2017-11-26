<!DOCTYPE html>
<html>
<?php 
	require_once "../default/inc-head.php";
?>
<body>
	<?php 
		require_once "../default/inc-header.php";
	?>
	<section class="inserir-content container">
		<div class="title-page">
			<h1>Atualizar Produto</h1>
		</div>
		<div class="scroll">
			<?php 

				require_once "../../../class/Sql.php";
				require_once "../../../class/Produtos.php";
				$conn = new Sql();
				$crud = new Produtos();

				$select = $crud->selectDelete();
				echo '<table class="table-content">';
					echo '<thead>';
						echo '<tr class="head-table">';
							echo '<th class="content-head">ID</th>';
							echo '<th class="content-head">Nome</th>';
							echo '<th class="content-head">Preço</th>';
							echo '<th class="content-head">Caminho Imagem</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
						foreach ($select as $linha) {
							echo '<tr class="body-table">';
								foreach ($linha as $value) {
									echo '<td class="content-body">' . $value . '</td>';
								}
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';
			?>
		</div>
		<form method="POST" id="updateTarget" class="form-margin" action="../../controller/Update.php">
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<input class="form-control" type="text" name="id" placeholder="ID do Produto">
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<input class="form-control" type="text" name="nome" placeholder="Nome do Produto">
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<input class="form-control" type="number" name="preco" placeholder="Preço do Produto">
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<a href="javascript:void(0)" class="btn-adicionar add-atualizar" name="del">Atualizar</a>
				</div>
			</div>
		</form>
	</section>
	<!-- <?php 
		// require_once "../default/inc-footer.php";
	?> -->
	<?php 
		require_once "../default/inc-script.php";
	?>
</body>
</html>