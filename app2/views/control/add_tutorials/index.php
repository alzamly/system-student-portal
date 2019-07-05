<script type="text/javascript">

	function func_add_new_tutorial(course)
	{
		var input_tutorial_title   = $('#input_tutorial_title').val().trim();
		var input_tutorial_description    = $('#input_tutorial_description').val().trim();
		
		if (input_tutorial_title !== "" && course !== "") 
		{
			if(confirm("هل تريد إضافة درس جديد"))
			{
				$.ajax({
			        url: "./add_tutorials/addTutorial",
			        type: "post",
			        data: {
			        	tutorial_title:input_tutorial_title,
			        	tutorial_description:input_tutorial_description,
			        	course:course
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
		else
		{
			alert("قم بادخال عنوان الدرس !");
		}

	}

</script>

<div style="direction: rtl;">

	<div class="form-group has-success">
	  <label class="control-label" for="input_tutorial_title">عنوان الدرس</label>
	  <input type="text" class="form-control" id="input_tutorial_title" aria-describedby="helpBlock2">
	  <span id="helpBlock2" class="help-block"></span>
	</div>

	<hr >

	<div class="form-group">
		<label for="input_tutorial_description">وصف عن الدرس</label>
		<textarea class="form-control" rows="3" id="input_tutorial_description"></textarea>
	</div>

	<hr >

	<!-- Standard button -->
	<button type="button" class="btn btn-success" onclick="func_add_new_tutorial('<?php echo $_GET['course'];?>')">إضافة درس</button>

	<!-- Indicates a dangerous or potentially negative action -->
	<button type="button" class="btn btn-danger">الغاء</button>
</div>