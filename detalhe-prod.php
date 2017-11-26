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
		session_start();
		if(!isset($_SESSION['itens']))
		{
			$_SESSION['itens'] = array();
		}

		if(isset($_GET['action']) && $_GET['action'] == 'remover')
		{
			$idProd = $_GET['id'];
			unset($_SESSION['itens'][$idProd]);
		}

		if(isset($_GET['add']) && $_GET['add'] == 'carrinho')
		{
			// ADICIONA NO CARRINHO
			$idProd = $_GET['id'];
			if(!isset($_SESSION['itens'][$idProd]))
			{
				$_SESSION['itens'][$idProd] = 1;
			}
			else
			{
				$_SESSION['itens'][$idProd] += 1;
			}
		}

		// EXIBE O CARRINHO
		if (count($_SESSION['itens']) != 0)
		{
			$conn = new Sql();
			foreach ($_SESSION['itens'] as $produtos => $quantidade) {
				$stmt = $conn->query('SELECT * FROM produto WHERE idProduto = :ID', array(
					':ID' => $produtos
				));
	        	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	        	
			}    
		}
	?>
	<section class="section container interno">
		<h1 class="title border-detail">Carrinho de <span class="strong-text">Produto</span></h1>
		<?php 
			if(count($_SESSION['itens']) == 0)
			{
				echo '<h2 style="text-align: center; margin-top: 50px;">Carrinho vazio <br><a href="index.php">Adicionar Produtos</a></h2>';
			}
		?>
		<?php 
			$conn = new Sql();
			foreach ($_SESSION['itens'] as $produtos => $quantidade) { 
				$stmt = $conn->query('SELECT * FROM produto WHERE idProduto = :ID', array(
					':ID' => $produtos
				));
	        	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			?>
		<?php foreach ($result as $value) {?>
		<?php $id = $value['idProduto']; ?>
		<div class="image-prod content-carrinho row">
			<div class="col-sm-2">
				<figure class="img-prod img-carrinho">
					<img src="<?php echo $value['caminhoImagem'] ?>">
				</figure>
			</div>
			<div class="col-sm">
				<div class="content-image carrinho-image">
					<h1 class="desc-prod">
						COD. <?php echo $value['idProduto']; ?>-PTR | 
						<?php echo $value['nomeProduto']; ?>
					</h1>
					<div class="info-price">
						<p class="price">Preço: 
							R$ <span class="strong-text">
								<?php 
									$total = 0;
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
			</div>
			<div class="col-sm">
				<div class="qtde-prod">
					<p class="quantidade price"><?php echo $quantidade; ?></p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="remover">
					<a href="detalhe-prod.php?action=remover&id=<?php echo $value['idProduto']; ?>">Remover Item</a>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
		<div class="comprar col-sm">
			<a href="boleto_itau.php" class="btn-comprar">Finalizar compra</a>
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