
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

	<div class="container">
      <img src="./imgs/imagem1.jpg" class="image-fluid d-block w-100">

<div class="row">
    <div class="col"><hr></div>
</div>

<div class="row ml-3">
	<div class="aside text-center">
			<h4>Total Infectados</h4>
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
	<button class="btn btn-light" data-toggle="modal" data-target="#alunoModal">
	<figure class="figure">
	<img src="./imgs/alunos.png" class="figure-img img-fluid rounded">
  	<figcaption class="figure-caption text-center">Registar aluno</figcaption>
	</figure>
	</button>

	<button class="btn btn-light" data-toggle="modal" data-target="#cidadeModal">	
    <figure class="figure">
  	<img src="./imgs/cidade.png" class="figure-img img-fluid rounded">
  	<figcaption class="figure-caption text-center">Registar cidade</figcaption>
	</figure>
	</button>

	<button class="btn btn-light" data-toggle="modal" data-target="#estadoModal">
	<figure class="figure">
  	<img src="./imgs/formulario.png" class="figure-img img-fluid rounded">
  	<figcaption class="figure-caption text-center">Registrar estado</figcaption>
	</figure>
	</button>
</div>
</div>

		<footer style="background-color: #03A331;">
		<div class="text-center">© Copyright ADS 2020-2020 - All Rights Reserved -</div>
		</footer>

<!-- Aluno modal -->
<div class="modal fade" id="alunoModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="inserir.php" method="POST">
			<div class="form-group">
				<label for="nome">Nome:</label>
				</br> <input type="text" name="nome" required>
			</div>
			<div class="form-group">
				 <label for="ra">RA:</label>
				</br> <input type="number" name="ra">
			</div>
			<div class="form-group">
				<label for="curso">Curso:</label>
				</br> <input type="text" name="curso">
			</div>			
			<div class="form-group">
				<label for="telefone">Telefone:</label>
				</br> <input type="number" name="telefone">
			</div>
			<div class="form-action">			
				<label for="idfichamedica">Ficha médica</label>
				<select name="idfichamedica">
				<option value="1">Não Tenho Covid, Nem Estou no Grupo de Risco</option>
                <option value="3">Estou infectado, Mas Não No Grupo De Risco</option>
                <option value="2">Estou no Grupo de Risco, Mas Não Infectado</option>		
                <option value="4">Estou infectado, e No Grupo De Risco</option>						
				</select>
				</br>
			</div>
			<div class="form-group">
				<label for="idcidade">Cidade</label>
				<select name="idcidade">
				<?php
				$consult= new covid();
				$resp=$consult->consultacidades();
				foreach($resp as $city) { ?>
					<option value="<?php echo $city['idcidade'];?>"> <?php echo $city['nome']; ?>
					</option>
					<?php
									}
				?>
				</select>
			</div>			
			<button type="submit" class="btn btn-dark">Inserir</button>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Cidade modal -->
<div class="modal fade" id="cidadeModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir cidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="inserircidade.php" method="POST">
			<div class="form-group">
				<label for="nome">Nome:</label>
				</br> <input type="text" name="nome" required>
			</div>
			<div class="form-action">
				<label for="idestado">Estado</label>
				<select name="idestado">
				<?php
				$consult= new covid();
				$resp=$consult->consultaestado();
				foreach($resp as $est) { ?>
					<option value="<?php echo $est['idestado'];?>"> <?php echo $est['nome']; ?>
					</option>
					<?php
									}
				?>
				</select>
				</br>
			</div>			
			<div class="form-group">
				<label for="quantosfuncionarios">Quantos Funcionarios:</label>
				</br> <input type="number" name="quantosfuncionarios">
			</div>			
			<div class="form-group">
				<label for="quantosalunos"> Quantos Alunos:</label>
				</br> <input type="number" name="quantosalunos">
			</div>			
			<button type="submit" class="btn btn-dark">Inserir</button>
		</form>	  
      </div>
    </div>
  </div>
</div>

<!-- Estado modal -->
<div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="inserirestado.php" method="POST">
			<div class="form-group">
				<label for="nome">Nome:</label>
				</br> <input type="text" name="nome" required>
			</div>
			<div class="form-group">
				 <label for="sigla">Sigla:</label>
				</br> <input type="text" name="sigla">
			</div>
			<div class="form-group">
				<label for="quantidadeescolas">Quantas Escolas:</label>
				</br> <input type="number" name="quantidadeescolas">
			</div>			
			<div class="form-group">
				<label for="capital"> Capital:</label>
				</br> <input type="varchar(50)" name="capital">
			</div>			
			<button type="submit" class="btn btn-dark">Inserir</button>
		</form>
	  
      </div>
    </div>
  </div>
</div>


	<script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>