<?php 

	class Produtos extends Sql
	{
		private $idProduto;
		private $statusProduto;
		private $nomeProduto;
		private $precoProduto;
		private $categoriaProduto;
		private $caminhoImagem;
		private $promoProd;


	
	    public function getIdProduto()
	    {
	        return $this->idProduto;
	    }

	    public function setIdProduto($idProduto)
	    {
	        $this->idProduto = $idProduto;
	    }

	    public function getStatusProduto()
	    {
	        return $this->statusProduto;
	    }

	    public function setStatusProduto($statusProduto)
	    {
	        $this->statusProduto = $statusProduto;

	        return $this;
	    }

	    public function getNomeProduto()
	    {
	        return $this->nomeProduto;
	    }

	    public function setNomeProduto($nomeProduto)
	    {
	        $this->nomeProduto = $nomeProduto;

	        return $this;
	    }

	    public function getPrecoProduto()
	    {
	        return $this->precoProduto;
	    }

	    public function setPrecoProduto($precoProduto)
	    {
	        $this->precoProduto = $precoProduto;

	        return $this;
	    }

	    public function getCategoriaProduto()
	    {
	        return $this->categoriaProduto;
	    }

	    public function setCategoriaProduto($categoriaProduto)
	    {
	        $this->categoriaProduto = $categoriaProduto;

	        return $this;
	    }

	    public function getCaminhoImagem()
	    {
	        return $this->caminhoImagem;
	    }

	    public function setCaminhoImagem($caminhoImagem)
	    {
	        $this->caminhoImagem = $caminhoImagem;

	        return $this;
	    }

	    public function getPromoProd()
	    {
	        return $this->promoProd;
	    }

	    public function setPromoProd($promoProd)
	    {
	        $this->promoProd = $promoProd;
	    }

	    public function setData($statusProduto, $promoProd ,$nomeProduto, $precoProduto, $categoriaProduto, $caminhoImagem)
	    {
	    	$this->setStatusProduto($statusProduto);
	    	$this->setNomeProduto($nomeProduto);
	    	$this->setPrecoProduto($precoProduto);
	    	$this->setCategoriaProduto($categoriaProduto);
	    	$this->setCaminhoImagem($caminhoImagem);
	    	$this->setPromoProd($promoProd);
	    }

	    public function insert()
	    {
	        $sql = new Sql();
	        $sql->query('INSERT INTO produto (statusProduto, promoProd, nomeProduto, precoProduto, categoriaProduto, caminhoImagem) VALUES (:STATUS, :PROMO, :NOME, :PRECO, :CATEGORIA, :CAMINHO)', array(
	                ':STATUS' => $this->getStatusProduto(),
	                ':PROMO' => $this->getPromoProd(),
	                ':NOME' => $this->getNomeProduto(),
	                ':PRECO' => $this->getPrecoProduto(),
	                ':CATEGORIA' => $this->getCategoriaProduto(),
	                ':CAMINHO' => $this->getCaminhoImagem()
            	));

	    }

	    public function select()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT nomeProduto, precoProduto, caminhoImagem, promoProd FROM produto");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectPromo()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT nomeProduto, precoProduto, caminhoImagem, promoProd FROM produto WHERE promoProd = 'v'");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectCordas()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT nomeProduto, precoProduto, caminhoImagem, categoriaProduto FROM produto WHERE categoriaProduto = 'cordas'");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectPercu()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT nomeProduto, precoProduto, caminhoImagem, categoriaProduto FROM produto WHERE categoriaProduto = 'percussao'");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }
	}

?>