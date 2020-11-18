<?php
	require_once 'cidade.php';
	
	if(isset($_POST['nome'])){
		$student = new cidade();
		$student->setidcidade($_POST['idcidade']);
		$student->setNome($_POST['nome']);
		$student->setidestado($_POST['idestado']);
		$student->setquantosfuncionarios($_POST['quantosfuncionarios']);
		$student->setquantosalunos($_POST['quantosalunos']);
		if($student->alterar()){
			?>
			<script>
			   window.alert("Cidade alterada com sucesso!");
			   window.location.href="informativoCidadeEstado.php";
			</script>
			<?php
		}else{
					?>
			<script>
			   window.alert("Erro ao excluir o cidade!");
			   window.location.href="informativoCidadeEstado.php";
			</script>
			<?php
		}
	}
?>