<div class="col-lg-12">
   <div class="panel panel-default">
      <div class="panel-heading clearfix">
         <h4 class="panel-title pull-left">Buscar programa semanal</h4>
         <div class="btn-group pull-right">
            <!--<a href="<?php echo base_url('index.php/plan/listar'); ?>" class="btn btn-primary btn-sm">test</a>-->
         </div>
      </div>
      <div class="panel-body">
         <form class="form-horizontal" id="form-select-semana">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                     <label class="col-md-1 control-label" for="anio">Semana</label>
                     <div class="col-md-4">
                        <select id="select-semana" name="semana" class="form-control">
                           <?php for($i=0; $i<52; $i++){ ?>						
                           <option value="<?php echo 'SEM' . $i; ?>" <?php echo ($i == 32)?'style="color: blue; font-weight: bold" selected="selected"':''; ?>><?php echo 'Semana ' . $i; ?></option>
                           <?php } ?>							
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="panel-body" style="border: 1px solid #E1E4E8;; margin: 4px 4px 4px 4px;">
          <table class="table" id="tabla-buscar-programa-semanal">
            <caption>Optional table caption.</caption>
            <thead>
               <tr>
                  <th>#</th>
                  <th>Equipo</th>
                  <th>Actividad</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
				  
            </tbody>
         </table>
      </div>
   </div>
</div>
<script>
alert('Falta el numero de OT en caso de haber sido realiza, no visualizar boton crear ot');
</script>	
