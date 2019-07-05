<script type="text/javascript">

	function func_new_class()
	{
		var input_class_name   = $('#input_class_name').val().trim();
		var id_departments_foundation_id   = $('#id_departments_foundation_id').val().trim();
		

		if (input_class_name !== "" ) 
		{
			if(confirm("هل تريد اضفة صف جديد"))
			{
				$.ajax({
			        url: "./new_class/addNewClass",
			        type: "post",
			        data: {
			        	class_name:input_class_name,
			        	departments_foundation_id:id_departments_foundation_id
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
		else
		{
			alert("قم بادخال الصف و القسط!");
		}

	}

</script>
<div style="direction: rtl;">

<div class="form-group has-success">
  <label class="control-label" for="input_class_name">الصف</label>
  <input type="text" class="form-control" id="input_class_name" aria-describedby="helpBlock2">
</div>

<div class="form-group">
    <label for="id_departments_foundation_id">قسم المؤسسة</label>

    <select class="form-control" name="departments_foundation_id" id="id_departments_foundation_id">
      <?php
      for ($i=0; $i < count($departments_foundation); $i++) { 
        ?>
        <option value="<?php echo $departments_foundation[$i]['DFId'];?>"><?php echo $departments_foundation[$i]['DFName'];?></option>
        <?php
      }
      ?>
    </select>

</div>

<hr >

<!-- Standard button -->
<button type="button" class="btn btn-default" onclick="func_new_class()">اضافة صف</button>


</div>