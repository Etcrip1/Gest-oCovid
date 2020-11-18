
<html><title>Alunos</title>
<head>
	<title>Cadastro de Alunos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilo2.css"></head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #03A331;">
      <div class="container">
      <a class="navbar-brand" style="color: white" href="index.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link ml-5" style="color: white" href="informativoAluno.php">Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="informativoCidadeEstado.php">Cidades/Estados</a>
          </li>
		  </ul>
        </div>
		<div class="collapse navbar-collapse text-right" id="navBar2">
		<span class="navbar-text" style="color: white;">
		Gerenciamento De Casos Covid USF
   		 </span>
    </div>
    </nav>

	<div class="container text-center">
      <img src="./imgs/imagem1.jpg" class="image-fluid d-block w-100">

      <h4>Alunos:</h4>
      <?php
	require_once 'aluno.php';
	$student = new aluno();
	$resp=$student->buscarTodos();
	echo "<table class='table table-dark'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope='col'>ID</th><th scope='col'>Nome</th>";
	echo "<th scope='col'>RA</th><th scope='col'>Curso</th><th scope='col'>Telefone</th>";
	echo "<th scope='col'>Ficha Médica</th><th scope='col'>ID Cidade</th>";
	echo "<th scope='col'></th><th scope='col'></th>";
	echo "</tr>";
	echo "</thead>";
	foreach($resp as $linha){
		echo "<tr>";
		echo "<td>".$linha['id']."</td>";
		echo "<td>".$linha['nome']."</td>";
		echo "<td>".$linha['ra']."</td>";
		echo "<td>".$linha['curso']."</td>";
		echo "<td>".$linha['telefone']."</td>";
		echo "<td>".$linha['idfichamedica']."</td>";
		echo "<td>".$linha['idcidade']."</td>";
		echo "<td><a href=excluir.php?id="
			.$linha['id'].">Excluir</a></td>";
		echo "<td><a href=alterar.php?id="
			.$linha['id'].">Alterar</td>";	
		echo "</tr>";
	}
	echo "</table>";
?>
    </div>

    <div class="row justify-content-center">

    <div>
    <h4>Total grupo de risco:</h4>
    <?php
	require_once 'consultas.php';
	$consult= new covid();
	$resp=$consult->consultagrisco();
	echo "<table class='table table-dark'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope='col'>Nome</th><th scope='col'>QTD</th>";
	echo "<th scope='col'></th><th scope='col'></th>";
	echo "</tr>";
	echo "</thead>";
	foreach($resp as $linha){
	echo "<tr>";
	echo "<td>".$linha['Nome']."</td>";
	echo "<td>".$linha['QUANTIDADE']."</td>";
	echo "</tr>";
	}
	echo "</table>";
?>
    </div>

    <div class="article text-center mx-5">
    <h4>Total infectados:</h4>
    <?php
	require_once 'consultas.php';
	$consult= new covid();
	$resp=$consult->consultacovid();
	echo "<table class='table table-dark'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope='col'>Nome</th><th scope='col'>QTD</th>";
	echo "<th scope='col'></th><th scope='col'></th>";
	echo "</tr>";
	echo "</thead>";
	foreach($resp as $linha){
	echo "<tr>";
	echo "<td>".$linha['Nome']."</td>";
	echo "<td>".$linha['QUANTIDADE']."</td>";
	echo "</tr>";
	}
	echo "</table>";
?>
    </div>
    </div>

		<footer style="background-color: #03A331" >
		<div class="text-center">© Copyright ADS 2020-2020 - All Rights Reserved -</div>
		</footer>

		<!-- Aluno modal -->
<div class="modal fade" id="alunoModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php
	require_once 'aluno.php';
	
	if(isset($_GET['id'])){
		$student = new aluno();
		$student->setId($_GET['id']);
		$resp=$student->buscarId();  
		?>
		<h3>Alterar Aluno</h3>
		<form action="alterar2.php" method="POST">
			<p>Id:</br> <input type="number" 
			value="<?php echo $resp['id']?>"
			name="id" readonly="true"></p>
			<p>Nome:</br> <input type="text" 
			value="<?php echo $resp['nome']?>"
			name="nome" required></p>
			<p>RA: </br><input type="number"
			value="<?php echo $resp['ra']?>"
			name="ra"></p>
			<p>Curso: </br> <input type="text"
			value="<?php echo $resp['curso']?>"
			name="curso"></p>
			<p>Telefone:</br> <input type="number" 
			value="<?php echo $resp['telefone']?>"
			name="telefone"></p>
			<p>IdFichaMedica: </br><input type="number"
			value="<?php echo $resp['idfichamedica']?>"
			name="idfichamedica"></p>
			<p>IdCidade:</br> <input type="number"
			value="<?php echo $resp['idcidade']?>"
			name="idcidade"></p>
			<button type="submit" class="btn btn-dark">Alterar</button>
		</form> 
		<?php
	}
?>
	  
      </div>
    </div>
  </div>
</div>


	<script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

		
