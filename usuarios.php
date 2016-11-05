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
								    <li><a href="/nuevo_usuario.php" class="label label-success" style="padding: 5px;"> Nuevo Usuario</a></li>
			                		<li><a data-action="collapse"></a></li>
			                		<!--<li><a data-action="reload"></a></li>-->
			                		<!--<li><a data-action="close"></a></li>-->
			                	</ul>
		                	</div>
						</div>
						<!--
						<div class="panel-body">
							Example of a basic <code>responsive</code> table. Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive</code> to make them scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, you will not see any difference in these tables.
						</div>
						-->

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
									$usuarios= $entityManager->getRepository('Usuarios')->findAll(array(), array('nombre'=>'desc'));
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
