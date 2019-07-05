

<script type="text/javascript">

	function func_new_tuition_fees()
	{
		var id_school_year = $('#id_school_year').val();
		var id_departments_foundation_id   = $('#id_departments_foundation_id').val();
		var class_id   = $('#id_class_id').val();
		var id_tuition_fees_type   = $('#id_tuition_fees_type').val();
		var id_tuition_fees_name = $('#id_tuition_fees_name').val();
		var id_tuition_fees   = $('#id_tuition_fees').val();
		
		
		
		

		

			if(confirm("هل تريد اضفة قسط جديد"))
			{
				$.ajax({
			        url: "./add_tuition_fees/addTuitionFees",
			        type: "post",
			        data: {
			        	tuition_fees:id_tuition_fees,
			        	tuition_fees_type:id_tuition_fees_type,
			        	departments_foundation_id:id_departments_foundation_id,
			        	class_id:class_id,
			        	tuition_fees_name:id_tuition_fees_name,
			        	school_year:id_school_year
			        },
			        success: function (data) {

			           	alert(data);
			        },
			        error: function(jqXHR, textStatus, errorThrown) {
			           console.log(textStatus, errorThrown);
			        }


			    });
			}
		

	}


	function getClasses(val)
	{

		$.ajax({
	        url: "./add_tuition_fees/getHtmlClasses",
	        type: "post",
	        data: {
	        	dep_fon:val.value
	        },
	        success: function (data) {

	        	$('#id_div_casses').html(data);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }


	    });
	}



</script>
<div style="direction: rtl; width: 100%; padding: 10px;
    background: white; box-shadow: 1px 1px 5px -1px grey; margin-bottom: 10px;">


<div class="form-group">
    <label for="id_school_year">السنة الدراسية</label>

    <select class="form-control" id="id_school_year">
      <?php
      for ($i=0; $i < count($school_years); $i++) { 
        ?>
        <option value="<?php echo $school_years[$i]['SYVId'];?>"><?php echo $school_years[$i]['SYVFromYear']." - ".$school_years[$i]['SYVToYear'];?></option>
        <?php
      }
      ?>
    </select>

</div>

<div class="form-group">
    <label for="id_departments_foundation_id">قسم المؤسسة</label>

    <select class="form-control" onchange="getClasses(this);" name="departments_foundation_id" id="id_departments_foundation_id">
      <?php
      for ($i=0; $i < count($departments_foundation); $i++) { 
        ?>
        <option value="<?php echo $departments_foundation[$i]['DFId'];?>"><?php echo $departments_foundation[$i]['DFName'];?></option>
        <?php
      }
      ?>
    </select>

</div>

<div class="form-group" id="id_div_casses">
    
    <label for="id_class_id">الصف</label>

	    <select class="form-control" name="class_id" id="id_class_id">
	      
	        <option value="0">لا يوجد</option>
	       
	    </select>

</div>

<div class="form-group">
    <label for="id_tuition_fees_type">نوع القسط</label>
    <select class="form-control" name="tuition_fees_type" id="id_tuition_fees_type">
        <option value="month">شهري</option>
        <option value="year">سنوي</option>
    </select>
</div>

<div class="form-group has-success">
  <label class="control-label" for="id_tuition_fees_name">اسم القسط ( القسط الاول , القسط الثاني , ... , القسط الاخير )</label>
  <input type="text" class="form-control" id="id_tuition_fees_name" aria-describedby="helpBlock2">
</div>

<div class="form-group has-success">
  <label class="control-label" for="id_tuition_fees">مبلغ القسط</label>
  <input type="text" class="form-control" id="id_tuition_fees" aria-describedby="helpBlock2">
</div>




<hr >

<!-- Standard button -->
<button type="button" class="btn btn-default" onclick="func_new_tuition_fees()">اضافة قسط</button>


</div>