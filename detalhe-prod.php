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
			if(isset($_GET['idProduto']))
			{
				$id = $_GET['idProduto'];
				$selectProd = $crud->selectProd($id);
				// print_r($selectProd);
			}
			else
			{
				echo 'fail';
			}
		?>
		<?php foreach ($selectProd as $value) {?>
		<?php $id = $value['idProduto']; ?>
		<h1 class="title border-detail">Detalhe(s) do(s) <span class="strong-text">Produto(s)</span></h1>
		<div class="image-prod row">
			<div class="col-sm-4">
				<figure class="img-prod">
					<img src="<?php echo $value['caminhoImagem'] ?>">
				</figure>
			</div>
			<div class="col-sm">
				<div class="content-image">
					<h1 class="desc-prod">
						COD. <?php echo $value['idProduto']; ?>-PTR | 
						<?php echo $value['nomeProduto']; ?>
					</h1>
					<p class="desc-prod">
						<?php echo $value['descProduto']; ?>
					</p>
					<div class="info-price">
						<p class="price">Preço: 
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
					</div>
				</div>
				<div class="pagamento">
					<p class="parcel">BOLETO</p>
				</div>
				<div class="comprar">
					<a href="boleto_itau.php?idProduto=<?php echo $id ?>" class="btn-comprar">Finalizar</a>
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