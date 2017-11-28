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

		if(isset($_GET['action']) && $_GET['action'] == 'less')
		{
			$idProd = $_GET['id'];
			$_SESSION['itens'][$idProd] -= 1;
			if($_SESSION['itens'][$idProd] <= 0)
			{
				unset($_SESSION['itens'][$idProd]);
			}
		}

		if(isset($_GET['action']) && $_GET['action'] == 'add')
		{
			$idProd = $_GET['id'];
			$_SESSION['itens'][$idProd] += 1;
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
			$total = 0;
			foreach ($_SESSION['itens'] as $produtos => $quantidade) {
				$stmt = $conn->query('SELECT * FROM produto WHERE idProduto = :ID', array(
					':ID' => $produtos
				));
	        	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        	foreach ($result as $value) {
					if($value['promoProd'] == 1)
					{
						$valor = $value['precoProduto'] * 0.10;
						$resultTotal = $value['precoProduto'] - $valor;
						// echo $value['precoProduto'];
					}

					else if($value['promoProd'] == 2)
					{
						$valor = $value['precoProduto'] * 0.20;
						$resultTotal = $value['precoProduto'] - $valor;
						// echo $value['precoProduto'];
					}

					else if($value['promoProd'] == 3)
					{
						$valor = $value['precoProduto'] * 0.30;
						$resultTotal = $value['precoProduto'] - $valor;
						// echo $value['precoProduto'];
					}
					else
					{
						// echo $value['precoProduto'];
						$resultTotal = $value['precoProduto'];
					}
					$total = $total + $resultTotal;
				}
			}

			$totalPrice = $total;
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
					<a href="detalhe-prod.php?action=less&id=<?php echo $value['idProduto']; ?>" class="btn-less">-</a>
					<p class="quantidade price"><?php echo $quantidade; ?></p>
					<a href="detalhe-prod.php?action=add&id=<?php echo $value['idProduto']; ?>" class="btn-more">+</a>
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
		<div class="container">
			<h2>Total: R$ <?php echo number_format($totalPrice, 2, ',', '.') ?></h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="comprar col-sm-6">
					<a href="boleto_itau.php?total=<?php echo $totalPrice ?>" class="btn-finalizar">Finalizar compra</a>
				</div>
				<div class="comprar col-sm-6">
					<a href="index.php" class="btn-comprar float-right">Continue comprando</a>
				</div>
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