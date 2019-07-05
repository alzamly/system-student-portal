<script type="text/javascript">

	function func_new_school()
	{
		var input_school_name   = $('#input_school_name').val().trim();
		var structure_val   = $('#structure_val').val().trim();

		if (input_school_name !== "" ) 
		{
			if(confirm("هل تريد اضافة مدرسة جديدة"))
			{
				$.ajax({
			        url: "./new_school/addNewSchool",
			        type: "post",
			        data: {
			        	school_name:input_school_name,
			        	structure_val:structure_val
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
			alert("قم بادخال اسم المدرسة!");
		}

	}

</script>
<div style="direction: rtl;">

<div class="form-group has-success">
  <label class="control-label" for="input_school_name">اسم القسم</label>
  <input type="text" class="form-control" id="input_school_name" aria-describedby="helpBlock2">
</div>

<div class="form-group">
    <label for="structure_val">نوع القسم</label>

    <select class="form-control" name="structure_val" id="structure_val">
        <option value="sp_nurs">حضانة</option>
        <option value="sp_school">روضة</option>
        <option value="sp_school">مدرسة</option>
        <option value="sp_school">ثانوية</option>
    </select>

</div>


<hr >

<!-- Standard button -->
<button type="button" class="btn btn-default" onclick="func_new_school()">اضافة مدرسة</button>


</div>