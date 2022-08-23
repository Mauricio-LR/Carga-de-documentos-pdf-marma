<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM personas WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	


		<script type="text/javascript">
			$(document).ready(function(){
				$('.delete').click(function(){
					var parent =$(this).parent().attr('id');
					var service =$(this).parent().attr('data');
					var dataString='id='+service;
					$.ajax ({
						type :"POST",
						url:"del_file.php",
						data :dataString,
						sucess:function (){
							location.reload();
						}
					});
				});
			});
		</script>







	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php"  enctype = "multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label"> Nombre o RFC </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre o No.Poliza" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Usuario</label>  <!--- Anteriormente estado civil--->
					<div class="col-sm-10">
						<select class="form-control" id="email" name="email">
							<option value="completa">Cliente</option>
							<option value="incompleta">Proveedor</option>
							
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label"># POLIZA </label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="# poliza" value="<?php echo $row['telefono']; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Estado de la carpeta</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado_civil" name="estado_civil">
							<option value="SOLTERO" <?php if($row['estado_civil']=='SOLTERO') echo 'selected'; ?>>Completa</option>
							<option value="CASADO" <?php if($row['estado_civil']=='CASADO') echo 'selected'; ?>>Incompleta</option>
							<option value="OTRO" <?php if($row['estado_civil']=='OTRO') echo 'selected'; ?>>Otra</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="hijos" class="col-sm-2 control-label">¿?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="1" <?php if($row['hijos']=='1') echo 'checked'; ?>> SI
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="0" <?php if($row['hijos']=='0') echo 'checked'; ?>> NO
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="intereses" class="col-sm-2 control-label" require>Cuantos documentos carga</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="1" <?php if(strpos($row['intereses'], "1")!== false) echo 'checked'; ?>> 1
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="2" <?php if(strpos($row['intereses'], "2")!== false) echo 'checked'; ?>> 2
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="3" <?php if(strpos($row['intereses'], "3")!== false) echo 'checked'; ?>> 3
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="completo" <?php if(strpos($row['intereses'], "Completo")!== false) echo 'checked'; ?>> Completo
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Archivo</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf">
						
						

						<?php 
						
						$path = "files/".$id;
						if(file_exists($path)){
							$directorio = opendir($path);
							while($archivo =readdir($directorio))
							{
								if(!is_dir($archivo)){

									echo"<div data='".$path."/".$archivo.
									"'><a href='".$path."/".$archivo."'
									title='Ver archivo adjunto'><span class=glyphicon
									glyphicon-picture'></span></a>";

									echo "$archivo <a href ='#' class='delete'
									title='Ver archivo adjunto'><span
									class='glyphicon glyphicon-trash'
									aria-hidden='true'></span></a></div>";

									echo"<div data='".$path."/".$archivo.
									"'><a href='".$path."/".$archivo."'
									title='Ver archivo adjunto'><span class=glyphicon
									glyphicon-picture'></span></a>";

									echo "$archivo <a href ='#' class='view'
									title='Ver archivo adjunto'><span
									class='glyphicon glyphicon-eye-open'
									aria-hidden='true'></span></a></div>";

									echo"<div data='".$path."/".$archivo.
									"'><a href='".$path."/".$archivo."'
									title='Ver archivo adjunto'><span class=glyphicon
									glyphicon-picture'></span></a>";


									echo"<img src ='files/$id/$archivo'
									width='100'/>";
								}
							}
						}
						
						?>
						







					</div>
				</div>







				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>