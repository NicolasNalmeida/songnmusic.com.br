<!DOCTYPE html>
<html>
<?php
	include "inc-head.php";
?>
<body>
	<?php 
		include "inc-header.php";
	?>
	<section class="section container">
		<h1 class="title border-detail">Instrumentos de <span class="strong-text">Teclas</span></h1>
		<div class="main-produto">
			<?php 
				require_once "class/Sql.php";
				require_once "class/Produtos.php";
				$conn = new Sql();
				$crud = new Produtos();

				$selectAll = $crud->selectTeclas();
			?>
			<ul class="list-prod clearfix">
			<?php foreach ($selectAll as $value) {?>
				<?php $id = $value['idProduto']; ?>
				<li class="item-prod">
					<div class="content-prod">
						<div class="before-filter">
							<figure class="filter-prod">
								<img src="<?php echo $value['caminhoImagem']?>">
							</figure>
							<a href="produto-interno.php?tempId=<?php echo $id; ?>">
								<div class="cart">
									<p>+</p>
								</div>
							</a>
						</div>
						<figcaption class="description-prod">
							<p class="greatText strong-text"><?php echo $value['nomeProduto']; ?></p>
							<p class="price">
								R$<span class="strong-text price-prod">
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
							<p class="parcel">ou 12x de R$<span class="strong-text price-prod"><?php $parcelado = ($value['precoProduto'] / 12);
								echo number_format($parcelado, 2, ',', ' ');
							 ?></span></p>
						</figcaption>
					</div>
				</li>
			<?php } ?>
			</ul>	
		</div>
	</section>
	<?php 
		include 'inc-promotion.php';
	?>
	<?php
		include "inc-footer.php";
	?>
	<?php
		include "inc-script.php";
	?>
</body>
</html>