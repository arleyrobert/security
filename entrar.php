<?php 
include ('conexao/conexao.php');
?>
	
	
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Usuários</h1>
			<hr/>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				<?php
					$result_usuarios = "SELECT * FROM usuarios ORDER by id DESC limit 1";
					$resultado_usuarios = mysqli_query($conn, $result_usuarios);
					while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
					echo"
					<thead>
						<tr>
							<th>Inscrição</th>
							<th>Nome</th>
							<th>Senha MD5</th>
							
						</tr>
					</thead>	
					
					<tbody>
						<tr>
							<td>". $row_usuario['id'] ."</td>
							<td>". $row_usuario['nome'] ."</td>
							<td>". $row_usuario['senha'] ."</td>
						
							</td>
						</tr>              
					</tbody>";
						
				}
		
		?>
							
				</table>
			</div>
		</div>
	</div>
<a href="index.php">Voltar ao inicio</a>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

