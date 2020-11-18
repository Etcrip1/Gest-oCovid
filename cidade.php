<?php
	require_once 'conexao.php';
	class cidade{
		private $idcidade;
		private $nome;
		private $idestado;
		private $quantosalunos;
		private $quantosfuncionarios;

		
		public function setidcidade($idcidade){
			$this->idcidade=$idcidade;
		}
		public function getidcidade(){
			return $this->idcidade;
		}
		
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function getNome(){
			return $this->nome;
		}
		
		public function setidestado($idestado){
			$this->idestado=$idestado;
		}
		public function getidestado(){
			return $this->idestado;
		}
		
		public function setquantosalunos($quantosalunos){
			$this->quantosalunos=$quantosalunos;
		}
		public function getquantosalunos(){
			return $this->quantosalunos;
		}
		
		public function setquantosfuncionarios($quantosfuncionarios){
			$this->quantosfuncionarios=$quantosfuncionarios;
		}
		public function getquantosfuncionarios(){
			return $this->quantosfuncionarios;
		}
		
		

		public function imprime(){
			echo "idcidade=".$this->idcidade."<br>";
			echo "nome=".$this->nome."<br>";
			echo "idestado=".$this->idestado."<br>";
			echo "quantosalunos=".$this->quantosalunos."<br>";
			echo "quantosfuncionarios=".$this->quantosfuncionarios."<br>";
		}
		public function inserir(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"insert into cidade(nome,idestado,quantosalunos,quantosfuncionarios) ".
			"values(:nome,:idestado,:quantosalunos,:quantosfuncionarios)");
			$st->bindValue(":nome",$this->getNome());
			$st->bindValue(":idestado",$this->getidestado());
			$st->bindValue(":quantosalunos",$this->getquantosalunos());
			$st->bindValue(":quantosfuncionarios",$this->getquantosfuncionarios());
			return $st->execute();	
		}
		public function alterar(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"update cidade set nome=:nome,idestado=:idestado,quantosalunos=:quantosalunos,quantosfuncionarios=:quantosfuncionarios".
			" where idcidade=:idcidade");
			$st->bindValue(":idcidade",$this->getidcidade());
			$st->bindValue(":nome",$this->getNome());
			$st->bindValue(":idestado",$this->getidestado());
			$st->bindValue(":quantosalunos",$this->getquantosalunos());
			$st->bindValue(":quantosfuncionarios",$this->getquantosfuncionarios());
			return $st->execute();	
		}
		public function apagar(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"delete from cidade where idcidade=:idcidade");
			$st->bindValue(":idcidade",$this->getidcidade());
			return $st->execute();	
		}
		public function buscarTodos(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select * from cidade order by nome");
			$st->execute();	
			return $st->fetchAll();
		}	

		public function buscarTodos2(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select c.idcidade, c.nome as cidadenome, e.nome as estado, c.quantosalunos, c.quantosfuncionarios from cidade c inner join estado e on c.idestado = e.idestado order by c.nome");
			$st->execute();	
			return $st->fetchAll();
		}	

		public function buscaridcidade(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select * from cidade where idcidade=:idcidade");
			$st->bindValue(":idcidade",$this->getidcidade());
			$st->execute();	
			return $st->fetch();
		}	
		
	}
?>