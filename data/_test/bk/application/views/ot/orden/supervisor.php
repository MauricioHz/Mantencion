<?php 
if($orden == FALSE){
    echo '<pre>No existen registros para la orden #' . $id . '</pre>';
}else{ 
?>
    <style>
    .panel-heading .accordion-toggle:after {
    	/* symbol for "opening" panels */
    	font-family: 'Glyphicons Halflings';
    	/* essential for enabling glyphicon */
    	content: "\e114"; /* adjust as needed, taken from bootstrap.css */
    	float: right; /* adjust as needed */
    	color: grey; /* adjust as needed */
    }
    
    .panel-heading .accordion-toggle.collapsed:after {
    	/* symbol for "collapsed" panels */
    	content: "\e080"; /* adjust as needed, taken from bootstrap.css */
    }
    input:invalid {
        border: 2px dashed red;
    }
    </style>
    
    <div class="row">
    	<div class="col-lg-6 col-lg-offset-0">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<i class="fa fa-circle" style="color: #056FCC;"></i> Supervisor -
    				Registro de mantenciones
    			</div>
    			<div class="panel-body">
    				<form class="form-horizontal" id="form-crear-registro-mantenciones" name="form-crear-registro-mantenciones"
    					action="<?php echo base_url('index.php/mantenimiento/supervisar/'.$id); ?>" method="post">
    					<div class="form-group">
    						<label class="col-md-4 col-lg-offset-0 control-label"
    							for="mantenimiento" style="color: #0081C8">Mantenimiento</label>
    						<div class="col-md-8">
    							<select id="mantenimiento" name="mantenimiento"	class="form-control">
    								<option value="MI">Mantención Interna</option>
    								<option value="ME">Mantención Externa</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-md-4 col-lg-offset-0 control-label"
    							for="mantenimiento" style="color: #0081C8">Piso/Nivel</label>
    						<div class="col-md-8">
                                <input id="piso-nivel" name="piso-nivel" type="text" placeholder="Ingrese el piso/nivel." class="form-control input-md" maxlength="40">
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-md-1 control-label" for="descripcion"></label>
    						<div class="col-md-11">
    							<span class="help-block">Descripción de la intervencion realizada</span>
    							<textarea class="form-control" id="descripcion"
    								name="descripcion"
    								placeholder="Descripción de la intervencion realizada"
    								maxlength="400" required></textarea>
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-md-8 col-lg-offset-0 control-label"
    							for="prueba-funcionamiento" style="color: #0081C8">Pruebas de
    							funcionamiento</label>
    						<div class="col-md-4">
    							<select id="prueba-funcionamiento" name="prueba-funcionamiento"
    								class="form-control">
    								<option value="SC">Cumple</option>
    								<option value="NC">No cumple</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-md-8 col-lg-offset-0 control-label"
    							for="orden-limpiesa" style="color: #0081C8">Orden y
    							limpieza</label>
    						<div class="col-md-4">
    							<select id="orden-limpiesa" name="orden-limpiesa"
    								class="form-control">
    								<option value="RZ">Realizado</option>
    								<option value="NR">No realizado</option>
    								<option value="NA">No aplica</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-md-1 control-label" for="observaciones"></label>
    						<div class="col-md-11">
    							<span class="help-block">Observaciones</span>
    							<textarea class="form-control" id="observaciones"
    								name="observaciones" placeholder="Observaciones" maxlength="400" required></textarea>
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-md-1 control-label" for="acciones-correctivas"></label>
    						<div class="col-md-11">
    							<span class="help-block">Acciones Correctivas</span>
    							<textarea class="form-control" id="acciones-correctivas"
    								name="acciones-correctivas" placeholder="Acciones Correctivas"
    								maxlength="400" required></textarea>
    						</div>
    					</div>
    					
    					<div class="form-group">
    					    <div class="col-md-8 col-lg-offset-1">
    					        <input type="hidden" name="id-orden" value="<?php echo $id; ?>">
    					        <button type="submit" class="btn btn-success">Enviar registro </button>
    					    </div>
    					</div>
    					
    				</form>
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-6 col-lg-offset-0">
    		<div class="panel-group" id="accordion">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h4 class="panel-title">
    						<a class="accordion-toggle" data-toggle="collapse"
    							data-parent="#accordion" href="#collapseOne"> 
    							<img alt="document, pdf icon" class="tiled-icon" style="max-width: 128px; max-height: 128px;" src="/assets/image/document-pdf.png" data-pin-nopin="true">
    							Orden de trabajo #<?php echo $id; ?> </a>
    					</h4>
    				</div>
    				<div id="collapseOne" class="panel-collapse collapse in">
    					<div class="panel-body">
    						<iframe id="input_numero_registro"
    							src="<?php echo base_url('index.php/mantenimiento/pdf/').$id; ?>"
    							width="100%" height="1000" frameBorder="0"
    							style="margin: 0 auto; display: block;"></iframe>
    					</div>
    				</div>
    			</div>
    			<!--
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h4 class="panel-title">
    						<a class="accordion-toggle" data-toggle="collapse"
    							data-parent="#accordion" href="#collapseTwo"> Collapsible Group
    							Item #2 </a>
    					</h4>
    				</div>
    				<div id="collapseTwo" class="panel-collapse collapse">
    					<div class="panel-body">...</div>
    				</div>
    			</div>
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h4 class="panel-title">
    						<a class="accordion-toggle" data-toggle="collapse"
    							data-parent="#accordion" href="#collapseThree"> Collapsible Group
    							Item #3 </a>
    					</h4>
    				</div>
    				<div id="collapseThree" class="panel-collapse collapse">...</div>
    				</div>
    		    -->
    		</div>
    		<!-- inicio panel campos -->
    		 <div class="col-lg-12"> </div>
                 <div class="panel panel-default">
                  <div class="panel-heading"><i class="fa fa-circle" style="color: #056FCC;"></i> Datos de registro mantención OT#<?php echo $id; ?></div>
                  <div class="table-responsive">
                      <table class="table table-striped">
                        <tr><td>Equipo</td><td><?php echo $orden->equipo_actividad; ?></td></tr>
                        <tr><td>Elemento</td><td><?php echo $orden->elemento; ?></td></tr>
                        <tr><td>Técnico responsable</td><td><?php echo $orden->tecnico; ?></td></tr>
                        <tr><td>Pabellon</td><td><?php echo $orden->pabellon; ?></td></tr>
                        <tr><td>Atril</td><td><?php echo $orden->atril; ?></td></tr>
                        <tr><td>Piso o nivel</td><td><?php echo 'pendiente ...'; ?></td></tr>
                        <tr><td>Fecha de intervención</td><td><?php echo $orden->fecha_inicio . '(como fecha de intervención)'; ?></td></tr>
                        <tr><td>Hora de inicio</td><td><?php echo $orden->fecha_inicio; ?></td></tr>
                        <tr><td>Hora de termino</td><td><?php echo $orden->fecha_termino; ?></td></tr>                    
                      </table>
                  </div>
                </div>
    		<!-- fin -->
    	</div>
    </div>
    <?php if($success){ ?>
    <p>Registro ingresado correctamente</p>
    <?php } ?>
<?php } ?>

<PRE>
    <?php var_dump($orden); ?>
</PRE>
<script type='text/javascript'>
document.getElementById('form-crear-registro-mantenciones').addEventListener('submit', function(evento){
    var accionesCorrectivas = document.getElementById('acciones-correctivas').value;
    if(accionesCorrectivas === ''){
      console.log('Debe completar el campo acciones correctivas.');
      evento.preventDefault();
    }
    
})
</script>