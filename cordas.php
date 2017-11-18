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
		<h1 class="title border-detail">Instrumentos de <span class="strong-text">Corda</span></h1>
		<div class="main-produto">
			<?php 
				require_once "class/Sql.php";
				require_once "class/Produtos.php";
				$conn = new Sql();
				$crud = new Produtos();

				$selectAll = $crud->selectCordas();
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
							<p class="price">R$<span class="strong-text price-prod"><?php echo number_format($value['precoProduto'], 2, ',', '.'); ?></span></p>
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
	<section class="section">
		<div class="content-promotion">
			<div class="photo-content">
				<div class="content-tagima">
					<p class="month-promotion">Promoção do mês</p>
					<img src="assets/imagem/logo-tagima.png" class="logo-tagima">
				</div>
				<img src="assets/imagem/promotion.jpg" class="img-photo">
			</div>
			<div class="text-content">
				<p class="subTitle text-promotion">Todos os instrumentos Tagima <br>com até 50% de desconto</p>
				<a href="promocao.php" class="subTitle btn-more">veja +</a>
			</div>
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