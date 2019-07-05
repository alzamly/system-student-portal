<script>

function func_run_school_year(id)
{
	if (confirm("عند تفعيل هذه السنة الدراسية سيتم جعل السنوات الاخرى غير مفعلة")) {
		$.ajax({
			url: "./school_years/runSchoolYear",
			type: "post",
			data: {
				id:id
			},
			success: function(data){
				alert(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log(textStatus, errorThrown);
			}
		});
	};
}


</script>
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>السنة الدراسية (من)</th>
        <th>السنة الدراسية (الى)</th>
        <th>السنة الدراسية</th>
        <th>تفعيل السنة الدراسية</th>
      </tr>
    </thead>
    <tbody>
    	<?php

    	for ($i=0; $i < count($school_years); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $school_years[$i]['SYVFromYear'];?></td>
                    <td><?php echo $school_years[$i]['SYVToYear'];?></td>
			        <td><?php echo $school_years[$i]['SYVIsRunning'];?></td>
			        <td>
<button type="button" class="btn btn-info" onclick="func_run_school_year('<?php echo $school_years[$i]['SYVId'];?>')" >تفعيل</button>
					</td>

    		<?php
    	}
    	?>
      
    </tbody>
  </table>
