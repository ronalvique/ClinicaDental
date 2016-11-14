<?php 
	/*
	* Llamado a archivo top_page
	* Incluye el archivo functions
	*/
	include("includes/top_page_usuarios.php"); 
	require 'bootstrap.php';
	require_once 'src/Usuarios.php';

?>
<style>
.tabla_usuarios > tbody > tr:hover{
	background-color: #f8f8f8;
}
</style>
<body>

	<?php include("includes/header.php"); ?>


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<?php include("includes/sidebar.php"); ?>


			<!-- Main content -->
			<div class="content-wrapper">

				<?php include("includes/page_header.php"); ?>


				<!-- Content area -->
				<div class="content">

					<!-- Basic responsive table -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Listado de Usuarios</h5>
							<div class="heading-elements">
								<ul class="icons-list">
								    <li><a href="/nuevo_usuario.php" class="btn btn-info" style="padding: 5px;"> Nuevo Usuario</a></li>
			                		<li><a data-action="collapse"></a></li>
			                		<!--<li><a data-action="reload"></a></li>-->
			                		<!--<li><a data-action="close"></a></li>-->
			                	</ul>
		                	</div>
						</div>
						
						<div class="panel-body">

							


							<div class="table-responsive" style="border:none;">
								<?php
									 function filtrar($valor){
									 	
									 	if (isset($_POST['submit'])){
									 		if (strcasecmp($valor, $_POST['filtroSelect']) == 0){
									 			echo 'selected="selected"';
									 		}
									 	}
									 }
								?>
								<form action="" name="form_filtro_usuarios" method="Post">
									<span >Filtros de busqueda:</span>
									<select  class="form-group" name="filtroSelect">
									  <option <?php filtrar("2"); ?>value="2">Todos</option>
									  <option <?php filtrar("1"); ?> value="1">Activos</option>
									  <option <?php filtrar("0"); ?> value="0">Inactivos</option>
									</select>
									
									<div class="input-group-btn">
										<!--<button type="button" class="btn btn-info" id="remove-all">Remove options</button>-->
										<input type="submit" name="submit" value="Filtar" class="btn btn-info">
									</div>
								</form>
							</div>
						</div>
						

						<div class="table-responsive">
							<table class="table tabla_usuarios">
								<thead>
									<tr>
										<th>ID</th>
										<th>Usuario</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Estado</th>
										<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
									</tr>
								</thead>
								<tbody>
								<?php
									
									if (isset($_POST['submit'])){
										
										if (strcasecmp($_POST['filtroSelect'],1)== 0 || strcasecmp($_POST['filtroSelect'],0)== 0){
											$usuarios= $entityManager->getRepository('Usuarios')->findby(array('estado' => $_POST['filtroSelect']));
										}else{
											$usuarios= $entityManager->getRepository('Usuarios')->findAll();
										}
									}else{
										$usuarios= $entityManager->getRepository('Usuarios')->findby(array('estado' => 1));
									}

									
									foreach ($usuarios as $row) {
									 	echo "<tr>";
									 		echo "<td>" . $row->getId()   . "</td>";
									 		echo "<td>" . $row->getUsuario() . "</td>";
									 		echo "<td>" . $row->getNombre() . "</td>";
									 		echo "<td>" . $row->getCorreo() . "</td>";
									 		echo "<td>" ;
									 			if ($row->getEstado() == 1)
									 				echo  '<span class="label label-success elim' . $row->getId() .'">Activo</span>';
									 			else
									 				echo '<span class="label label-default elim'. $row->getId() .'">Eliminado</span>';
									 		echo "</td>";
									 		
									 		if ($row->getEstado() == 1){
										 		echo '<td class="text-center">
														<ul class="icons-list ul' . $row->getId() . '">
															<li class="dropdown">
																<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																	<i class="icon-menu9"></i>
																</a>

																<ul class="dropdown-menu dropdown-menu-right">
																	<li><a href="/modificacion_usuario.php?id=' . $row->getId() . '" class="form_usuario_opciones" data-opcion="editar" id="' . $row->getId()  .'"><i></i> Editar</a></li>
																	<li><a class="form_usuario_opciones " data-opcion="eliminar" id="'. $row->getId() .'"><i></i> Eliminar</a></li>
																</ul>
															</li>
														</ul>
													</td>';
									 		
											}else{
												echo '<td class="text-center">
														<ul class="icons-list">
															
														</ul>
													</td>';
											}
									 	echo "</tr>";

									 } 
								?>
									
								</tbody>
							</table>
							<br>
							<br>
							<br>
						</div>
					</div>
					<!-- /basic responsive table -->

					<br />
					


				


					<?php include("includes/footer.php"); ?>


				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
