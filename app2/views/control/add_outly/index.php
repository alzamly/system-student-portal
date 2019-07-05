<style type="text/css">
#id_new_employee{
	width: 70%;
	margin: auto
}
</style>

<script type="text/javascript">

	function func_add_outly(){

		if (confirm("هل تريد اضافة المصاريف")) 
		{

			var outly_type    	 	   = $('#outly_type').val().trim();
			var amount    			   = $('#amount').val().trim();
			var note                   = $('#note').val().trim();
			var datepicker_outly_date  = $('#datepicker_outly_date').val().trim();
			var departments_foundation = $('#departments_foundation').val();

			$.ajax({
		        url: "./add_outly/addOutly",
		        type: "post",
		        data: {
		        	outly_type:outly_type,
		        	amount:amount,
		        	note:note,
		        	datepicker_outly_date:datepicker_outly_date,
		        	departments_foundation:departments_foundation
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
    <label for="departments_foundation">قسم المؤسسة</label>
    <select class="form-control" id="departments_foundation">
    	<?php for ($i=0; $i < count($departments_foundation); $i++) { 
    		?>
    		<option value="<?php echo $departments_foundation[$i]['DFId'];?>"><?php echo $departments_foundation[$i]['DFName'];?></option>
    <?php	}?>
	  
	</select>
  </div>

  <div class="form-group">
    <label for="outly_type">نوع المصاريف</label>
    <select class="form-control" id="outly_type">
    	<?php for ($i=0; $i < count($outly_types); $i++) { 
    		?>
    		<option value="<?php echo $outly_types[$i]['TOId'];?>"><?php echo $outly_types[$i]['TOName'];?></option>
    <?php	}?>
	  
	</select>
  </div>

  <div class="form-group">
    <label for="amount">المبلغ</label>
    <input type="text" class="form-control" id="amount" placeholder="المبلغ">
  </div>
  <div class="form-group">
    <label for="note">الملاحظات</label>
    <textarea class="form-control" id="note" placeholder="الملاحظات"></textarea>
  </div>
  <div class="form-group">
    <label for="datepicker_outly_date">تاريخ المصاريف</label>
    <input type="text" class="form-control" id="datepicker_outly_date" placeholder="تاريخ المصاريف">
  </div>

  
  
  <button type="button" class="btn btn-info" onclick="func_add_outly()">ادخال المصاريف</button>
</form>