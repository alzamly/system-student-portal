
<script>


function func_set_class_id_material(id)
{
  $('#input_class_id_material').val(id);
}

function func_set_class_id(id)
{
  $('#input_class_id').val(id);
}

function func_set_modal_body_table_weekly(class_id,class_title)
{
  $('.cls_table_weekly').text(' اضافة الجدول - صف '+class_title);
  $.ajax({
        url: "./classes/getModalBodyTableWeekly",
        type: "post",
        data: {
          class_id:class_id
        },
        success: function (data) {
          $("#id_body_table_weekly").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}


function func_set_modal_body_exams_table(class_id,class_title)
{
  $('.cls_eaxams_table').text(' اضافة الجدول امتحانات - صف '+class_title);
  $.ajax({
        url: "./classes/getModalBodyExamsTable",
        type: "post",
        data: {
          class_id:class_id
        },
        success: function (data) {
          $("#id_body_exams_table").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}









function func_add_table_weekly()
{
  var id_class_table_weekly   = $('#id_class_table_weekly').val().trim();

  var id_days_table_weekly   = $('#id_days_table_weekly').val().trim();

  var id_div_table_weekly   = $('#id_div_table_weekly').val().trim();

  var id_lessons_table_weekly   = $('#id_lessons_table_weekly').val().trim();

  var id_teachers_table_weekly   = $('#id_teachers_table_weekly').val().trim();

  var id_materials_table_weekly   = $('#id_materials_table_weekly').val().trim();

  //  if (input_material_name !== "")
   // {
      if(confirm("هل تريد اضفة جدول"))
      {
        $.ajax({
              url: "./classes/addTableWeekly",
              type: "post",
              data: {
                class_table_weekly:id_class_table_weekly,
                days_table_weekly:id_days_table_weekly,
                div_table_weekly:id_div_table_weekly,
                lessons_table_weekly:id_lessons_table_weekly,
                teachers_table_weekly:id_teachers_table_weekly,
                materials_table_weekly:id_materials_table_weekly
              },
              success: function (data) {

                  alert(data);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }


          });
      }
   // }
  //  else
 //   {
   //   alert("قم بادخال الشعبة !");
   // }
}


function func_add_exams_table()
{
  var id_class_exams_table   = $('#id_class_exams_table').val().trim();

  var id_title_exam   = $('#id_title_exam').val().trim();
  
  var id_materials_exams_table   = $('#id_materials_exams_table').val().trim();

  var id_notes_exams   = $('#id_notes_exams').val().trim();

  var datepicker_exam_date   = $('#datepicker_exam_date').val().trim();
  

      if(confirm("هل تريد اضفة جدول الامتحانات"))
      {
        $.ajax({
              url: "./classes/addExamsTable",
              type: "post",
              data: {
                class_exams_table:id_class_exams_table,
                materials_exams_table:id_materials_exams_table,
                notes_exams:id_notes_exams,
                datepicker_exam_date:datepicker_exam_date,
                title_exam:id_title_exam
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


<table class="table table-striped" style=" direction: rtl;">

  <thead>
    <tr>
      <th style=" text-align: right;">#</th>
      <th style=" text-align: right;">الصف</th>
      <th style=" text-align: right;">اضافة شعبة</th>
      <th style=" text-align: right;">اضافة مادة</th>
      <th style=" text-align: right;">عرض المواد</th>
      <th style=" text-align: right;">اضافة الجدول</th>
      <th style=" text-align: right;">عرض الطلاب حسب الشعبة</th>
      <th style=" text-align: right;">عرض كل الطلاب</th>
      <th style=" text-align: center;">اضافة جدول الامتحانات</th>
    </tr>
  </thead>

  <tbody>

    <?php
    for ($i=0; $i < count($classes); $i++) { 

      $class = $classes[$i]['CId'];
      $class_n = $classes[$i]['ClassName'];
     ?>

     <tr  style=" text-align: right;">

        <td>
          <label><?php echo $i+1;?></label>
        </td>

        <td>
          <label><?php echo $classes[$i]['ClassName'];?></label>
        </td>

        <td>
          <button type="button" class="btn btn-dark" onclick="func_set_class_id('<?php echo $classes[$i]['CId'];?>')" data-toggle="modal" data-target="#myModal">اضافة شعبة</button>
        </td>

        <td>
          <button type="button" class="btn btn-default" onclick="func_set_class_id_material('<?php echo $classes[$i]['CId'];?>')" data-toggle="modal" data-target="#myModal_material">اضافة مادة</button>
        </td>

        <td>
          <button type="button" class="btn btn-default" onclick="func_show_materials('<?php echo $classes[$i]['CId'];?>','<?php echo $classes[$i]['ClassName'];?>')" data-toggle="modal" data-target="#myModal_show_materials">عرض المواد</button>
        </td>

        <td>
          <button type="button" class="btn btn-default" onclick="func_set_modal_body_table_weekly('<?php echo $classes[$i]['CId'];?>','<?php echo $classes[$i]['ClassName'];?>')" data-toggle="modal" data-target="#myModal_table_weekly">اضافة الجدول</button>
        </td>


        <td>
          <div>
            <a class="btn btn-info" href="<?php echo URL."divisions?class=".$classes[$i]['CId'];?>">عرض </a>
          </div>
        </td>

        <td>
          <div >
            <a class="btn btn-info" href="<?php echo URL."students?class=$class&div=all&class_n=$class_n&div_n=all";?>">عرض الطلبة</a>
          </div>
        </td>


        <td style=" text-align: center;">
          <button type="button" class="btn btn-default" onclick="func_set_modal_body_exams_table('<?php echo $classes[$i]['CId']; ?>','<?php echo $classes[$i]['ClassName'];?>')" data-toggle="modal" data-target="#myModal_exams_table">اضافة</button>
        </td>

     </tr>

     <?php
    }
    ?>

  </tbody>

</table>


