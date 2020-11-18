<?php
	require_once 'estado.php';
	
	if(isset($_GET['idestado'])){
		$student = new estado();
		$student->setidestado($_GET['idestado']);
		if($student->apagar()){
			?>
			<script>
			   window.alert("Estado excluido com sucesso!");
			   window.location.href="informativoCidadeEstado.php";
			</script>
			<?php
		}else{
					?>
			<script>
			   window.alert("Erro ao excluir Estado!");
			   window.location.href="informativoCidadeEstado.php";
			</script>
			<?php
		}
	}
?>