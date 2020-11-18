<?php
	require_once 'estado.php';
	
	if(isset($_POST['nome'])){
		$student = new estado();
		$student->setidestado($_POST['idestado']);
		$student->setNome($_POST['nome']);
		$student->setsigla($_POST['sigla']);
		$student->setquantidadeescolas($_POST['quantidadeescolas']);
		$student->setcapital($_POST['capital']);
		if($student->alterar())
		?>
		<script>
		   window.alert("Estado excluido com sucesso!");
		   window.location.href="informativoCidadeEstado.php";
		</script>
		<?php
	}else{
				?>
		<script>
		   window.alert("Erro ao excluir o estado!");
		   window.location.href="informativoCidadeEstado.php";
		</script>
		<?php
	}
?>