<?php 
	require_once "../../config.php";
	$conn = new Sql();
	$crud = new Produtos();

	if(isset($_POST['nomeProduto']))
	{
		$statusProduto = $_POST['statusProduto'];
		$nomeProduto = $_POST['nomeProduto'];
		$precoProduto = $_POST['valorProduto'];
		$descProd = $_POST['descProd'];
		$categoriaProduto = $_POST['categoriaProduto'];
		$promoProd = $_POST['promoProd'];
		$caminhoImagem = $_FILES['caminhoImg'];

		if($_SERVER["REQUEST_METHOD"] === "POST")
		{
			$caminhoImagem = $_FILES['caminhoImg'];

			if($caminhoImagem["error"])
			{
				throw new Exception("Error: " . $caminhoImagem["error"]);
			}

			$dirUploads = "../../assets/imagem/";

			if(!is_dir($dirUploads))
			{
				mkdir($dirUploads);
			}

			if(move_uploaded_file($caminhoImagem["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $caminhoImagem["name"]))
			{
				echo "Upload realizado com Sucesso";
				$destinoFinal = 'assets' . '/' . 'imagem' . '/' . $caminhoImagem["name"];
			}
			
			else
			{
				throw new Exception("Error: Não foi possível realizar o upload.");
			}
			
		}

		$crud->setData($statusProduto, $promoProd, $descProd ,$nomeProduto, $precoProduto, $categoriaProduto, $destinoFinal);
	}

	if(empty($statusProduto) || empty($nomeProduto) || empty($descProd) || empty($precoProduto) || empty($categoriaProduto) ||
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