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
		private $descProduto;

	    public function getIdProduto()
	    {
	        return $this->idProduto;
	    }

	    public function setIdProduto($idProduto)
	    {
	        $this->idProduto = $idProduto;
	    }

	    public function getDescProduto()
	    {
	        return $this->descProduto;
	    }

	    public function setDescProduto($descProduto)
	    {
	        $this->descProduto = $descProduto;
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

	    public function setData($statusProduto, $promoProd, $descProduto ,$nomeProduto, $precoProduto, $categoriaProduto, $caminhoImagem)
	    {
	    	$this->setStatusProduto($statusProduto);
	    	$this->setNomeProduto($nomeProduto);
	    	$this->setDescProduto($descProduto);
	    	$this->setPrecoProduto($precoProduto);
	    	$this->setCategoriaProduto($categoriaProduto);
	    	$this->setCaminhoImagem($caminhoImagem);
	    	$this->setPromoProd($promoProd);
	    }

	    public function insert()
	    {
	        $sql = new Sql();
	        $sql->query('INSERT INTO produto (statusProduto, promoProd, descProduto, nomeProduto, precoProduto, categoriaProduto, caminhoImagem) VALUES (:STATUS, :PROMO, :DESCRICAO, :NOME, :PRECO, :CATEGORIA, :CAMINHO)', array(
	                ':STATUS' => $this->getStatusProduto(),
	                ':PROMO' => $this->getPromoProd(),
	                ':DESCRICAO' => $this->getDescProduto(),
	                ':NOME' => $this->getNomeProduto(),
	                ':PRECO' => $this->getPrecoProduto(),
	                ':CATEGORIA' => $this->getCategoriaProduto(),
	                ':CAMINHO' => $this->getCaminhoImagem()
            	));

	    }

	    public function select()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, promoProd FROM produto WHERE statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectFilter($pesquisa)
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, promoProd FROM produto WHERE statusProduto = 1 AND (nomeProduto LIKE '%$pesquisa%')");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectDelete()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem FROM produto WHERE statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectPromo()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, promoProd FROM produto WHERE (promoProd = 1 OR promoProd = 2 OR promoProd = 3) AND statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectCordas()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, categoriaProduto, promoProd FROM produto WHERE categoriaProduto = 'cordas' AND statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectPercu()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, categoriaProduto, promoProd FROM produto WHERE categoriaProduto = 'percussao' AND statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectTeclas()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, categoriaProduto, promoProd FROM produto WHERE categoriaProduto = 'teclas' AND statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectSopro()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, categoriaProduto, promoProd FROM produto WHERE categoriaProduto = 'sopro' AND statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectEquip()
	    {
	        $sql = new Sql();
	        $stmt = $sql->query("SELECT idProduto, nomeProduto, precoProduto, caminhoImagem, categoriaProduto, promoProd FROM produto WHERE categoriaProduto = 'equipamentos' AND statusProduto = 1");

	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }

	    public function selectProd($idProduto)
	    {
	        $sql = new Sql();
	        $stmt = $sql->query('SELECT idProduto, nomeProduto, descProduto, precoProduto, caminhoImagem, promoProd FROM produto WHERE idProduto = ' . $idProduto);
	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $result;
	    }


	    public function carrinhoProd($idProduto)
	    {
	    	$sql = new Sql();
	        $stmt = $sql->query('SELECT idProduto, nomeProduto, descProduto, precoProduto, caminhoImagem, promoProd FROM produto WHERE idProduto = ' . $idProduto);
	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
	    }

	    public function delete($id)
	    {
	        $sql = new Sql();
	        $this->setIdProduto($id);
	        $stmt = $sql->query("UPDATE produto SET statusProduto = 0 WHERE idProduto = :ID", array(
	            ':ID' => $this->getIdProduto()
	        ));
	    }

	    public function update($id)
	    {
	        $sql = new Sql();
	        $this->setIdProduto($id);
	        $stmt = $sql->query("UPDATE produto SET nomeProduto = :NOME, precoProduto = :PRECO WHERE idProduto = :ID", array(
	                ':ID' => $this->getIdProduto(),
	                ':NOME' => $this->getNomeProduto(),
	                ':PRECO' => $this->getPrecoProduto()
            ));
	    }
	}

?>