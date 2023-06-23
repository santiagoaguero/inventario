<div class="container is-fluid mb-6">
	<h1 class="title">Proveedores</h1>
	<h2 class="subtitle">Nuevo proveedor</h2>
</div>
<div class="container pb-6 pt-6">

	 <div class="form-rest mb-6 mt-6"></div><!--to show notifications -->

	<form action="./php/provee_guardar.php" method="POST" class="formularioAjax" id="formul" autocomplete="off" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="provee_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ. ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
			  <div class="column">
				<div class="control">
					<label>RUC</label>
					  <input class="input" type="text" name="provee_ruc" pattern="[a-zA-Z0-9.-]{4,12}" maxlength="11" required >
				</div>
			  </div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Teléfono</label>
				  	<input class="input" type="text" name="provee_telefono" pattern="[0-9- ]{6,30}" maxlength="30" required>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Dirección</label>
				  	<input class="input" type="text" name="provee_direccion" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ.- ]{3,255}" maxlength="255" >
				</div>
		  	</div>
		</div>
		<!-- <div class="columns"> 
		  	<div class="column">
			  <label>Estado</label><br>
					<div class="select">
						<select name="cliente_estado" required>
							<option value="" selected="">-- Selecciona estado --</option>
							<option value="1">Activo</option>
							<option value="0">Inactivo</option>
				  		</select>
					</div>
		  	</div>
		</div>-->
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>

		<div>
			<h4 id="para" onclick="addProduct(120202133);">HOLAAA</h4>
		</div>
	</form>
</div>