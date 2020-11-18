<?php
	require_once 'cidade.php';
	
	if(isset($_POST['nome'])){
		$student = new cidade();
		$student->setNome($_POST['nome']);
		$student->setidestado($_POST['idestado']);
		$student->setquantosalunos($_POST['quantosalunos']);
		$student->setquantosfuncionarios($_POST['quantosfuncionarios']);
		if($student->inserir()){
			?>
			<script>
			   window.alert("Cidade inserida com sucesso!");
			   window.location.href="index.php";
			</script>
			<?php
		}else{
			?>
			<script>
			   window.alert("Erro ao inserir a cidade!");
			   window.location.href="index.php";
			</script>
			<?php
		}
	}
?>