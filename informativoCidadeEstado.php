
<html><title>Cidades e estados</title>
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

    <div class="container">
    <img src="./imgs/imagem1.jpg" class="image-fluid d-block w-100">

    <div class="container">

    <div class="row justify-content-center">

    <div class="article text-center">
    <h4>Cidades:</h4>
    <?php
	require_once 'cidade.php';
	$student = new cidade();
	$resp=$student->buscarTodos2();
	echo "<table class='table table-dark'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope='col'>ID</th><th scope='col'>Cidade</th>";
	echo "<th scope='col'>Estado</th><th scope='col'>Qtd Alunos</th><th scope='col'>Qtd Funcionarios</th>";
	echo "<th scope='col'></th><th scope='col'></th>";
	echo "</tr>";
	echo "</thead>";
	foreach($resp as $linha){
		echo "<tr>";
		echo "<td>".$linha['idcidade']."</td>";
		echo "<td>".$linha['cidadenome']."</td>";
		echo "<td>".$linha['estado']."</td>";
		echo "<td>".$linha['quantosalunos']."</td>";
		echo "<td>".$linha['quantosfuncionarios']."</td>";
		echo "<td><a href=excluircidade.php?idcidade="
			.$linha['idcidade'].">Excluir</a></td>";
		echo "<td><a href=alterarcidade.php?idcidade="
			.$linha['idcidade'].">Alterar</td>";	
		echo "</tr>";
	}
	echo "</table>";
?>
    </div>  
    </div>

    <div class="row justify-content-center mt-2">

    <div class="article text-center">
	<h4>Estados:</h4>
    <?php
	require_once 'estado.php';
	$student = new estado();
	$resp=$student->buscarTodos();
	echo "<table class='table table-dark'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th scope='col'>ID</th><th scope='col'>Nome</th>";
	echo "<th scope='col'>Sigla</th><th scope='col'>Quantidade de escolas</th><th scope='col'>Capital</th>";
	echo "<th scope='col'></th><th scope='col'></th>";
	echo "</tr>";
	echo "</thead>";
	foreach($resp as $linha){
		echo "<tr>";
		echo "<td>".$linha['idestado']."</td>";
		echo "<td>".$linha['nome']."</td>";
		echo "<td>".$linha['sigla']."</td>";
		echo "<td>".$linha['quantidadeescolas']."</td>";
		echo "<td>".$linha['capital']."</td>";
		echo "<td><a href=excluirestado.php?idestado="
			.$linha['idestado'].">Excluir</a></td>";
		echo "<td><a href=alterarestado.php?idestado="
			.$linha['idestado'].">Alterar</td>";	
		echo "</tr>";
	}
	echo "</table>";
?>
    </div>
    </div>
    </div>
	</div>

		<footer style="background-color: #03A331" >
		<div class="text-center">© Copyright ADS 2020-2020 - All Rights Reserved -</div>
		</footer>


	<script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

		
