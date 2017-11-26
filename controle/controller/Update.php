<?php 

	require_once "../../config.php";
	$conn = new Sql();
	$crud = new Produtos();

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$cnpj = $_POST['preco'];

	$crud->setIdProduto($id);
	$crud->setNomeProduto($nome);
	$crud->setPrecoProduto($cnpj);

	echo $id.'<br>';
	echo $nome.'<br>';
	echo $cnpj.'<br>';

	$update = $crud->update($id);
	header('Location:../views/update-produto/update.php');