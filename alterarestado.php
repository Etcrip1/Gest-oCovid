<html><title>Sistema</title>
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

	<div class="container mt-5">
	<?php
	require_once 'estado.php';
	
	if(isset($_GET['idestado'])){
		$student = new estado();
		$student->setidestado($_GET['idestado']);
		$resp=$student->buscaridestado();  
?>		
		<h3 class="text-center">Alterar Estado</h3>
		<div class="row justify-content-center">
		<form action="alterarestado2.php" method="POST">
			<p>IdEstado:</br> <input type="number" 
			value="<?php echo $resp['idestado']?>"
			name="idestado" readonly="true"></p>
			<p>Nome:</br> <input type="text" 
			value="<?php echo $resp['nome']?>"
			name="nome" required></p>
			<p>Sigla: </br><input type="text"
			value="<?php echo $resp['sigla']?>"
			name="sigla"></p>
			<p>Quantas Escolas </br> <input type="number"
			value="<?php echo $resp['quantidadeescolas']?>"
			name="quantidadeescolas"></p>
			<p>Capital:</br> <input type="text" 
			value="<?php echo $resp['capital']?>"
			name="capital"></p>
			<button type="submit" class="btn btn-dark">Alterar</button>	
	</form> 
	</div>
	</div>
	<?php
	}
?>
	</div>
	<div class=container style="height: 96">
	</div>

	<footer style="background-color: #03A331;">
		<div class="text-center">© Copyright ADS 2020-2020 - All Rights Reserved -</div>
		</footer>

	<script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>