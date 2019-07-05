<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
      require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
      require VIEW. $_SESSION['control_pq'] .'/home/index.php';
      require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
    }

    public function getModalBodyTitleGradesStudents()
    {
      $select = $this->loadModel('SelectData');
      $classes = $select->pqSelectAll("classes");
      ?>
      <div class="form-group">
        <label for="class_id">الصف</label>

        <select class="form-control" name="class_id" id="class_id">
          <?php
          for ($i=0; $i < count($classes); $i++) { 
            ?>
            <option value="<?php echo $classes[$i]['CId'];?>"><?php echo $classes[$i]['ClassName'];?></option>
            <?php
          }
          ?>
        </select>

      </div>
          
          
      <div class="form-group">
        <label for="val_title_grades_students">عنوان الدرجات</label>
        <input type="text" class="form-control" name="val_title_grades_students" id="val_title_grades_students" placeholder="عنوان الدرجات">
      </div>

      <div class="form-group">
        <label for="val_grade_student">الدرجة</label>
        <input type="text" class="form-control" name="val_grade_student" id="val_grade_student" placeholder=" الدرجة">
      </div>
      <?php
    }

    
    public function getModalBodyTitleExams()
    {
      $select = $this->loadModel('SelectData');
      $classes = $select->pqSelectAll("classes");
      ?>
      <div class="form-group">
        <label for="class_id">الصف</label>

        <select class="form-control" name="class_id" id="class_id">
          <?php
          for ($i=0; $i < count($classes); $i++) { 
            ?>
            <option value="<?php echo $classes[$i]['CId'];?>"><?php echo $classes[$i]['ClassName'];?></option>
            <?php
          }
          ?>
        </select>

      </div>
          
          
      <div class="form-group">
        <label for="val_title_exam">عنوان الامتحاني</label>
        <input type="text" class="form-control" name="val_title_exam" id="val_title_exam" placeholder="عنوان الامتحاني">
      </div>

      <?php
    }

    
    
    public function saveTitleGradesStudents()
    {
        $add = $this->loadModel('Add_New');


        $val_title_grades_students = $_POST['val_title_grades_students'];
        $val_grade_student         = $_POST['val_grade_student'];
        $class_id                  = $_POST['class_id'];


        $tablename = "title_grades_students";

        $arrayData = array(
          'TGSTitleGradesStudents' => "$val_title_grades_students",
          'TGSFullGrades' => "$val_grade_student",
          'TGSDate' => date('Y-m-d'),
          'TGSClassId' => "$class_id "
        );

        $return = $add->pqInsertData($tablename, $arrayData);

          
        if ($return) {
          echo "تم اضافة عنوان جديد للدرجات";
        }
    }
    
    public function saveTitleExam()
    {
        $add = $this->loadModel('Add_New');


        $val_title_exam = $_POST['val_title_exam'];
        $class_id       = $_POST['class_id'];


        $tablename = "titles_exams";

        $arrayData = array(
          'TETitleExam' => "$val_title_exam",
          'TEClassId' => "$class_id",
          'TEDate' => date('Y-m-d')
        );

        $return = $add->pqInsertData($tablename, $arrayData);

          
        if ($return) {
          echo "تم اضافة عنوان امتحاني جديد ";
        }
    }
    

    public function addPublicNotification()
    {
      $title_notification = $_POST['title_notification'];
      $text_notification = $_POST['text_notification'];
      $notification_options = $_POST['notification_options'];

      $add = $this->loadModel('Add_New');

      $tablename = "notifications";

        $arrayData = array(
        'NTitle' => "$title_notification",
        'NText' => "$text_notification",
        'NType' => "public",
        'NAddOptionAcceptOrReject' => "$notification_options",
        'NDate' => date('Y-m-d')
      );

      $return = $add->pqInsertData($tablename, $arrayData);

      if ($return) {
        echo "تم اضافة التبليغ";
      }
    }


}
