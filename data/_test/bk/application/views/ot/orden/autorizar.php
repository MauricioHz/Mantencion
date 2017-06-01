<div class="row">
        <?php if(!$httpPost){ ?>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Autorizar</div>
                <!-- sin aprobacion -->
                <?php if($estado == 0){ ?>
                    <div class="panel-body">
                        <div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin"> <h4>Supervisor</h4>
                        <p>Orden de trabajo para aprobar o rechazar</p></div>
                        <form class="form-horizontal" id="form-aprobar" action="<?php echo '111'; ?>" method="post">
                            <div class="form-group">
                                 <label class="col-sm-4 control-label">Seleccione</label>
                                 <div class="col-md-6">
                                 <select class="form-control" name="estado">
                                      <option value="1">APRUEBA</option>
                                      <option value="2">RECHAZA</option>
                                 </select>
                                 </div>
                             </div>
                             <input type="hidden" name="accion" value="APROBAR_ORDEN">
                             <input type="hidden" name="id-orden" value="<?php echo $id; ?>">
                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success btn-sm"> Enviar</button>
                                 </div>             
                             </div>
                         </form>
                    </div>
                <?php } ?>
                <!-- con aprobacion -->
                <?php if($estado == 1){ ?>                
                    <div class="panel-body">
                        <div class="bs-callout bs-callout-warning" id="callout-navs-tabs-plugin"> <h4>Mensaje</h4>
                        <p>Está orden de trabajo ya ha sido autorizada.</p></div>
                    </div>                    
                <?php } ?>
                <!-- con rechazo -->
                <?php if($estado == 2){ ?>                
                    <div class="panel-body">
                        <div class="bs-callout bs-callout-danger" id="callout-navs-tabs-plugin"> <h4>Mensaje</h4>
                        <p>Está orden de trabajo ha sido rechazada, puede autorizar a continuación.</p></div>
                        <div class="bs-callout bs-callout-info" id="callout-navs-tabs-plugin"> <h4>Supervisor</h4>
                        <p>Orden de trabajo para aprobar o rechazar</p></div>
                        <form class="form-horizontal" id="form-aprobar" action="<?php echo base_url('index.php/mantenimiento/autorizar');?>" method="post">
                            <div class="form-group">
                                 <label class="col-sm-4 control-label">Seleccione</label>
                                 <div class="col-md-6">
                                 <select class="form-control" name="estado">
                                      <option value="1">APRUEBA</option>
                                      <option value="2">RECHAZA</option>
                                 </select>
                                 </div>
                             </div>
                             <input type="hidden" name="accion" value="APROBAR_ORDEN">
                             <input type="hidden" name="id-orden" value="<?php echo $id; ?>">
                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success btn-sm"> Enviar</button>
                                 </div>             
                             </div>
                         </form>
                    </div>                    
                <?php } ?>
            </div>
        </div>
    	<div class="col-lg-8">
    		<div class="panel panel-default">
    			<div class="panel-heading clearfix">
    				Documento PDF orden de trabajo
    				<div class="btn-group pull-right">
    					<a href="<?php echo base_url('index.php/mantenimiento/listar'); ?>"
    						class="btn btn-default btn-sm"><i class="fa fa-list"></i> Listar
    						ordenes de trabajo</a>
    				</div>
    			</div>
    			<iframe id="input_numero_registro"
    				src="<?php echo base_url('index.php/mantenimiento/pdf/').$id; ?>"
    				width="100%" height="500" frameBorder="0"
    				style="margin: 0 auto; display: block;"></iframe>
    		</div>
    	</div>
    	<?php }else{ ?>
    	<div class="col-lg-6">
        	<div class="panel panel-default">
        	    <div class="panel-body">
        	        <?php if($mensaje_aprobacion == 'APROBADO'){?>
                        <div class="alert alert-success" role="alert"> <strong>Mensaje</strong> Se ha autorizado la orden de trabajo #<?php echo $id; ?>. </div>
                        <a href="<?php echo base_url('index.php/mantenimiento/listar'); ?>"	class="btn btn-success btn-sm"><i class="fa fa-list"></i> Listar ordenes de trabajo</a>
                    <?php } ?>                    
        	        <?php if($mensaje_aprobacion == 'RECHAZADO'){?>
                        <div class="alert alert-danger" role="alert"> <strong>Mensaje</strong> Se ha rechazado la orden de trabajo #<?php echo $id; ?>. </div>
                        <a href="<?php echo base_url('index.php/mantenimiento/listar'); ?>"	class="btn btn-success btn-sm"><i class="fa fa-list"></i> Listar ordenes de trabajo</a>
                    <?php } ?>                                
        	        <?php if($mensaje_aprobacion == 'PENDIENTE'){?>
                        <div class="alert alert-warning" role="alert"> <strong>Mensaje</strong> Orden de trabajo #<?php echo $id.' '; ?>aún en estado pendiente. </div>
                        <a href="<?php echo base_url('index.php/mantenimiento/listar'); ?>"	class="btn btn-success btn-sm"><i class="fa fa-list"></i> Listar ordenes de trabajo</a>
                    <?php } ?>                                        
                </div>    
            </div>
        </div>    
        <?php } ?>
    </div>
