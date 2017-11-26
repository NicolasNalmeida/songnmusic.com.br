<!DOCTYPE html>
<html>
<?php 
	include "../default/inc-head.php" 
 ?>
<body>
<?php 
	include "../default/inc-header.php" 
 ?>

<section class="inserir-content container">
	<div class="title-page">
			<h1>Adicionar Produto</h1>
		</div>
		<form method="POST" id="inserirTarget" action="../../controller/Inserir.php" enctype="multipart/form-data">
			<input type="hidden" name="statusProduto" value="1">
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<input class="form-control" type="text" name="nomeProduto" placeholder="Nome do Produto" required>
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-4">
					<input class="form-control" type="text" name="valorProduto" placeholder="Valor do Produto" required>
				</div>
				<div class="col-sm-4">
					<select class="form-control" name="categoriaProduto">
						<option value="" disabled selected>Categoria</option>
						<option value="cordas">Cordas</option>
						<option value="percussao">Percussão</option>
						<option value="teclas">Teclas</option>
						<option value="sopro">Sopro</option>
						<option value="equipamentos">Equipamentos</option>
					</select>
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-4">
					<select class="form-control" name="promoProd">
						<option value="" disabled selected>Promoção</option>
						<option value="f">Sem promoção</option>
						<option value="1">10% de desconto</option>
						<option value="2">20% de desconto</option>
						<option value="3">30% de desconto</option>
					</select>
				</div>
				<div class="col-sm-4">
					<input type="file" class="form-control" name="caminhoImg">
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<textarea class="form-control" name="descProd" rows="8" style="resize: none;" placeholder="Descrição do Produto"></textarea>
				</div>
			</div>
			<div class="form-group row justify-content-sm-center">
				<div class="col-sm-8">
					<a href="javascript:void(0)" class="btn-adicionar add-insert" name="add">Adicionar</a>
				</div>
			</div>	
		</form>
</section>

<?php 
	include "../default/inc-footer.php" 
 ?>

 <?php 
	include "../default/inc-script.php" 
 ?>
</body>
</html>