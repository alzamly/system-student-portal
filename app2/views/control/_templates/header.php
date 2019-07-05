<!DOCTYPE html>
<html style=" direction:rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>بوابة الطالب</title>

    <!-- Bootstrap CSS CDN -->
    <link href="<?php echo URL; ?>/resources/css/jquery-ui.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>/resources/css/bootstrap.min.css" rel="stylesheet" />

    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    < Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>/resources/css/style5.css">

    <!-- Font Awesome JS >
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script-->

     <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

        <style>
        * {
            font-family: 'Cairo', sans-serif !important;
        }
        </style>
        
</head>

<body style=" text-align: right;">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>بوابة الطالب</h3><?php echo $_SESSION['sp_name'];?>
            </div>

            <ul class="list-unstyled components">
                <!--p>القائمة</p-->

                <?php if (@$_SESSION['sp_perm'] == 'sp_account') {;?>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">الطلاب</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo URL; ?>new_student">تسجيل طالب جديد</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>students_search">البحث عن الطلاب</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

                <?php if (@$_SESSION['sp_perm'] == 'sp_admin') {;?>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">المستخدمين</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="<?php echo URL; ?>new_employee">اضافة مسخدم جديد</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>employees">عرض المستخدمين</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

                <?php if (@$_SESSION['sp_perm'] == 'sp_admin') {;?>
                <li>
                    <a href="#pageSubmenu_schools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">المؤسسة</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu_schools">
                        <li>
                            <a href="<?php echo URL; ?>new_school">اضافة قسم</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>schools">عرض الاقسام</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

                <?php if (@$_SESSION['sp_perm'] == 'sp_admin') {;?>
                <li>
                    <a href="#pageSubmenu_classes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">الصفوف</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu_classes">
                        <li>
                            <a href="<?php echo URL; ?>new_class">اضافة صف جديد</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>departments_foundation">عرض الصفوف</a>
                        </li>
                    </ul>
                </li>
                <?php }?>


                <?php if (@$_SESSION['sp_perm'] == 'sp_admin') {;?>
                <li>
                    <a href="#pageSubmenu_tuition_fees" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">الاقساط</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu_tuition_fees">
                        <li>
                            <a href="<?php echo URL; ?>add_tuition_fees">اضافة قسط</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>tuition_fees">عرض الاقساط</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

               
                <?php if (@$_SESSION['sp_perm'] == 'sp_school') {;?>
                <li>
                    <a href="<?php echo URL; ?>classes" >الصفوف</a>
                </li>
                <?php }?>
                

                <?php if (@$_SESSION['sp_perm'] == 'sp_school') {;?>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal_add_public_notifications">التبليغات العامة</a>
                </li>
                <?php }?>


                <?php if (@$_SESSION['sp_perm'] == 'sp_account') {;?>
                <li>
                    <a href="#pageSubmenu_outly" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">المصاريف</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu_outly">
                        <li>
                            <a href="<?php echo URL; ?>add_outly">اضافة مصاريف</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>outly">عرض المصاريف</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>outly_types">انواع المصاريف</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

                <?php if (@$_SESSION['sp_perm'] == 'sp_school') {;?>
                <li>
                    <a href="#pageSubmenu_settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">الاعدادات</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu_settings">
                        
                        <li>
                            <a href="#" onclick="func_set_form_title_exams()" data-toggle="modal" data-target="#myModal_title_exams">عنوان امتحاني جديد</a>
                        </li>
                        <li>
                            <a href="#" onclick="func_set_form_title_grades_students()" data-toggle="modal" data-target="#myModal_title_grades_students">عنوان درجات جديد</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo URL; ?>evaluation_cases">قائمة تقييم سلوكيات الطالب</a>
                        </li>
                        
                    </ul>
                </li>
                <?php }?>

                <?php if (@$_SESSION['sp_perm'] == 'sp_admin') {;?>
                <li>
                    <a href="#pageSubmenu_school_year" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">السنة الدراسية</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu_school_year">
                        <li>
                            <a href="<?php echo URL; ?>add_school_year">اضافة سنة دراسية</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>school_years">عرض السنوات الدراسية</a>
                        </li>
                    </ul>
                </li>
                <?php }?>

                
                <li>
                    <a href="<?php echo URL; ?>logout" >تسجيل الخروج</a>
                </li>

            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo URL; ?>">الصفحة الرئيسية</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>















<script>


function func_set_form_title_grades_students()
{
    $.ajax({
          url: "./home/getModalBodyTitleGradesStudents",
          type: "post",
          data: {
          },
          success: function (data) {
            $("#id_body_title_grades_students").html(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      });
}


function func_set_form_title_exams()
{
    $.ajax({
          url: "./home/getModalBodyTitleExams",
          type: "post",
          data: {
          },
          success: function (data) {
            $("#id_body_title_exams").html(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      });
}



function func_add_title_grades_students()
{
    var val_title_grades_students   = $('#val_title_grades_students').val().trim();
    var val_grade_student   = $('#val_grade_student').val().trim();
    var class_id   = $('#class_id').val().trim();


    if (val_title_grades_students !== "" && val_grade_student !== "")
    {
      if(confirm("هل تريداضافة عنوان درجات جديد"))
      {
        $.ajax({
              url: "./home/saveTitleGradesStudents",
              type: "post",
              data: {
                val_title_grades_students:val_title_grades_students,
                val_grade_student:val_grade_student,
                class_id:class_id
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


function func_add_title_exams()
{
    var val_title_exam   = $('#val_title_exam').val().trim();
    var class_id   = $('#class_id').val().trim();


    if (val_title_exam !== "")
    {
      if(confirm("هل تريد اضافة عنوان امتحاني جديد"))
      {
        $.ajax({
              url: "./home/saveTitleExam",
              type: "post",
              data: {
                val_title_exam:val_title_exam,
                class_id:class_id
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



function func_add_public_notification()
{
  var id_title_notification   = $('#id_title_notification').val();
  var id_text_notification    = $('#id_text_notification').val();
  var id_notification_options = $('#id_notification_options').val();



  if(confirm("هل تريد اضافة تبليغ للطالب"))
  {
    $.ajax({
      url: './home/addPublicNotification',
      type: 'post',
      data:{
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
