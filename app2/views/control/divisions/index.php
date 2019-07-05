<script>
function func_set_form_daily_duties(div_id, class_id, class_title)
{
	$('.cls_title_daily_duties').text(' الواجبات اليومية - الصف '+class_title);
	  $.ajax({
	        url: "./divisions/getModalBodyDailyDuties",
	        type: "post",
	        data: {
	        	div_id:div_id,
	          	class_id:class_id
	        },
	        success: function (data) {
	          $("#id_body_daily_duties").html(data);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }


	    });
}


function func_add_daily_duties()
{
	var id_class_daily_duties   = $('#id_class_daily_duties').val().trim();
    var id_div_daily_duties   = $('#id_div_daily_duties').val().trim();
    var datepicker_id_date_daily_duties   = $('#datepicker_id_date_daily_duties').val().trim();
    var id_lessons_daily_duties   = $('#id_lessons_daily_duties').val().trim();
    var id_materials_daily_duties  = $('#id_materials_daily_duties').val().trim();
    var id_teachers_daily_duties = $('#id_teachers_daily_duties').val().trim();
	var id_text_daily_duties = $('#id_text_daily_duties').val().trim();
	

    if (id_class_daily_duties !== "" && id_div_daily_duties !== "" && datepicker_id_date_daily_duties !== "" && id_lessons_daily_duties !== "" && id_materials_daily_duties !== "" && id_teachers_daily_duties !== "" )
    {
      if(confirm("هل تريد حفظ الواجبات اليومية"))
      {
        $.ajax({
              url: "./divisions/saveDailyDuties",
              type: "post",
              data: {
                class_daily_duties:id_class_daily_duties,
                div_daily_duties:id_div_daily_duties,
                datepicker_id_date_daily_duties:datepicker_id_date_daily_duties,
                lessons_daily_duties:id_lessons_daily_duties,
                materials_daily_duties:id_materials_daily_duties,
                teachers_daily_duties:id_teachers_daily_duties,
                text_daily_duties:id_text_daily_duties
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
      alert("قم بادخال جميع البيانات !");
    }
}

function func_set_form_absences(div_id, class_id, class_title)
{
	$('.cls_title_absences').text(' الغيابات اليومية - الصف '+class_title);
	  $.ajax({
	        url: "./divisions/getModalBodyAbsences",
	        type: "post",
	        data: {
	        	div_id:div_id,
	          	class_id:class_id
	        },
	        success: function (data) {
	          $("#id_body_absences").html(data);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }


	    });
}


function func_add_absences()
{
	var id_class_absences   = $('#id_class_absences').val().trim();

    var id_div_absences   = $('#id_div_absences').val().trim();

    var datepicker_id_date_absences   = $('#datepicker_id_date_absences').val().trim();

    var id_lessons_absences   = $('#id_lessons_absences').val().trim();

    var id_materials_absences  = $('#id_materials_absences').val().trim();

    var id_teachers_absences = $('#id_teachers_absences').val().trim();

	var sList = "";
	$('input[name=absences_student_id]').each(function(){

		if(this.checked)
		{
			sList += $(this).val()+';';	
		}
		

	});

	if(sList.slice(-1) == ';')
	{
		sList = sList.substring(0, sList.length-1);

		//alert(sList);	
	}
	


    if (id_class_absences !== "" && id_div_absences !== "" && datepicker_id_date_absences !== "" && id_lessons_absences !== "" && id_materials_absences !== "" && id_teachers_absences !== "" )
    {
      if(confirm("هل تريد حفظ قائمة الغيابات"))
      {
        $.ajax({
              url: "./divisions/saveListAbsences",
              type: "post",
              data: {
                class_absences:id_class_absences,
                div_absences:id_div_absences,
                datepicker_id_date_absences:datepicker_id_date_absences,
                lessons_absences:id_lessons_absences,
                materials_absences:id_materials_absences,
                teachers_absences:id_teachers_absences,
                sList_students_id:sList
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
      alert("قم بادخال جميع البيانات !");
    }
}


</script>
<div class="row">

	<?php
	for ($i=0; $i < count($divisions); $i++) { 

		$class = $divisions[$i]['CId'];
		$div = $divisions[$i]['DId'];
		$class_n = $divisions[$i]['ClassName'];
		$div_n = $divisions[$i]['DivisionName'];
		?>


    <div class="col-lg-3" style=" margin-top: 5px;">
		<div style="    width: 250px;
		    height: 190px;
		    background: white;
		    border: 1px solid #3127271f;
		    box-shadow: 3px 0px 12px -1px gainsboro;
		        text-align: center;
		">

		<a href="<?php echo URL."students?class=$class&div=$div&class_n=$class_n&div_n=$div_n";?>" style=" font-size: 50px;"><?php echo $divisions[$i]['ClassName'];?></a>
		
		<h1><?php echo $divisions[$i]['DivisionName'];?></h1>
		

			<div class="col-lg-6" style="display: inline;">
				<button type="button" class="btn btn-info" onclick="func_set_form_daily_duties('<?php echo $divisions[$i]['DId'];?>','<?php echo $_GET['class']; ?>','<?php echo $divisions[$i]['ClassName']; ?>')" data-toggle="modal" data-target="#myModal_daily_duties">الواجبات</button>
			</div>
			<div class="col-lg-6" style="display: inline;">
				<button type="button" class="btn btn-info" onclick="func_set_form_absences('<?php echo $divisions[$i]['DId'];?>','<?php echo $_GET['class']; ?>','<?php echo $divisions[$i]['ClassName']; ?>')" data-toggle="modal" data-target="#myModal_absences">الغيابات</button>
			</div>

		</div>
	</div>



		<?php
	}
	?>

</div>

