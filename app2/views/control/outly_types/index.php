<style type="text/css">
#id_new_employee{
	width: 70%;
	margin: auto
}
</style>

<script type="text/javascript">

	function func_new_outly_type(){

		if (confirm("هل تريد اضافة نوع جديد للمصاريف")) 
		{

			var type_name   = $('#type_name').val().trim();

			$.ajax({
		        url: "./outly_types/addNewOutlyType",
		        type: "post",
		        data: {
		        	type_name:type_name
		        },
		        success: function (data) {
		           // you will get response from your php page (what you echo or print)                 
		           	alert(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}

	}
	 

</script>

<form id="id_new_employee" style="    direction: rtl;
    border: 1px solid #00000014;
    padding: 10px;
    width: 100%;
    background: white;
    box-shadow: 1px 1px 5px -1px grey;">


  <div class="form-group">
    <label for="type_name">نوع المصاريف</label>
    <input type="text" class="form-control" id="type_name" placeholder="نوع المصاريف">
  </div>
  
  
  <button type="button" class="btn btn-info" onclick="func_new_outly_type()">اضافة نوع جديد</button>
</form>


<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>نوع المصاريف</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($outly_types); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $outly_types[$i]['TOName'];?></td>
			        
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>

