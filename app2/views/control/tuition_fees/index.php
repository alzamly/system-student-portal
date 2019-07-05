
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>السنة الدراسية</th>
        <th>القسط</th>
        <th>عنوان القسط</th>
        <th>نوع القسط</th>
        <th>قسم المؤسسة</th>
        <th>الصف</th>
      </tr>
    </thead>
    <tbody>
    	<?php

    	function returnTypeTuitionFees($type)
    	{
    		if ($type == "month") {
    			return "شهري";
    		}
    		elseif ($type == "year")
    		{
    			return "سنوي";
    		}

    		return "";
    	}

    	function returnClass($cls,$classes)
    	{
    		$class = "";

    		for ($i=0; $i < count($classes); $i++) { 
    			if ($classes[$i]['CId'] == $cls) {
    				$class = $classes[$i]['ClassName'];
    			}
    		}

    		return $class;
    	}

    	for ($i=0; $i < count($tuition_fees); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
                    <td><?php echo $tuition_fees[$i]['SYVFromYear'].' - '.$tuition_fees[$i]['SYVToYear'];?></td>
			        <td><?php echo $tuition_fees[$i]['TFTuitionFeesAmount'];?></td>
                    <td><?php echo $tuition_fees[$i]['TFTuitionFeesName'];?></td>
			        <td><?php echo returnTypeTuitionFees($tuition_fees[$i]['TFTuitionFeesType']);?></td>
			        <td><?php echo $tuition_fees[$i]['DFName'];?></td>
			        <td><?php echo returnClass($tuition_fees[$i]['TFClassId'],$classes);?></td>
			        <!--td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_edit">تعديل</button>
						  </td>

			        <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف</button>
						  </td>
			      </tr-->
    		<?php
    	}
    	?>
      
    </tbody>
  </table>
