<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php"  enctype = "multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label"> RFC </label>  <!----SE QUEDA COMO RFC POR ESTANDAR Y SOLO ADMITE MAYUSCULAS 12 caracteres----->
					<div class="col-sm-10">
						<input type="text" class="form-control"   id="nombre" name="nombre" placeholder=" Ingresa RFC " required> <!--PNombre = RFC ingresado ----->
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Usuario</label>  <!--- Anteriormente estado civil--->
					<div class="col-sm-10">
						<select class="form-control" id="email" name="email">
							<option value="Cliente">Cliente</option>
							<option value="Proveedor">Proveedor</option>
							<option value="Cliente/Proveedor">Cliente/Proveedor</option>
							
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label"># POLIZA </label> <!-- ANTERIOMENTE TELEFONO PERO SE OCUPA POLIZA PARA UN RASTREO MAS FACIL DE LOS DOCUMENTOS -->
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="# poliza ">
					</div>
				</div>
				
				<!-------><div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Estado de la carpeta</label>  <!--- Anteriormente estado civil--->
					<div class="col-sm-10">
						<select class="form-control" id="estado_civil" name="estado_civil">
							<option value="completa">Completa</option>
							<option value="incompleta">Incompleta</option>
							<option value="otro">Otra</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="hijos" class="col-sm-2 control-label">¿?</label><!--- Anteriormente estado civil--->
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="1" checked> SI
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="0"> NO
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="intereses" class="col-sm-2 control-label">Estado de carga de documentos</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="1"> 1
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="2"> 2
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="3"> 3
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="completa"> completa
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Archivo</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf">
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