
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>اسم الموظف</th>
        <th>القسم</th>
        <th>تعديل</th>
        <th>حذف</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($employees); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $employees[$i]['UName'];?></td>
			        <td><?php echo $employees[$i]['DFName'];?></td>
			        <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_edit">تعديل</button>
						  </td>

			        <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف</button>
						  </td>
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>



  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>