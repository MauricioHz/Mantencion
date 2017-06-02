
<div class="col-lg-12">
   <div class="panel panel-default">
      <div class="panel-heading clearfix">
         <h4 class="panel-title pull-left">Buscar programa semanal</h4>
         <div class="btn-group pull-right">
            <!--<a href="<?php echo base_url('index.php/plan/listar'); ?>" class="btn btn-primary btn-sm">test</a>-->
         </div>
      </div>
      <div class="panel-body">
         <form class="form-horizontal">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                     <label class="col-md-1 control-label" for="anio">Semana</label>
                     <div class="col-md-4">
                        <select id="semana" name="semana" class="form-control" id="select-semana">
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
         <table class="table">
            <caption>Optional table caption.</caption>
            <thead>
               <tr>
                  <th><?php echo '#' . $i; ?></th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
               </tr>
            </thead>
            <tbody>
               <?php for($i=0; $i<5; $i++){ ?>	
               <tr>
                  <th scope="row">3</th>
                  <td>Equipo</td>
                  <td>Actividad</td>
                  <td><a href="<?php echo base_url('index.php/mantencion/preventiva'); ?>" class="btn btn-primary btn-xs"># Crear orden de trabajo</a></td>
               </tr>
               <?php } ?>				  
            </tbody>
         </table>
      </div>
   </div>
</div>
