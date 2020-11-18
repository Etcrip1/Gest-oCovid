<?php
	require_once 'aluno.php';
	
	if(isset($_POST['nome'])){
		$student = new aluno();
		$student->setNome($_POST['nome']);
		$student->setra($_POST['ra']);
		$student->setcurso($_POST['curso']);
		$student->setTelefone($_POST['telefone']);
		$student->setidfichamedica($_POST['idfichamedica']);
		$student->setidcidade($_POST['idcidade']);
		if($student->inserir()){
			?>
			<script>
			   window.alert("Aluno inserido com sucesso!");
			   window.location.href="index.php";
			</script>
			<?php
		}else{
			?>
			<script>
			   window.alert("Erro ao inserir o aluno!");
			   window.location.href="index.php";
			</script>
			<?php
		}
	}
?>