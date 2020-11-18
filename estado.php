<?php
	require_once 'conexao.php';
	class estado{
		private $idestado;
		private $nome;
		private $sigla;
		private $quantidadeescolas;
		private $capital;

		public function setidestado($idestado){
			$this->idestado=$idestado;
		}
		public function getidestado(){
			return $this->idestado;
		}
		
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function getNome(){
			return $this->nome;
		}
		
		public function setsigla($sigla){
			$this->sigla=$sigla;
		}
		public function getsigla(){
			return $this->sigla;
		}

		
		public function setquantidadeescolas($quantidadeescolas){
			$this->quantidadeescolas=$quantidadeescolas;
		}
		public function getquantidadeescolas(){
			return $this->quantidadeescolas;
		}
		
		public function setcapital($capital){
			$this->capital=$capital;
		}
		public function getcapital(){
			return $this->capital;
		}
		
		

		public function imprime(){
			echo "idestado=".$this->idestado."<br>";
			echo "nome=".$this->nome."<br>";
			echo "sigla=".$this->sigla."<br>";
			echo "quantidadeescolas=".$this->quantidadeescolas."<br>";
			echo "capital=".$this->capital."<br>";
		}
		public function inserir(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"insert into estado(nome,sigla,quantidadeescolas,capital) ".
			"values(:nome,:sigla,:quantidadeescolas,:capital)");
			$st->bindValue(":nome",$this->getNome());
			$st->bindValue(":sigla",$this->getsigla());
			$st->bindValue(":quantidadeescolas",$this->getquantidadeescolas());
			$st->bindValue(":capital",$this->getcapital());
			return $st->execute();	
		}
		public function alterar(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"update estado set nome=:nome,sigla=:sigla,quantidadeescolas=:quantidadeescolas,capital=:capital".
			" where idestado=:idestado");
			$st->bindValue(":idestado",$this->getidestado());
			$st->bindValue(":nome",$this->getNome());
			$st->bindValue(":sigla",$this->getsigla());
			$st->bindValue(":quantidadeescolas",$this->getquantidadeescolas());
			$st->bindValue(":capital",$this->getcapital());
			return $st->execute();	
		}
		public function apagar(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"delete from estado where idestado=:idestado");
			$st->bindValue(":idestado",$this->getidestado());
			return $st->execute();	
		}
		public function buscarTodos(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select * from estado order by nome");
			$st->execute();	
			return $st->fetchAll();
		}	
				public function buscaridestado(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select * from estado where idestado=:idestado");
			$st->bindValue(":idestado",$this->getidestado());
			$st->execute();	
			return $st->fetch();
		}	
		
	}
?>