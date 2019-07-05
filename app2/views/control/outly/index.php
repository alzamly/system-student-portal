
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>قسم المؤسسة</th>
        <th>الصنف</th>
        <th>المبلغ</th>
        <th>الملاحظات</th>
        <th>تاريخ المصاريف</th>
        <th>تاريخ الادخال</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($outly); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
                    <td><?php echo $outly[$i]['DFName'];?></td>
			        <td><?php echo $outly[$i]['TOName'];?></td>
                    <td><?php echo $outly[$i]['OAmount'];?></td>
                    <td><?php echo $outly[$i]['ONotes'];?></td>
                    <td><?php echo $outly[$i]['OOutlyDate'];?></td>
                    <td><?php echo $outly[$i]['ODate'];?></td>
			        
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>

