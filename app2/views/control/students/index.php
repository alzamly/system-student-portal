
<script>


function func_set_student_id(student)
{
	$('#student_id').val(student);
}

function func_set_student_id_private_notifications(student)
{
  $('#private_notifications_student_id').val(student);
}

function func_set_student_id_for_payment(student)
{
 $('#student_id_payment').val(student); 
}

function func_change_student_division()
{
	var student = $('#student_id').val();
	var div = $('input[name="div_n"]:checked').val();



	if(confirm("هل تريد تغيير شعبة الطالب"))
	{
		$.ajax({
			url: './students/changeStudentDiv',
			type: 'post',
			data:{
				student: student,
				div: div
			},
			success: function(data){
				alert(data);
			},
			error: function(jqXHR, textStatus, errorThrown){

			}
		});
	}
}



function func_payment_installment()
{
  var student              = $('#student_id_payment').val();
  var payment_val       = $('#id_payment_val').val();
  var note                 = $('#id_note').val();
  var datepicker_date_from = $('#datepicker_date_from').val();
  var datepicker_date_to   = $('#datepicker_date_to').val();
  var class_num            = $('#class_num').val();



  if(confirm("هل تريد حفظ مبلغ تسديد القسط"))
  {
    $.ajax({
      url: './students/paymentInstallment',
      type: 'post',
      data:{
        student: student,
        payment_val: payment_val,
        note: note,
        datepicker_date_from: datepicker_date_from,
        datepicker_date_to: datepicker_date_to,
        class_num: class_num
      },
      success: function(data){
        alert(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    });
  }
}


function func_set_modal_evaluation_level(student, class_id)
{

  $.ajax({
        url: "./students/getModalBodyEvaluationLevel",
        type: "post",
        data: {
          student:student,
          class_id:class_id
        },
        success: function (data) {
          $("#id_body_evaluation_level").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}


function func_add_evaluation_level()
{
  var student                  = $('#id_num_student').val();
  var id_evaluation_level_text = $('#id_evaluation_level_text').val();
  var id_note                  = $('#id_note_evaluation_level').val();


  if(confirm("هل تريد اضافة تقييم الطالب"))
  {
    $.ajax({
      url: './students/addEvaluationLevelStudents',
      type: 'post',
      data:{
        student: student,
        evaluation_level_text: id_evaluation_level_text,
        note: id_note
      },
      success: function(data){
        alert(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    });
  }
}


function func_add_grades_student()
{
  var student                 = $('#student_id_grades_students').val();
  var class_id                = $('#class_id').val();
  var id_type_grades_students = $('#id_type_grades_students').val();
  var id_material             = $('#id_material').val();
  var id_grade_student        = $('#id_grade_student').val();



  if(confirm("هل تريد اضافة درجة الطالب"))
  {
    $.ajax({
      url: './students/addGradesStudents',
      type: 'post',
      data:{
        student: student,
        class_id: class_id,
        type_grades_students: id_type_grades_students,
        material: id_material,
        grade_student: id_grade_student
      },
      success: function(data){
        alert(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    });
  }
}



function func_set_form_add_grades_students(student,class_id)
{
    $.ajax({
          url: "./students/getModalBodyAddGradesStudents",
          type: "post",
          data: {
            student:student,
            class_id:class_id
          },
          success: function (data) {
            $("#id_body_add_grades_students").html(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      });
}

function func_add_private_notification()
{
  var student                 = $('#private_notifications_student_id').val();
  var id_title_notification   = $('#id_title_notification').val();
  var id_text_notification    = $('#id_text_notification').val();
  var id_notification_options = $('#id_notification_options').val();



  if(confirm("هل تريد اضافة تبليغ للطالب"))
  {
    $.ajax({
      url: './students/addPrivateNotification',
      type: 'post',
      data:{
        student: student,
        title_notification: id_title_notification,
        text_notification: id_text_notification,
        notification_options: id_notification_options
      },
      success: function(data){
        alert(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    });
  }
}


</script>

<div style="width: 100%; height: 50px; text-align: center;">

	<?php
	if ($_GET['div_n'] == 'all') {
		?>
		<h1><?php echo $_GET['class_n'];?></h1>
	<?php
	}
	else
	{
	?>
		<h1><?php echo $_GET['div_n']." - ".$_GET['class_n'];?></h1>
	<?php
	}
	?>

</div>

<table class="table table-striped" style=" direction: rtl;">

  <thead>
    <tr>
      <th style=" text-align: right;">#</th>
      <th style=" text-align: right;">اسم الطالب</th>
      <th style=" text-align: right;">الشعبة</th>
      <th style=" text-align: right;">عرض بيانات الطالب</th>
      <th style=" text-align: right;">تغيير الشعبة</th>
      <th style=" text-align: right;">القسط المدفوع</th>
      <th style=" text-align: right;">القسط المتبقي</th>
      <th style=" text-align: right;">تسديد القسط</th>
      <th style=" text-align: right;">تقييم مستوى</th>
      <?php
      if ($_GET['div'] != 'all' && $_GET['div'] > 0) {
      ?>
      <th style=" text-align: right;">ادخال درجات</th>
      <?php
      }
      ?>
      <th style=" text-align: right;">التبليغات</th>
    </tr>
  </thead>

  <tbody>

    <?php

    function return_div($divisions,$div_id)
    {
    	$ret = "";
    	for ($i=0; $i < count($divisions); $i++) { 
    		if($divisions[$i]['DId'] == $div_id)
    		{
    			$ret = $divisions[$i]['DivisionName'];
    		}
    	}

    	return $ret;
    }

    function return_payment_installment($payment_installment, $student)
    {
      $payment = 0;

      for ($i=0; $i < count($payment_installment); $i++) { 
        if($payment_installment[$i]['PIStudentId'] == $student)
        {
          $payment += $payment_installment[$i]['PIPayment'];
        }
      }
      return $payment;
    }

    for ($i=0; $i < count($students); $i++) { 
     ?>

     <tr  style=" text-align: right;">

        <td>
          <label><?php echo $i+1;?></label>
        </td>

        <td>
          <label><?php echo $students[$i]['SName'];?></label>
        </td>

        <td style="<?php if(return_div($divisions,$students[$i]['SDivisionId']) == ""){echo "background: #f4433633;";} ?>">
          <label><?php echo return_div($divisions,$students[$i]['SDivisionId']);?></label>
        </td>

        <td>
          <a class="btn btn-default" href="<?php echo URL."divisions?class=";?>">عرض بيانات الطالب</a>
        </td>

        <td>

          <button type="button" class="btn btn-default" onclick="func_set_student_id('<?php echo $students[$i]['SId'];?>')" data-toggle="modal" data-target="#myModal">تغيير الشعبة</button>
        </td>

        <td>
          <label><?php echo return_payment_installment($payment_installment, $students[$i]['SId']);?></label>
        </td>
        <td>
          <label><?php echo $calss_data[0]['AmountPremium'] - return_payment_installment($payment_installment, $students[$i]['SId']);?></label>
        </td>

        <td>

          <button type="button" class="btn btn-default" onclick="func_set_student_id_for_payment('<?php echo $students[$i]['SId'];?>')" data-toggle="modal" data-target="#myModal_pay">تسديد</button>
        </td>

        <td>

          <button type="button" class="btn btn-default" onclick="func_set_modal_evaluation_level('<?php echo $students[$i]['SId'];?>','<?php echo $students[$i]['SClassId'];?>')" data-toggle="modal" data-target="#myModal_evaluation_level">تقييم</button>
        </td>

        <?php
        if ($_GET['div'] != 'all' && $_GET['div'] > 0) {
        ?>
        <td>

          <button type="button" class="btn btn-default" onclick="func_set_form_add_grades_students('<?php echo $students[$i]['SId'];?>','<?php echo $students[$i]['SClassId'];?>')" data-toggle="modal" data-target="#myModal_add_grades_students">اضافة</button>
        </td>
        <?php
        }
        ?>

        <td>

          <button type="button" class="btn btn-default" onclick="func_set_student_id_private_notifications('<?php echo $students[$i]['SId'];?>')" data-toggle="modal" data-target="#myModal_add_private_notifications">تبليغ</button>
        </td>

     </tr>

     <?php
    }
    ?>

  </tbody>

</table>

