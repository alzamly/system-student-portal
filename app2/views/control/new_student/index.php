<style type="text/css">
#id_new_employee{
	width: 70%;
	margin: auto
}
</style>

<script>

function func_check_username()
{
  var id_username_family = $('#id_username_family').val();

  $.ajax({
        url: "./new_student/checkUsernameIsFound",
        type: "post",
        data: {
          username_family:id_username_family
        },
        success: function (data) {

          if(data == "found")
          {
            $("#id_show_alert_check_family_username").css("display","block");
            $("#id_show_alert_check_family_username").html("اسم المستخدم موجود , اختر اسم مستخدم اخر");  
          }
          else
          {
            $("#id_show_alert_check_family_username").css("display","none");
          }
          
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}


  function getClasses(val)
  {

    $.ajax({
          url: "./new_student/getHtmlClasses",
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


  function getTuitionFees(val)
  {
    var id_departments_foundation_id = $("#id_departments_foundation_id").val();
    var class_id = $("#id_div_casses").val();

    $.ajax({
          url: "./new_student/getHtmlTuitionFeesByClass",
          type: "post",
          data: {
            departments_foundation_id:id_departments_foundation_id,
            class_id:class_id
          },
          success: function (data) {
            $('#id_div_tuition_fees').html(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      });
  }

var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; };

window.onload = function() {
    window.addEventListener("beforeunload", function (e) {
        if (formSubmitting) {
            return undefined;
        }

        var confirmationMessage = 'It looks like you have been editing something. '
                                + 'If you leave before saving, your changes will be lost.';

        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
    });
};


</script>



<form id="id_new_employee" method="post" onsubmit="setFormSubmitting()" action="<?php echo URL."new_student/addNewStudent";?>" style=" direction: rtl;
 border: 1px solid #00000014;
     width: 100%;
    
    " enctype="multipart/form-data">

    

<div style=" width: 100%; padding: 10px;
    background: white; box-shadow: 1px 1px 5px -1px grey; margin-bottom: 10px;">

<div style=" width: 100%; height: 40px; text-align: center;">
    <h3 style="margin: auto;">معلومات الطالب</h3>
  </div>

  <div class="form-group">
    <label for="id_student_name">اسم الطالب</label>
    <input type="text" class="form-control" name="student_name" id="id_student_name" placeholder="اسم الطالب">
  </div>
  <div class="form-group">
    <label for="id_father_name">اسم الاب</label>
    <input type="text" class="form-control" name="father_name" id="id_father_name" placeholder="اسم الاب">
  </div>
  <div class="form-group">
    <label for="id_father_job">مهنة الاب</label>
    <input type="text" class="form-control" name="father_job" id="id_father_job" placeholder="مهنة الاب">
  </div>

  <div class="form-group">
    <label for="id_mobile_number_father">رقم موبايل الاب</label>
    <input type="text" class="form-control" name="mobile_number_father" id="id_mobile_number_father" placeholder="رقم موبايل الاب">
  </div>
  <div class="form-group">
    <label for="id_mobile_number_mother">رقم موبايل الام</label>
    <input type="text" class="form-control" name="mobile_number_mother" id="id_mobile_number_mother" placeholder="رقم موبايل الام">
  </div>

  <div class="form-group">
    <label for="id_home_address">عنوان السكن واقرب نقطة دالة</label>
    <input type="text" class="form-control" name="home_address" id="id_home_address" placeholder="عنوان السكن واقرب نقطة دالة">
  </div>
  <div class="form-group">
    <label for="id_student_hometown_governorate">مسقط رأس الطالب - المحافظة</label>

    <select class="form-control" name="student_hometown_governorate" id="id_student_hometown_governorate">
      <?php
      for ($i=0; $i < count($governorates); $i++) { 
        ?>
        <option value="<?php echo $governorates[$i]['GId'];?>"><?php echo $governorates[$i]['GName'];?></option>
        <?php
      }
      ?>
    </select>

  </div>

  <hr>

  <div class="form-group">
    <label for="id_place_of_birth">محل الولادة</label>
    <input type="text" class="form-control" name="place_of_birth" id="id_place_of_birth" placeholder="محل الولادة">
  </div>
  <div class="form-group">
    <label for="id_date_of_birth">تاريخ الولادة</label>
    <input type="text" class="form-control" name="date_of_birth" id="id_date_of_birth" placeholder="تاريخ الولادة">
  </div>

  <hr>

  <div class="form-group">
    <label for="id_nationality_certificate_number">شهادة الجنسية ورقمها</label>
    <input type="text" class="form-control" name="nationality_certificate_number" id="id_nationality_certificate_number" placeholder="شهادة الجنسية ورقمها">
  </div>
  <div class="form-group">
    <label for="id_civil_status_id_number">هوية الاحوال المدنية الرقم</label>
    <input type="text" class="form-control" name="civil_status_id_number" id="id_civil_status_id_number" placeholder="هوية الاحوال المدنية الرقم">
  </div>

  <hr>

  <div class="form-group">
    <label for="id_school_transferred_from_them">المدرسة المنقول منها</label>
    <input type="text" class="form-control" name="school_transferred_from_them" id="id_school_transferred_from_them" placeholder="المدرسة المنقول منها">
  </div>

  <div class="form-group">
    <label for="id_governorate_transferred_from_them">المحافظة المنقول منها</label>

    <select class="form-control" name="governorate_transferred_from_them" id="id_governorate_transferred_from_them">
      <?php
      for ($i=0; $i < count($governorates); $i++) { 
        ?>
        <option value="<?php echo $governorates[$i]['GId'];?>"><?php echo $governorates[$i]['GName'];?></option>
        <?php
      }
      ?>
    </select>

  </div>

  <hr>

  <div class="form-group">
    <label for="id_number_of_document">رقم الوثيقة</label>
    <input type="text" class="form-control" name="number_of_document" id="id_number_of_document" placeholder="رقم الوثيقة">
  </div>

  <div class="form-group">
    <label for="id_date_of_document">تاريخ الوثيقة</label>
    <input type="text" class="form-control" name="date_of_document" id="id_date_of_document" placeholder="تاريخ الوثيقة">
  </div>

  <hr>

  <div class="form-group">
    <label for="id_date_commencement_at_school">تاريخ المباشرة بالمدرسة</label>
    <input type="text" class="form-control" name="date_commencement_at_school" id="id_date_commencement_at_school" placeholder="تاريخ المباشرة بالمدرسة">
  </div>
  <div class="form-group">
    <label for="id_class_which_he_accepted">الصف الذي قبل فيه</label>
    <input type="text" class="form-control" name="class_which_he_accepted" id="id_class_which_he_accepted" placeholder="الصف الذي قبل فيه">
  </div>
  <div class="form-group">
    <label for="id_does_he_have_failure_at_primary_school">هل لديه رسوب في المرحلة الابتدائية</label>
    <input type="text" class="form-control" name="does_he_have_failure_at_primary_school" id="id_does_he_have_failure_at_primary_school" placeholder="هل لديه رسوب في المرحلة الابتدائية">
  </div>

  <hr>

  
  <div class="form-group">
    <label for="id_number_family_members">عدد افراد الاسرة</label>
    <input type="text" class="form-control" name="number_family_members" id="id_number_family_members" placeholder="عدد افراد الاسرة">
  </div>
  <div class="form-group">
    <label for="id_order_student_between_the_sons">ترتيب الطالب بين الابناء</label>
    <input type="text" class="form-control" name="order_student_between_the_sons" id="id_order_student_between_the_sons" placeholder="ترتيب الطالب بين الابناء">
  </div>
  <div class="form-group">
    <label for="id_number_of_brothers">عدد الاخوة</label>
    <input type="text" class="form-control" name="number_of_brothers" id="id_number_of_brothers" placeholder="عدد الاخوة">
  </div>
  <div class="form-group">
    <label for="id_number_of_sister">عدد الاخوات</label>
    <input type="text" class="form-control" name="number_of_sister" id="id_number_of_sister" placeholder="عدد الاخوات">
  </div>
  <div class="form-group">
    <label for="id_house_number">رقم الدار</label>
    <input type="text" class="form-control" name="house_number" id="id_house_number" placeholder="رقم الدار">
  </div>
  <div class="form-group">
    <label for="id_sheet">الصحيفة</label>
    <input type="text" class="form-control" name="sheet" id="id_sheet" placeholder="الصحيفة">
  </div>
  <div class="form-group">
    <label for="id_record">السجل</label>
    <input type="text" class="form-control" name="record" id="id_record" placeholder="السجل">
  </div>
  <div class="form-group">
    <label for="id_educational_achievement_of_father">التحصيل الدراسي للاب</label>
    <input type="text" class="form-control" name="educational_achievement_of_father" id="id_educational_achievement_of_father" placeholder="التحصيل الدراسي للاب">
  </div>
  <div class="form-group">
    <label for="id_educational_achievement_of_mother">التحصيل الدراسي للام</label>
    <input type="text" class="form-control" name="educational_achievement_of_mother" id="id_educational_achievement_of_mother" placeholder="التحصيل الدراسي للام">
  </div>
  <div class="form-group">
    <label for="id_number_rooms_occupied_by_the_family">عدد الغرف التي تشغلها الاسرة</label>
    <input type="text" class="form-control" name="number_rooms_occupied_by_the_family" id="id_number_rooms_occupied_by_the_family" placeholder="عدد الغرف التي تشغلها الاسرة">
  </div>
  <div class="form-group">
    <label for="id_photo">الصورة</label>
    <input type="file" name="file" id="file" class="form-control" aria-describedby="helpBlock2" /> 
  </div>


</div>





<div style=" width: 100%; padding: 10px;
    background: white; box-shadow: 1px 1px 5px -1px grey; margin-bottom: 10px;">


    <div style=" width: 100%; height: 40px; text-align: center;">
    <h3 style="margin: auto;">مكان قبول الطالب</h3>
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

  <div class="form-group" id="">
    <label for="id_class_id">الصف</label>



      <select class="form-control"  name="class_id" id="id_div_casses">
        
        
          <option value="0">لا يوجد</option>
         
      </select>

  </div>

</div>




<div style=" width: 100%; padding: 10px;
    background: white; box-shadow: 1px 1px 5px -1px grey; margin-bottom: 10px;">


    <div style=" width: 100%; height: 40px; text-align: center;">
    <h3 style="margin: auto;">العام الدراسي <?php echo "( ".$school_year[0]['SYVFromYear']." - ".$school_year[0]['SYVToYear']." )";?></h3>
  </div>




  <div class="form-group">
    <label for="id_type_pay_tuition_fees">القسط حسب تاريخ قبول الطالب</label>

    <select class="form-control" name="type_pay_tuition_fees" id="id_type_pay_tuition_fees">
      <option value="full">قسط كامل</option>
      <option value="half">نصف قسط</option>
    </select>

  </div>


  

  <div class="form-group">
    <label for="id_discount_tuition_fees">نسبة الخصم</label>

    <select class="form-control" name="discount_tuition_fees" id="id_discount_tuition_fees">
      <?php
      for ($i=0; $i < count($discount_percentage); $i++) { 
        ?>
        <option value="<?php echo $discount_percentage[$i]['DPId'];?>"><?php echo $discount_percentage[$i]['DPDiscount']."%";?></option>
        <?php
      }
      ?>
    </select>

  </div>

  <div class="form-group">
    <label for="id_discount_not_part_all">الخصم شامل على كل القسط ام قسم معين</label>

    <select class="form-control" name="discount_not_part_all" onchange="getTuitionFees(this);" id="id_discount_not_part_all">
      
        <option value="not">لا يملك</option>
        <option value="part">على قسم معين</option>
        <option value="all">شامل</option>
       
    </select>

  </div>

  <div class="form-group" id="">
    <label for="id_div_tuition_fees">القسط</label>

    <select class="form-control" name="tuition_fees_id" id="id_div_tuition_fees">

        <option value="0">ليس لديه خصم</option>
       
    </select>

  </div>

  

</div>



<div style=" width: 100%; padding: 10px;
    background: white; box-shadow: 1px 1px 5px -1px grey; margin-bottom: 10px;">


  <div style=" width: 100%; height: 40px; text-align: center;">
    <h3 style="margin: auto;">حساب الطالب</h3>
  </div>
  
  <div class="form-group">
    <label for="id_username_family">اسم المستخدم</label>
    <input type="text" onkeyup="func_check_username()" class="form-control" name="username_family" id="id_username_family" placeholder="اسم المستخدم">
    <div id="id_show_alert_check_family_username" style=" width: 100%; background: #f443366e; padding: 7px; margin-top: 2px; border-radius: 4px; display: none;"></div>
  </div>
  <div class="form-group">
    <label for="id_password_family">كلمة المرور</label>
    <input type="password" class="form-control" name="password_family" id="id_password_family" placeholder="كلمة المرور">
  </div>
  
</div>

  <input type="submit" value="اضافة طالب جديد" class="btn btn-default">
</form>