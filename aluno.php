<?php
	require_once 'conexao.php';
	class aluno{
		private $id;
		private $idfichamedica;
		private $idcidade;
		private $nome;
		private $ra;
		private $curso;
		private $telefone;
		
		
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}
		
		public function setidfichamedica($idfichamedica){
			$this->idfichamedica=$idfichamedica;
		}
		public function getidfichamedica(){
			return $this->idfichamedica;
		}
		
		
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
		
		public function setra($ra){
			$this->ra=$ra;
		}
		public function getra(){
			return $this->ra;
		}
		
		public function setcurso($curso){
			$this->curso=$curso;
		}
		public function getcurso(){
			return $this->curso;
		}
		
		
		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function imprime(){
			echo "id=".$this->id."<br>";
			echo "idfichamedica=".$this->idfichamedica."<br>";
			echo "idcidade=".$this->idcidade."<br>";
			echo "nome=".$this->nome."<br>";
			echo "ra=".$this->ra."<br>";
			echo "curso=".$this->curso."<br>";
			echo "telefone=".$this->telefone."<br>";
		}
		public function inserir(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"insert into aluno(nome,ra,curso,telefone,idfichamedica,idcidade) ".
			"values(:n,:ra,:c,:t,:ifm,:ic)");
			$st->bindValue(":n",$this->getNome());
			$st->bindValue(":ra",$this->getra());
			$st->bindValue(":c",$this->getcurso());
			$st->bindValue(":t",$this->getTelefone());
			$st->bindValue(":ifm",$this->getidfichamedica());
			$st->bindValue(":ic",$this->getidcidade());
			return $st->execute();	
		}
		public function alterar(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"update aluno set nome=:n,ra=:ra,curso=:c,telefone=:t,idfichamedica=:ifm,".
			"idcidade=:ic where id=:id");
			$st->bindValue(":id",$this->getId());
			$st->bindValue(":n",$this->getNome());
			$st->bindValue(":ra",$this->getra());
			$st->bindValue(":c",$this->getcurso());
			$st->bindValue(":t",$this->getTelefone());
			$st->bindValue(":ifm",$this->getidfichamedica());
			$st->bindValue(":ic",$this->getidcidade());
			return $st->execute();	
		}
		public function apagar(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"delete from aluno where id=:id");
			$st->bindValue(":id",$this->getId());
			return $st->execute();	
		}
		public function buscarTodos(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select * from aluno order by nome");
			$st->execute();	
			return $st->fetchAll();
		}	
		public function buscarId(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select * from aluno where id=:id");
			$st->bindValue(":id",$this->getId());
			$st->execute();	
			return $st->fetch();
		}	
		
	}
?>