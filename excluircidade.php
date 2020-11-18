<?php
	require_once 'cidade.php';
	
	if(isset($_GET['idcidade'])){
		$student = new cidade();
		$student->setidcidade($_GET['idcidade']);
		if($student->apagar()){
			?>
			<script>
			   window.alert("Cidade excluida com sucesso!");
			   window.location.href="informativoCidadeEstado.php";
			</script>
			<?php
		}else{
					?>
			<script>
			   window.alert("Erro ao excluir cidade!");
			   window.location.href="informativoCidadeEstado.php";
			</script>
			<?php
		}
	}
?>