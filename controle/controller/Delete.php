<?php 

	require_once "../../config.php";
	$conn = new Sql();
	$crud = new Produtos();

	if(isset($_POST['id']))
	{
		$idProduto = $_POST['id'];

		$crud->setIdProduto($idProduto);
	}

	if(empty($idProduto))
	{
		echo "Campo Vazio, digite um ID Válido";
	}
	else
	{
		$crud->delete($idProduto);
		header('Location:../views/delete-produto/delete.php');
	}