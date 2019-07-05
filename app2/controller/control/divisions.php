<?php

class Divisions extends Controller {

    public function index($name = '') {
        $divisions = $this->getDivisions();

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/divisions/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getDivisions() {
        $select = $this->loadModel('SelectData');

        $class = $_GET['class'];

        $return = $select->pqSelectAll("classes,divisions WHERE classes.CId=$class AND divisions.ClassId = classes.CId");
        return $return;
    }

    public function getModalBodyAbsences() {
        $select = $this->loadModel('SelectData');

        $div_id = $_POST['div_id'];
        $class_id = $_POST['class_id'];

        $teachers = $select->pqSelectAll("users WHERE UPermission = 'teacher'");
        $materials = $select->pqSelectAll("material WHERE MClassId = $class_id");
        $lessons = $select->pqSelectAll("lessons");

        $students = $select->pqSelectAll("students WHERE SDivisionId = $div_id AND SClassId = $class_id");
        ?>

        <div class="form-group has-success">
            <input type="text" class="form-control" id="id_class_absences" value="<?php echo $class_id; ?>" style=" display: none;">
        </div>

        <div class="form-group has-success">
            <input type="text" class="form-control" id="id_div_absences" value="<?php echo $div_id; ?>" style=" display: none;">
        </div>




        <div class="form-group">
            <label for="id_lessons_absences">الدرس</label>

            <select class="form-control" name="lessons_absences" id="id_lessons_absences">
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
            <label for="id_materials_absences">المادة</label>

            <select class="form-control" name="materials_absences" id="id_materials_absences">
        <?php
        for ($i = 0; $i < count($materials); $i++) {
            ?>
                    <option value="<?php echo $materials[$i]['MId']; ?>"><?php echo $materials[$i]['MName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>


        <div class="form-group">
            <label for="id_teachers_absences">المعلمة</label>

            <select class="form-control" name="teachers_absences" id="id_teachers_absences">
        <?php
        for ($i = 0; $i < count($teachers); $i++) {
            ?>
                    <option value="<?php echo $teachers[$i]['UId']; ?>"><?php echo $teachers[$i]['UName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <hr>
        <hr>

        <table class="table table-striped" style=" direction: rtl;">

            <thead>
                <tr>

                    <th style=" text-align: right;">#</th>
                    <th style=" text-align: right;">الطالب</th>
                </tr>
            </thead>

            <tbody>

        <?php
        for ($i = 0; $i < count($students); $i++) {
            ?>

                    <tr  style=" text-align: right;">

                        <td>
                            <label>
                                <input type="checkbox" name="absences_student_id" id="absences_student_id" value="<?php echo $students[$i]['SId']; ?>">
                    <?php echo ($i + 1) . ' - '; ?>
                            </label>
                        </td>

                        <td>
                            <label><?php echo $students[$i]['SName']; ?></label>
                        </td>
                    </tr>

            <?php
        }
        ?>
            </tbody>
        </table>

                <?php
            }

            public function saveListAbsences() {
                $add = $this->loadModel('Add_New');


                $class_absences = $_POST['class_absences'];
                $div_absences = $_POST['div_absences'];
                $datepicker_id_date_absences = $_POST['datepicker_id_date_absences'];
                $lessons_absences = $_POST['lessons_absences'];
                $materials_absences = $_POST['materials_absences'];
                $teachers_absences = $_POST['teachers_absences'];
                $sList_students_id = $_POST['sList_students_id'];

                $arr_students_id = explode(';', $sList_students_id);


                $tablename = "absences";

                for ($i = 0; $i < count($arr_students_id); $i++) {
                    $st_id = $arr_students_id[$i];

                    $arrayData = array(
                        'AStudentId' => "$st_id",
                        'AClassId' => "$class_absences",
                        'ADivId' => "$div_absences",
                        'AMaterialId' => "$materials_absences",
                        'ATeacherId' => "$teachers_absences",
                        'AAbsenceDate' => "$datepicker_id_date_absences",
                        'ADate' => date('Y-m-d'),
                        'ALessonsId' => "$lessons_absences"
                    );

                    $return = $add->pqInsertData($tablename, $arrayData);
                }
                if ($return) {
                    echo "تم حفظ الغيابات";
                }
            }

            public function getModalBodyDailyDuties() {
                $select = $this->loadModel('SelectData');

                $div_id = $_POST['div_id'];
                $class_id = $_POST['class_id'];

                $teachers = $select->pqSelectAll("users WHERE UPermission = 'teacher'");
                $materials = $select->pqSelectAll("material WHERE MClassId = $class_id");
                $lessons = $select->pqSelectAll("lessons");
                ?>

        <div class="form-group has-success">
            <input type="text" class="form-control" id="id_class_daily_duties" value="<?php echo $class_id; ?>" style=" display: none;">
        </div>

        <div class="form-group has-success">
            <input type="text" class="form-control" id="id_div_daily_duties" value="<?php echo $div_id; ?>" style=" display: none;">
        </div>

        <div class="form-group">
            <label for="id_materials_daily_duties">المادة</label>

            <select class="form-control" name="materials_daily_duties" id="id_materials_daily_duties">
        <?php
        for ($i = 0; $i < count($materials); $i++) {
            ?>
                    <option value="<?php echo $materials[$i]['MId']; ?>"><?php echo $materials[$i]['MName']; ?></option>
            <?php
        }
        ?>
            </select>

        </div>

        <div class="form-group">
            <label for="id_teachers_daily_duties">المعلمة</label>

            <select class="form-control" name="teachers_daily_duties" id="id_teachers_daily_duties">
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
            <label for="id_lessons_daily_duties">الدرس</label>

            <select class="form-control" name="lessons_daily_duties" id="id_lessons_daily_duties">
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
            <label for="id_text_daily_duties">الواجب</label>

            <textarea class="form-control" name="text_daily_duties" id="id_text_daily_duties" placeholder="الواجب"></textarea>

        </div>

                <?php
            }

            public function saveDailyDuties() {
                $select = $this->loadModel('SelectData');
                $add = $this->loadModel('Add_New');


                $class_daily_duties = $_POST['class_daily_duties'];
                $div_daily_duties = $_POST['div_daily_duties'];
                $datepicker_id_date_daily_duties = $_POST['datepicker_id_date_daily_duties'];
                $lessons_daily_duties = $_POST['lessons_daily_duties'];
                $materials_daily_duties = $_POST['materials_daily_duties'];
                $teachers_daily_duties = $_POST['teachers_daily_duties'];
                $text_daily_duties = $_POST['text_daily_duties'];

                $timestamp = strtotime($datepicker_id_date_daily_duties);
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


                $return_data = $select->pqGetDailyDutiesLessonsDate($datepicker_id_date_daily_duties, $class_daily_duties, $div_daily_duties, $lessons_daily_duties);

                if (count($return_data) == 0) {
                    $tablename = "daily_duties";

                    $arrayData = array(
                        'DDClassId' => "$class_daily_duties",
                        'DDDivId' => "$div_daily_duties",
                        'DDMaterialId' => "$materials_daily_duties",
                        'DDTeacherId' => "$teachers_daily_duties",
                        'DailyDutyText' => "$text_daily_duties",
                        'DDLessonsId' => "$lessons_daily_duties",
                        'DDDutyDate' => $datepicker_id_date_daily_duties,
                        'DDDate' => date('Y-m-d'),
                        'DDDutyDay' => "$choose_day"
                    );

                    $return = $add->pqInsertData($tablename, $arrayData);


                    if ($return) {
                        echo "تم حفظ الواجبات اليومية";
                    }
                } else {
                    echo 'تم اضافة الواجبات لهذا الدرس مسبقا';
                }
            }

        }
        