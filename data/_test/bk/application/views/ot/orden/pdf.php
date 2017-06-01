<?php if(isset($existe_area) && $existe_area == TRUE){?>
<div class="alert alert-warning alert-dismissible" role="alert"> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
<strong>Mensaje</strong>  Ya existe una orden de trabajo para este registro. </div>
<?php }else{ ?>

<?php if($es_valido){ ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				Documento PDF orden de trabajo
				<div class="btn-group pull-right">
					<a href="<?php echo base_url('index.php/mantenimiento/asistente_editar/'.$id .'/'. $semana); ?>"
						class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Editar</a>
					<a href="<?php echo base_url('index.php/mantenimiento/listar'); ?>"
						class="btn btn-default btn-sm"><i class="fa fa-list"></i> Listar
						ordenes de trabajo</a>
				</div>
			</div>

			<iframe id="input_numero_registro"
				src="<?php echo base_url('index.php/mantenimiento/pdf/').$id; ?>"
				width="100%" height="1000" frameBorder="0"
				style="margin: 0 auto; display: block;"></iframe>

		</div>
	</div>
</div>
<?php }}?>