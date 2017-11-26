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
			<h1>Desativar Produto</h1>
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
							echo '<th class="content-head">Caminho da Imagem</th>';
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
		<form method="POST" id="deleteTarget" class="desativar" action="../../controller/Delete.php">
			<div class="form-group row justify-content-center">
				<div class="col-sm-6">
					<input type="number" class="form-control " name="id" placeholder="Digite o ID para desativar um Fornecedor">
				</div>
				<div class="col-sm-2">
					<a href="javascript:void(0)" class="btn-adicionar add-delete" name="del">Desativar</a>
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