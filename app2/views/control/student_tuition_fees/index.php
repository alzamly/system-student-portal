<script>

function func_set_data_student_payment(id_student_school_year, id_tuition_fees)
{
  $('#id_student_school_year').val(id_student_school_year);
  $('#id_tuition_fees').val(id_tuition_fees);
}

function func_payment_installment()
{
  var id_student_school_year          = $('#id_student_school_year').val();
  var id_tuition_fees                 = $('#id_tuition_fees').val();
  var id_payment_val                  = $('#id_payment_val').val();
  var datepicker_date_student_payment = $('#datepicker_date_student_payment').val();
  var id_note                         = $('#id_note').val();


  if (id_student_school_year > 0 && id_tuition_fees > 0) {

  if(confirm("هل تريد حفظ مبلغ تسديد القسط"))
  {
    $.ajax({
      url: './student_tuition_fees/paymentInstallment',
      type: 'post',
      data:{
        id_student_school_year: id_student_school_year,
        id_tuition_fees: id_tuition_fees,
        id_payment_val: id_payment_val,
        datepicker_date_student_payment: datepicker_date_student_payment,
        id_note: id_note
      },
      success: function(data){
        alert(data);
      },
      error: function(jqXHR, textStatus, errorThrown){

      }
    });
  }

  }else{
    alert("حدث خطأ قم بتحميل الصفحة مرة اخرى واعد المحاولة");
  }
}


</script>

<?php
function returnClassName($classes, $id_class)
{
  $class_name = "لا يوجد";

  for ($i=0; $i < count($classes); $i++) { 
    if ($classes[$i]['CId'] == $id_class) {
      $class_name = $classes[$i]['ClassName'];
    }
  }

  return $class_name;
}

function returnDivName($divisions, $id_div)
{
  $div_name = "لا يوجد";

  for ($i=0; $i < count($divisions); $i++) { 
    if ($divisions[$i]['DId'] == $id_div) {
      $div_name = $divisions[$i]['DivisionName'];
    }
  }

  return $div_name;
}

function returnDiscount($discounts, $id)
{
  $discount = "لا يوجد";

  for ($i=0; $i < count($discounts); $i++) { 
    if ($discounts[$i]['DPId'] == $id) {
      $discount = $discounts[$i]['DPDiscount'];
    }
  }

  return $discount;
}

function returnNameTuitionFees($tuition_fees, $id)
{
  $tuition = "";

  for ($i=0; $i < count($tuition_fees); $i++) { 
    if ($tuition_fees[$i]['TFId'] == $id) {
      $tuition = $tuition_fees[$i]['TFTuitionFeesName'];
    }
  }

  return $tuition;
}

function returnAmountTuitionFees($tuition_fees, $id)
{
  $tuition = "";

  for ($i=0; $i < count($tuition_fees); $i++) { 
    if ($tuition_fees[$i]['TFId'] == $id) {
      $tuition = $tuition_fees[$i]['TFTuitionFeesAmount'];
    }
  }

  return $tuition;
}



?>
<table class="table table-striped">
    <thead>
      <tr>
        <th>اسم الطالب</th>
        <th>العام الدراسي</th>
        <th>قسم المؤسسة</th>
        <th>الصف</th>
        <th>الشعبة</th>
      </tr>
    </thead>
    <tbody>
    	
    			  <tr>
			        
			        <td><?php echo $students[0]['SName'];?></td>
              <td><?php echo $students[0]['SYVFromYear']." - ".$students[0]['SYVToYear'];?></td>
              <td><?php echo $students[0]['DFName'];?></td>
              <td><?php echo returnClassName($classes,$students[0]['SYClassId']);?></td>
              <td><?php echo returnDivName($divisions, $students[0]['SYDivId']);?></td>
			      </tr>
    	
      
    </tbody>
  </table>

  <br>
  <br>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>القسط حسب تاريخ قبول الطالب</th>
        <th>الخصم شامل على كل القسط ام قسم معين</th>
        <th>القسط الذي عليه الخصم</th>
        <th>نسبة الخصم</th>
        <th>مبلغ نسبة الخصم</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        
        <td><?php if($students[0]['SYTypePayTuitionFees'] == "full") { echo "قسط كامل";} elseif($students[0]['SYTypePayTuitionFees'] == "half"){echo "نصف قسط";}?></td>
        <td>
          <?php 
          if($students[0]['SYDiscountNotOrPartOrAll'] == "not") {
           echo "لا يملك";
          } elseif($students[0]['SYDiscountNotOrPartOrAll'] == "part"){
            echo "على قسم معين";
          } elseif($students[0]['SYDiscountNotOrPartOrAll'] == "all"){
            echo "شامل";
          }?>
        </td>
        <td><?php echo returnNameTuitionFees($tuition_fees,$students[0]['SYIdTuitionFees'])." ( ".returnAmountTuitionFees($tuition_fees,$students[0]['SYIdTuitionFees'])." )";?></td>
        <td><?php echo returnDiscount($discounts,$students[0]['SYDiscountTuitionFeesId'])." %";?></td>
        <td><?php if(returnDiscount($discounts,$students[0]['SYDiscountTuitionFeesId']) > 0){ echo (returnAmountTuitionFees($tuition_fees,$students[0]['SYIdTuitionFees'])/returnDiscount($discounts,$students[0]['SYDiscountTuitionFeesId']));}?></td>
      </tr>
      
      
    </tbody>
  </table>







  <br>
  <br>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>عنوان القسط</th>
        <th>مبلغ القسط</th>
        <th>الخصم</th>
        <th>مبلغ القسط بعد الخصم</th>
        <th>المبلغ المدفوع</th>
        <th>تاريخ الوصل</th>
        <th>المتبقي</th>
        <th>تسديد القسط</th>
      </tr>
    </thead>
    <tbody>


      <?php

      function returnAmountStudentPayment($student_payment_tuition_fees,$tuition_fees_id)
      {
        $amount = 0;
        for ($k=0; $k < count($student_payment_tuition_fees); $k++) { 
          if ($student_payment_tuition_fees[$k]['PITuitionFeesId'] == $tuition_fees_id) {
            $amount = $student_payment_tuition_fees[$k]['PIPayment'];
          }
        }

        return $amount;
      }

      function returnDateStudentPayment($student_payment_tuition_fees,$tuition_fees_id)
      {
        $date = 0;
        for ($k=0; $k < count($student_payment_tuition_fees); $k++) { 
          if ($student_payment_tuition_fees[$k]['PITuitionFeesId'] == $tuition_fees_id) {
            $date = $student_payment_tuition_fees[$k]['PIDatePaid'];
          }
        }

        return $date;
      }




        for ($i=0; $i < count($tuition_fees); $i++) 
        { 

          $amount_tuition_fees_after_discount = 0;
          $discount_amount = 0;

          if ($tuition_fees[$i]['TFId']==$tuition_fees[$i]['SYIdTuitionFees']) {
           
            $discount_amount = (returnAmountTuitionFees($tuition_fees,$tuition_fees[$i]['SYIdTuitionFees'])/returnDiscount($discounts,$tuition_fees[$i]['SYDiscountTuitionFeesId']));

          }

          $amount_tuition_fees_after_discount = $tuition_fees[$i]['TFTuitionFeesAmount'] - $discount_amount;

          $student_amount_payment = returnAmountStudentPayment($student_payment_tuition_fees,$tuition_fees[$i]['TFId']);
          $date_student_payment   = returnDateStudentPayment($student_payment_tuition_fees,$tuition_fees[$i]['TFId']);
      ?>
      <tr>

        <td><?php echo $tuition_fees[$i]['TFTuitionFeesName'];?></td>
        <td>
          <?php echo number_format($tuition_fees[$i]['TFTuitionFeesAmount']);?>
        </td>
        <td><?php echo number_format($discount_amount);?></td>
        <td>
          <?php echo number_format($amount_tuition_fees_after_discount);?>
        </td>
        <td><?php echo number_format($student_amount_payment);?></td>
        <td><?php echo $date_student_payment;?></td>
        <td><?php echo number_format($student_amount_payment-$amount_tuition_fees_after_discount);?></td>
        <td>
          <button type="button" class="btn btn-secondary rounded-0" onclick="func_set_data_student_payment('<?php echo $tuition_fees[$i]['SYId'];?>','<?php echo $tuition_fees[$i]['TFId'];?>')" data-toggle="modal" data-target="#myModal_pay">تسديد</button>
        </td>
      </tr>

       <?php
        }
        ?>
      
      
    </tbody>
  </table>