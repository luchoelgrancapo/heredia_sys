<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contrato Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contrato/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Contrato Id</th>
						<th>Estado Id</th>
						<th>Personal Id</th>
						<th>Contrato Cargo</th>
						<th>Contrato Fechaing</th>
						<th>Contrato Sueldo</th>
						<th>Contrato Diaspagados</th>
						<th>Contrato Horaspagados</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($contrato as $c){ ?>
                    <tr>
						<td><?php echo $c['contrato_id']; ?></td>
						<td><?php echo $c['estado_id']; ?></td>
						<td><?php echo $c['personal_id']; ?></td>
						<td><?php echo $c['contrato_cargo']; ?></td>
						<td><?php echo $c['contrato_fechaing']; ?></td>
						<td><?php echo $c['contrato_sueldo']; ?></td>
						<td><?php echo $c['contrato_diaspagados']; ?></td>
						<td><?php echo $c['contrato_horaspagados']; ?></td>
						<td>
                            <a href="<?php echo site_url('contrato/edit/'.$c['contrato_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('contrato/remove/'.$c['contrato_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
