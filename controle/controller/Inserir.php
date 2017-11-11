<?php 
	require_once "../../config.php";
	$conn = new Sql();
	$crud = new Produtos();

	if(isset($_POST['nomeProduto']))
	{
		$statusProduto = $_POST['statusProduto'];
		$nomeProduto = $_POST['nomeProduto'];
		$precoProduto = $_POST['valorProduto'];
		$categoriaProduto = $_POST['categoriaProduto'];
		$promoProd = $_POST['promoProd'];
		$caminhoImagem = $_POST['caminhoImg'];

		$crud->setData($statusProduto, $promoProd ,$nomeProduto, $precoProduto, $categoriaProduto, $caminhoImagem);
	}

	if(empty($statusProduto) || empty($nomeProduto) || empty($precoProduto) || empty($categoriaProduto) ||
		empty($caminhoImagem) || empty($promoProd))
	{
		echo '<h1 style="display: block; widht: 100%; text-align: center;">Campos vazio, preecha com dados válidos</h1>';
		echo '<a href="../views/insert-produto/insert-view.php" style="display: block; width: 100%; text-align: center; font-size: 20px;">Voltar</a>';
	}
	else
	{
		$statusProduto = $_POST['statusProduto'];
		$crud->setStatusProduto($statusProduto);
		$insert = $crud->insert();

		header("Location: ../views/insert-produto/insert-view.php");
	} 