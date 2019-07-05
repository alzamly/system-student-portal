

</div>
    </div>

    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo URL; ?>/resources/js/jquery-3.1.0.min.js"></script>
     <script src="<?php echo URL; ?>/resources/js/jquery-ui.js"></script>

     <script>

  //  $(document).ready(function(){

    $( function() {
        $( "#datepicker_exam_date" ).datepicker({ dateFormat: "yy-m-d" });
      } );
      
    $( function() {
        $( "#datepicker_id_date_daily_duties" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    $( function() {
        $( "#datepicker_id_date_absences" ).datepicker({ dateFormat: "yy-m-d" });
      } );
    
    $( function() {
        $( "#datepicker_date_from" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    $( function() {
        $( "#datepicker_date_student_payment" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    $( function() {
        $( "#datepicker_date_to" ).datepicker({ dateFormat: "yy-m-d" });
      } );


    // page add student
    $( function() {
        $( "#id_date_of_birth" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    $( function() {
        $( "#id_date_of_document" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    $( function() {
        $( "#id_date_commencement_at_school" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    $( function() {
        $( "#datepicker_outly_date" ).datepicker({ dateFormat: "yy-m-d" });
      } );

    



    //});


    </script>

      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo URL; ?>/resources/js/bootstrap.min.js"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
    <!-- Popper.JS>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script-->
    <!-- Bootstrap JS >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script-->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>




<!-- Modal add title grades students -->
<div class="modal fade" id="myModal_title_grades_students" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title ">عنوان درجات جديد</h4>


      </div>
      <div class="modal-body" id="id_body_title_grades_students">

          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_title_grades_students()">حفظ </button>
      </div>
    </div>
  </div>
</div>


<!-- Modal add title exams -->
<div class="modal fade" id="myModal_title_exams" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title ">عنوان امتحاني جديد</h4>


      </div>
      <div class="modal-body" id="id_body_title_exams">

          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_title_exams()">حفظ </button>
      </div>
    </div>
  </div>
</div>


<!-- Modal add private notifications -->
<div class="modal fade" id="myModal_add_public_notifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">اضافة تبليغ عام</h4>
      </div>
      <div class="modal-body" >
       

          <div class="form-group">
            <label for="id_title_notification">عنوان التبليغ</label>
            <input type="text" class="form-control" name="title_notification" id="id_title_notification" placeholder="عنوان التبليغ">
          </div>

          <div class="form-group has-success">
            <label>التبليغ</label>

              <textarea class="form-control" id="id_text_notification" placeholder="التبليغ"></textarea>
          </div>

          <div class="form-group">
            <label for="id_material">هل يتطلب اظهار خيار موافقة او عدم موافقة ولي امر الطالب</label>

            <select class="form-control" name="notification_options" id="id_notification_options">
             
                <option value="yes">نعم</option>
                <option value="no">لا</option>
               
            </select>

         </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_public_notification()">اضافة</button>
      </div>
    </div>
  </div>
</div>




<!-- modals page classes.php -->


  <!-- Modal add new div -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">اضافة شعبة</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group has-success">
            <input type="text" class="form-control" id="input_class_id" style=" display: none;">
          </div>

          <div class="form-group has-success">
            <label class="control-label" for="input_class_name">الشعبة</label>
            <input type="text" class="form-control" id="input_division_name" aria-describedby="helpBlock2">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_division()">اضافة شعبة</button>
      </div>
    </div>
  </div>
</div>

<!-- display div  -->
<div class="modal fade" id="myModal_display_div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">عرض الشُعب</h4>
      </div>
      <div class="modal-body" id="id_display_div">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
       
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



  <!-- Modal add new material -->
<div class="modal fade" id="myModal_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">اضافة مادة</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group has-success">
            <input type="text" class="form-control" id="input_class_id_material" style=" display: none;">
          </div>

          <div class="form-group has-success">
            <label class="control-label" for="input_material_name">المادة</label>
            <input type="text" class="form-control" id="input_material_name" aria-describedby="helpBlock2">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_material()">اضافة مادة</button>
      </div>
    </div>
  </div>
</div>




  <!-- Modal show materials -->
<div class="modal fade" id="myModal_show_materials" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cls_title_materials" id="myModalLabel"> عرض المواد </h4>
      </div>
      <div class="modal-body" id="id_modal_body_show_materials">
       
          


      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>





<!-- Modal add new table weekly -->
<div class="modal fade" id="myModal_table_weekly" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cls_table_weekly" id="myModalLabel">اضافة جدول</h4>
      </div>
      <div class="modal-body" id="id_body_table_weekly">
       
          


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_table_weekly()">اضافة جدول</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal add new exams table -->
<div class="modal fade" id="myModal_exams_table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cls_eaxams_table" id="myModalLabel">اضافة جدول الامتحانات</h4>
      </div>
      <div class="modal-body" >
       
        <div class="form-group">
          <label for="datepicker_date_from">تاريخ الامتحان</label>
          <input type="text" class="form-control" name="exam_date" id="datepicker_exam_date" placeholder="تاريخ الامتحان">
        </div>
        
        <div id="id_body_exams_table">


        </div> 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_exams_table()">اضافة جدول</button>
      </div>
    </div>
  </div>
</div>



<!-- end modals page classes.php -->












<!-- modals page students.php -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">تغيير شعبة الطالب</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group has-success">
            <input type="text" class="form-control" id="student_id" style=" display: none; ">
          </div>

          <?php
          for ($i=0; $i < count($divisions); $i++) 
          { 
            ?>
          
          <div class="radio" style=" text-align: left;">
            <label><input type="radio" name="div_n" id="id_div" value="<?php echo $divisions[$i]['DId'];?>"> <?php echo $divisions[$i]['DivisionName'];?></label>
          </div>
          <?php
          }
          ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_change_student_division()">تغيير الشعبة</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal_pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">تسديد القسط</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group has-success">
            <input type="text" class="form-control" id="id_student_school_year" style=" display: none; ">
          </div>

          <div class="form-group has-success">
            <input type="text" class="form-control" id="id_tuition_fees" style=" display: none; ">
          </div>

          <div class="form-group">
            <label for="id_payment_val">القسط</label>
            <input type="text" class="form-control" name="payment_val" id="id_payment_val" placeholder="المبلغ">
          </div>

          <div class="form-group">
            <label for="datepicker_date_student_payment">تاريخ الوصل</label>
            <input type="text" class="form-control" name="date_from" id="datepicker_date_student_payment" placeholder="تاريخ الوصل">
          </div>

          <div class="form-group">
            <label for="id_note">الملاحظات</label>
            <textarea class="form-control" name="note" id="id_note" placeholder="الملاحظات"></textarea>
          </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="func_payment_installment()">تسديد</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal evaluation level -->
<div class="modal fade" id="myModal_evaluation_level" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cls_eaxams_table" id="myModalLabel">اضافة تقييم الطالب</h4>
      </div>
      <div class="modal-body" >
       
        
        <div id="id_body_evaluation_level">


        </div> 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_evaluation_level()">اضافة تقييم</button>
      </div>
    </div>
  </div>
</div>



<?php
  if (@$_GET['div'] != 'all' && @$_GET['div'] > 0) {
  ?>
<!-- Modal add grades students -->
<div class="modal fade" id="myModal_add_grades_students" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">اضافة درجات الطالب</h4>
      </div>
      <div class="modal-body" id="id_body_add_grades_students">
       
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_grades_student()">اضافة</button>
      </div>
    </div>
  </div>
</div>

<?php
}
?>

<!-- Modal add private notifications -->
<div class="modal fade" id="myModal_add_private_notifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">اضافة تبليغ للطالب</h4>
      </div>
      <div class="modal-body" >
       
          <div class="form-group has-success">
            <input type="text" class="form-control" id="private_notifications_student_id" style=" display: none; ">
          </div>

          <div class="form-group">
            <label for="id_title_notification">عنوان التبليغ</label>
            <input type="text" class="form-control" name="title_notification" id="id_title_notification" placeholder="عنوان التبليغ">
          </div>

          <div class="form-group has-success">
            <label>التبليغ</label>

              <textarea class="form-control" id="id_text_notification" placeholder="التبليغ"></textarea>
          </div>

          <div class="form-group">
            <label for="id_material">هل يتطلب اظهار خيار موافقة او عدم موافقة ولي امر الطالب</label>

            <select class="form-control" name="notification_options" id="id_notification_options">
             
                <option value="yes">نعم</option>
                <option value="no">لا</option>
               
            </select>

         </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_private_notification()">اضافة</button>
      </div>
    </div>
  </div>
</div>


<!-- end modals page students.php -->



<!-- modals page divisions.php -->




<!-- Modal add absences -->
<div class="modal fade" id="myModal_absences" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cls_title_absences" id="myModalLabel">قائمة غيابات</h4>


      </div>
      <div class="modal-body" >
       
          <div class="form-group">
            <label for="datepicker_id_date_absences">تاريخ الغياب</label>
            <input type="text" class="form-control" name="date_absences" id="datepicker_id_date_absences" placeholder="تاريخ الغياب">
          </div>

          <div id="id_body_absences"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_absences()">حفظ الغيابات</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal add daily duties -->
<div class="modal fade" id="myModal_daily_duties" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    direction: rtl;
">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cls_title_daily_duties" id="myModalLabel">الواجبات اليومية</h4>


      </div>
      <div class="modal-body" >
       
          <div class="form-group">
            <label for="datepicker_id_date_daily_duties">تاريخ الواجبات</label>
            <input type="text" class="form-control" name="date_daily_duties" id="datepicker_id_date_daily_duties" placeholder="تاريخ الواجبات">
          </div>

          <div id="id_body_daily_duties"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
        <button type="button" class="btn btn-primary" onclick="func_add_daily_duties()">حفظ الواجبات</button>
      </div>
    </div>
  </div>
</div>




<!-- end modals page divisions.php -->










































































  </body>
</html>

















