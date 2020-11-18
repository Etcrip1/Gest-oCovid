
<?php
	require_once 'estado.php';
	
	if(isset($_POST['nome'])){
		$student = new estado();
		$student->setNome($_POST['nome']);
		$student->setsigla($_POST['sigla']);
		$student->setquantidadeescolas($_POST['quantidadeescolas']);
		$student->setcapital($_POST['capital']);
		if($student->inserir()){
			?>
			<script>
			   window.alert("Estado inserido com sucesso!");
			   window.location.href="index.php";
			</script>
			<?php
		}else{
			?>
			<script>
			   window.alert("Erro ao inserir o estado!");
			   window.location.href="index.php";
			</script>
			<?php
		}
	}
?>