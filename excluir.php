<?php
	require_once 'aluno.php';
	
	if(isset($_GET['id'])){
		$student = new aluno();
		$student->setId($_GET['id']);
		if($student->apagar()){
			?>
			<script>
			   window.alert("Aluno excluir com sucesso!");
			   window.location.href="informativoAluno.php";
			</script>
			<?php
		}else{
					?>
			<script>
			   window.alert("Erro ao excluir o aluno!");
			   window.location.href="informativoAluno.php";
			</script>
			<?php
		}
	}
?>