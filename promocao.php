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
		<h1 class="title border-detail">Promoção do mês: <span class="strong-text">TAGIMA</span></h1>
		<div class="main-produto">
			<?php 
				require_once "class/Sql.php";
				require_once "class/Produtos.php";
				$conn = new Sql();
				$crud = new Produtos();

				$selectAll = $crud->selectPromo();
			?>
			<ul class="list-prod clearfix">
			<?php foreach ($selectAll as $value) {?>
				<li class="item-prod">
					<div class="content-prod">
						<div class="before-filter">
							<figure class="filter-prod">
								<img src="<?php echo $value['caminhoImagem']?>">
							</figure>
							<a href="javascript:void(0)">
								<div class="cart">
									<p>+</p>
								</div>
							</a>
						</div>
						<figcaption class="description-prod">
							<p class="greatText strong-text"><?php echo $value['nomeProduto']; ?></p>
							<p class="price">R$<span class="strong-text price-prod"><?php
							 $result = ($value['precoProduto'] * 0.10);
							 $value['precoProduto'] = $value['precoProduto'] - $result;
							 echo number_format($value['precoProduto'], 2, ',', '.'); ?></span> 10% off</p>
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
		include "inc-footer.php";
	?>
	<?php
		include "inc-script.php";
	?>
</body>
</html>