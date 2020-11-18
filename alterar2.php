<?php
	require_once 'aluno.php';
	
	if(isset($_POST['nome'])){
		$student = new aluno();
		$student->setId($_POST['id']);
		$student->setNome($_POST['nome']);
		$student->setra($_POST['ra']);
		$student->setcurso($_POST['curso']);
		$student->setTelefone($_POST['telefone']);
		$student->setidfichamedica($_POST['idfichamedica']);
		$student->setidcidade($_POST['idcidade']);
		if($student->alterar()){
			?>
			<script>
			   window.alert("Aluno alterado com sucesso!");
			   window.location.href="informativoAluno.php";
			</script>
			<?php
		}else{
					?>
			<script>
			   window.alert("Erro ao alterado o aluno!");
			   window.location.href="informativoAluno.php";
			</script>
			<?php
		}
	}
?>