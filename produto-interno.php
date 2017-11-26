<!DOCTYPE html>
<html>
<?php
	include "inc-head.php";
?>
<body>
	<?php 
		include "inc-header.php";
	?>
	<?php 
		require_once "class/Sql.php";
		require_once "class/Produtos.php";
		$conn = new Sql();
		$crud = new Produtos();
	?>
	<section class="section container interno">
		<?php 
			if(isset($_GET['tempId']))
			{
				$id = $_GET['tempId'];
				$selectProd = $crud->selectProd($id);
				// print_r($selectProd);
			}
			else
			{
				echo 'fail';
			}
		?>
		<?php foreach ($selectProd as $value) {?>
		<?php $idProd = $value['idProduto'] ?>
		<h1 class="title border-detail">COD <?php echo $value['idProduto']; ?>-PRT <span class="strong-text"><?php echo $value['nomeProduto']; ?></span></h1>
		<div class="image-prod row">
			<div class="col-sm-4">
				<figure class="img-prod">
					<img src="<?php echo $value['caminhoImagem'] ?>">
				</figure>
			</div>
			<div class="col-sm">
				<div class="content-image">
					<p class="desc-prod">
						<?php echo $value['descProduto']; ?>
					</p>
					<div class="info-price">
						<p class="price">
							R$ <span class="strong-text">
								<?php 
									if($value['promoProd'] == 1)
									{
										$promo = $value['precoProduto'] * 0.1;
										$value['precoProduto'] = $value['precoProduto'] - $promo;
										echo number_format($value['precoProduto'], 2, ',', '.');
									}
									else if($value['promoProd'] == 2)
									{
										$promo = $value['precoProduto'] * 0.2;
										$value['precoProduto'] = $value['precoProduto'] - $promo;
										echo number_format($value['precoProduto'], 2, ',', '.');
									}
									else if($value['promoProd'] == 3)
									{
										$promo = $value['precoProduto'] * 0.3;
										$value['precoProduto'] = $value['precoProduto'] - $promo;
										echo number_format($value['precoProduto'], 2, ',', '.');
									}
									else
									{
										echo number_format($value['precoProduto'], 2, ',', '.');
									}
								?>
							</span>
							<?php 
								if($value['promoProd'] == 1)
									echo '10% off';
								else if($value['promoProd'] == 2)
									echo "20% off";
								else if($value['promoProd'] == 3)
									echo "30% off";
							?>
						</p>
						<p class="parcel">ou 12X de R$ <span class="strong-text"> <?php $parcelado = ($value['precoProduto'] / 12);
								echo number_format($parcelado, 2, ',', ' ');
							 ?></span></p>
					</div>
				</div>
				<div class="pagamento">
					<label class="pag">Boleto</label><input type="radio" value="boleto" name="pagamento">
				</div>
				<div class="comprar">
					<a href="detalhe-prod.php?add=carrinho&id=<?php echo $idProd ?>" class="btn-comprar">+ Carrinho</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</section>
	<?php
		include "inc-footer.php";
	?>
	<?php
		include "inc-script.php";
	?>
</body>
</html>