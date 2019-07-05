
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>اقسام المؤسسة</th>
        <th>تعديل</th>
        <th>حذف</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($schools); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $schools[$i]['DFName'];?></td>
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
