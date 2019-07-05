<?php

class Classes extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

        $classes = $this->getClasses();



        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/classes/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getClasses() {
        
        $return = $this->select->pqGetRowsByAnyColumn("classes", "CDepartmentFoundationId", $_SESSION['sp_id_departments_foundation']);
        //pqSelectAll();
        return $return;
    }

    function getModalBodyTableWeekly() {
        $select = $this->loadModel('SelectData');

        $class_id = $_POST['class_id'];

        $days = $select->pqSelectAll("days");
        $lessons = $select->pqSelectAll("lessons");
        $materials = $select->pqSelectAll("material WHERE MClassId = $class_id");
        $divisions = $select->pqSelectAll("divisions WHERE ClassId = $class_id");
        $teachers = $select->pqSelectAll("users WHERE UPermission = 'teacher'");
        ?>

        <div class="form-group has-success">
            <input type="text" class="form-control" id="id_class_table_weekly" value="<?php echo $class_id; ?>" style=" display: none;">
        </div>





        <div class="form-group">
            <label for="id_days_table_weekly">اليوم</label>

            <select class="form-control" name="days_table_weekly" id="id_days_table_weekly">
        <?php
        for ($i = 0; $i < count($days); $i++) {
            ?>
                    <option value="<?php echo $days[$i]['DayId']; ?>"><?php echo $days[$i]['DayName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <div class="form-group">
            <label for="id_div_table_weekly">الشعبة</label>

            <select class="form-control" name="div_table_weekly" id="id_div_table_weekly">
        <?php
        for ($i = 0; $i < count($divisions); $i++) {
            ?>
                    <option value="<?php echo $divisions[$i]['DId']; ?>"><?php echo $divisions[$i]['DivisionName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <div class="form-group">
            <label for="id_lessons_table_weekly">الدرس</label>

            <select class="form-control" name="lessons_table_weekly" id="id_lessons_table_weekly">
        <?php
        for ($i = 0; $i < count($lessons); $i++) {
            ?>
                    <option value="<?php echo $lessons[$i]['LId']; ?>"><?php echo $lessons[$i]['LessonName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <div class="form-group">
            <label for="id_teachers_table_weekly">المعلمة</label>

            <select class="form-control" name="teachers_table_weekly" id="id_teachers_table_weekly">
        <?php
        for ($i = 0; $i < count($teachers); $i++) {
            ?>
                    <option value="<?php echo $teachers[$i]['UId']; ?>"><?php echo $teachers[$i]['UName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <div class="form-group">
            <label for="id_materials_table_weekly">المادة</label>

            <select class="form-control" name="materials_table_weekly" id="id_materials_table_weekly">
        <?php
        for ($i = 0; $i < count($materials); $i++) {
            ?>
                    <option value="<?php echo $materials[$i]['MId']; ?>"><?php echo $materials[$i]['MName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>


                <?php
            }

            public function getModalBodyExamsTable() {
                $select = $this->loadModel('SelectData');

                $class_id = $_POST['class_id'];

                //$days = $select->pqSelectAll("days");
                $titles_exams = $select->pqSelectAll("titles_exams");
                $materials = $select->pqSelectAll("material WHERE MClassId = $class_id");
                //$divisions = $select->pqSelectAll("divisions WHERE ClassId = $class_id");
                //$teachers = $select->pqSelectAll("users WHERE UPermission = 'teacher'");
                ?>
        <div class="form-group has-success">
            <input type="text" class="form-control" id="id_class_exams_table" value="<?php echo $class_id; ?>" style=" display: none;">
        </div>

        <div class="form-group">
            <label for="id_title_exam">عنوان جدول الامتحاني</label>

            <select class="form-control" name="title_exam" id="id_title_exam">
        <?php
        for ($i = 0; $i < count($titles_exams); $i++) {
            ?>
                    <option value="<?php echo $titles_exams[$i]['TEId']; ?>"><?php echo $titles_exams[$i]['TETitleExam']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <div class="form-group">
            <label for="id_materials_table_weekly">المادة</label>

            <select class="form-control" name="materials_exams_table" id="id_materials_exams_table">
                <?php
                for ($i = 0; $i < count($materials); $i++) {
                    ?>
                    <option value="<?php echo $materials[$i]['MId']; ?>"><?php echo $materials[$i]['MName']; ?></option>
                    <?php
                }
                ?>
            </select>

        </div>


        <div class="form-group has-success">
            <label for="id_materials_table_weekly">ملاحظات عن مادة الامتحان ( المادة الداخلة من والى )</label>
            <textarea class="form-control" id="id_notes_exams"></textarea>
        </div>
                <?php
            }

     

    

   

    public function addTableWeekly() {
        $add = $this->loadModel('Add_New');


        $class_table_weekly = $_POST['class_table_weekly'];
        $days_table_weekly = $_POST['days_table_weekly'];
        $div_table_weekly = $_POST['div_table_weekly'];
        $lessons_table_weekly = $_POST['lessons_table_weekly'];
        $teachers_table_weekly = $_POST['teachers_table_weekly'];
        $materials_table_weekly = $_POST['materials_table_weekly'];

        $tablename = "weekly_quota_table";

        $arrayData = array(
            'WQTMaterialId' => "$materials_table_weekly",
            'WQTUserId' => "$teachers_table_weekly",
            'WQTDayId' => "$days_table_weekly",
            'WQTLessonId' => "$lessons_table_weekly",
            'WQTClassId' => "$class_table_weekly",
            'WQTDivisionId' => "$div_table_weekly",
            'WQTDate' => date('Y-m-d')
        );

        $return = $add->pqInsertData($tablename, $arrayData);

        if ($return) {
            echo "تم اضافة جدول";
        }
    }

    public function addExamsTable() {
        $add = $this->loadModel('Add_New');


        $class_exams_table = $_POST['class_exams_table'];
        $materials_exams_table = $_POST['materials_exams_table'];
        $notes_exams = $_POST['notes_exams'];
        $datepicker_exam_date = $_POST['datepicker_exam_date'];
        $title_exam = $_POST['title_exam'];

        $timestamp = strtotime($datepicker_exam_date);
        $day = date('l', $timestamp);

        $arr_days = array(
            "Sunday" => "الاحد",
            "Monday" => "الاثنين",
            "Tuesday" => "الثلاثاء",
            "Wednesday" => "الاربعاء",
            "Thursday" => "الخميس",
            "Friday" => "الجمعة",
            "Saturday" => "السبت"
        );

        $choose_day = $arr_days[$day];

        $tablename = "exams_table";

        $arrayData = array(
            'ETClassId' => "$class_exams_table",
            'ETMaterialId' => "$materials_exams_table",
            'ETExamNotes' => "$notes_exams",
            'ETDay' => "$choose_day",
            'ETExamDate' => "$datepicker_exam_date",
            'ETDate' => date('Y-m-d'),
            'ETTitleExamId' => "$title_exam"
        );

        $return = $add->pqInsertData($tablename, $arrayData);

        if ($return) {
            echo "تم اضافة جدول الامتحانات";
        }
    }

}
?>