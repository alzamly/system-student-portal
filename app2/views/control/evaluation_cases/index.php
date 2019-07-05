<style type="text/css">
#id_new_employee{
	width: 70%;
	margin: auto
}
</style>

<script type="text/javascript">

	function func_new_evaluation_cases(){

		if (confirm("هل تريد اضافة حالة جديدة الى سلوكيات الطالب")) 
		{

			var case_text   = $('#case_text').val().trim();

			$.ajax({
		        url: "./evaluation_cases/addNewEvaluationCases",
		        type: "post",
		        data: {
		        	case_text:case_text
		        },
		        success: function (data) {
		           // you will get response from your php page (what you echo or print)                 
		           	alert(data);
		           	var case_text   = $('#case_text').val("");
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
    <label for="case_text">الحالة</label>
    <input type="text" class="form-control" id="case_text" placeholder="الحالة">
  </div>
  
  
  <button type="button" class="btn btn-info" onclick="func_new_evaluation_cases()">اضافة حالة جديدة</button>
</form>


<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>الحالات</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($evaluation_cases); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $evaluation_cases[$i]['ECCase'];?></td>
			        
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>

