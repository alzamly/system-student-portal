

<script type="text/javascript">

	function func_new_school_year()
	{
		
		var id_from_year   = $('#id_from_year').val();
		var id_to_year   = $('#id_to_year').val();

			if(confirm("هل تريد اضفة سنة دراسية"))
			{
				$.ajax({
			        url: "./add_school_year/addSchoolYear",
			        type: "post",
			        data: {
			        	from_year:id_from_year,
			        	to_year:id_to_year
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




</script>
<div style="direction: rtl; width: 100%; padding: 10px;
    background: white; box-shadow: 1px 1px 5px -1px grey; margin-bottom: 10px;">



<div class="form-group">
    <label for="id_from_year">السنة الدراسية (من)</label>

    <select class="form-control" id="id_from_year">
      <?php
      for ($i=2019; $i < 2030; $i++) { 
        ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
      }
      ?>
    </select>

</div>

<div class="form-group">
    <label for="id_to_year">السنة الدراسية (الى)</label>

    <select class="form-control" id="id_to_year">
      <?php
      for ($i=2020; $i < 2031; $i++) { 
        ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
      }
      ?>
    </select>

</div>


<hr >

<!-- Standard button -->
<button type="button" class="btn btn-default" onclick="func_new_school_year()">اضافة سنة دراسية</button>


</div>