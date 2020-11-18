		<?php
	require_once 'conexao.php';
class covid{
		public function consultacovid(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select distinct c.nome as Nome, count(idfichamedica) as QUANTIDADE from aluno as a INNER JOIN cidade as c on a.idcidade = c.idcidade WHERE a.idfichamedica = 3 or idfichamedica = 4 group by a.idcidade");
			$st->execute();	
			return $st->fetchAll();
		}
		public function consultagrisco(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select distinct c.nome as Nome, count(idfichamedica) as QUANTIDADE from aluno as a INNER JOIN cidade as c on a.idcidade = c.idcidade WHERE a.idfichamedica = 4 or idfichamedica = 2 group by a.idcidade");
			$st->execute();	
			return $st->fetchAll();
		}
				public function consultacidades(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select idcidade, nome from cidade order by idcidade");
			$st->execute();	
			return $st->fetchAll();
		}
			public function consultaestado(){
			$conectado= new conexao();
			$st=$conectado->conn->prepare(
			"select idestado, nome from estado order by idestado");
			$st->execute();	
			return $st->fetchAll();
		}
	}
?>