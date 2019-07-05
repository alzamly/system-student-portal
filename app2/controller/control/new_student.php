<?php

class New_student extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

        $governorates = $this->getGovernorates();

        $classes = $this->getClasses();

        $departments_foundation = $this->getDepartmentsFoundation();

        $discount_percentage = $this->getDiscountPercentage();

        $tuition_fees = $this->getTuitionFees();

        $school_year = $this->getSchoolYear();


        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/new_student/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getTuitionFees() {


        $return = $this->select->pqSelectAll("tuition_fees");
        return $return;
    }

    public function getSchoolYear() {


        $return = $this->select->pqSelectAll("school_year_values WHERE SYVIsRunning='on'");
        return $return;
    }

    public function getDiscountPercentage() {


        $return = $this->select->pqSelectAll("discount_percentage");
        return $return;
    }

    public function getGovernorates() {


        $return = $this->select->pqSelectAll("governorates");
        return $return;
    }

    public function getClasses() {

        $return = $this->select->pqSelectAll("classes");
        return $return;
    }

    public function getDepartmentsFoundation() {

        $return = $this->select->pqSelectAll("departments_foundation WHERE DFType='school'");
        return $return;
    }

    public function getHtmlClasses() {

        $select = $this->loadModel('SelectData');

        $dep_fon = $_POST['dep_fon'];

        $return = $select->pqSelectAll("classes WHERE CDepartmentFoundationId=$dep_fon");
        ?>
          <?php
          for ($i=0; $i < count($return); $i++) { 
            ?>
            <option value="<?php echo $return[$i]['CId'];?>"><?php echo $return[$i]['ClassName'];?></option>
            <?php
          }
         
    }

    public function getHtmlTuitionFeesByClass(){

        $select = $this->loadModel('SelectData');

        $class_id = $_POST['class_id'];

        $return = $select->pqSelectAll("tuition_fees WHERE TFClassId=$class_id");
        
        for ($i=0; $i < count($return); $i++) { 
            ?>
            <option value="<?php echo $return[$i]['TFId'];?>"><?php echo $return[$i]['TFTuitionFeesName'];?></option>
            <?php
        }
    }

   

    public function addNewStudent() {
        $select = $this->loadModel('SelectData');
        $add = $this->loadModel('Add_New');




        
        @$student_image = "";

        $array = [];
        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';

        $target_dir = "students_images/";
        $name = $_FILES["file"]["name"];

        // $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($name, PATHINFO_EXTENSION);

        $random = rand(0, 999999);
        $extention = explode('.', $name);
        $filename = $random . '_' . date('d_m_Y') . '_' . time() . '.' . $imageFileType;
        $target_file = $target_dir . $filename;

        // Check if file already exists
        if (file_exists($target_file)) {
            #echo "Sorry, file already exists.";
            $uploadOk = 0;

            $array[] = "Sorry, file already exists.";
        }

        // Check file size -- Kept for 500MB
        if ($_FILES["file"]["size"] > 500000000) {
            #echo "Sorry, your file is too large.";
            $uploadOk = 0;

            $array[] = "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            #echo "Sorry, only wmv, mp4 & avi files are allowed.";
            $uploadOk = 0;

            $array[] = "Sorry, only image files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            #echo "Sorry, your file was not uploaded.";

            $array[] = "Sorry, your file was not uploaded.";

            // if everything is ok, try to upload file
        } else {


            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                #echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

                $array[] = "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";

                @$student_image = $filename;
            } else {
                #echo "Sorry, there was an error uploading your file.";

                $array[] = "Sorry, there was an error uploading your file.";

                //print_r($array);
                @$student_image = "";
            }
        }

       





        $student_name = $_POST['student_name'];
        $father_name = $_POST['father_name'];
        $father_job = $_POST['father_job'];
        $mobile_number_father = $_POST['mobile_number_father'];
        $mobile_number_mother = $_POST['mobile_number_mother'];
        $home_address = $_POST['home_address'];
        $student_hometown_governorate = $_POST['student_hometown_governorate'];
        $place_of_birth = $_POST['place_of_birth'];
        $date_of_birth = $_POST['date_of_birth'];
        $nationality_certificate_number = $_POST['nationality_certificate_number'];
        $civil_status_id_number = $_POST['civil_status_id_number'];
        $school_transferred_from_them = $_POST['school_transferred_from_them'];
        $governorate_transferred_from_them = $_POST['governorate_transferred_from_them'];
        $number_of_document = $_POST['number_of_document'];
        $date_of_document = $_POST['date_of_document'];
        $date_commencement_at_school = $_POST['date_commencement_at_school'];
        $class_which_he_accepted = $_POST['class_which_he_accepted'];
        $does_he_have_failure_at_primary_school = $_POST['does_he_have_failure_at_primary_school'];
        $number_family_members = $_POST['number_family_members'];
        $order_student_between_the_sons = $_POST['order_student_between_the_sons'];
        $number_of_brothers = $_POST['number_of_brothers'];
        $number_of_sister = $_POST['number_of_sister'];
        $house_number = $_POST['house_number'];
        $sheet = $_POST['sheet'];
        $record = $_POST['record'];
        $educational_achievement_of_father = $_POST['educational_achievement_of_father'];
        $educational_achievement_of_mother = $_POST['educational_achievement_of_mother'];
        $number_rooms_occupied_by_the_family = $_POST['number_rooms_occupied_by_the_family'];



        // مكان قبول الطالب
        $departments_foundation_id = $_POST['departments_foundation_id'];
        $class_id = $_POST['class_id'];


        // العام الدراسي
        $school_year_values = $select->pqSelectAll("school_year_values WHERE SYVIsRunning='on'");
        $school_year_val       = $school_year_values[0]['SYVId'];

        $discount_tuition_fees = $_POST['discount_tuition_fees'];
        $discount_not_part_all = $_POST['discount_not_part_all'];
        $tuition_fees_id       = $_POST['tuition_fees_id'];

        $type_pay_tuition_fees = $_POST['type_pay_tuition_fees'];


        // حساب الطالب
        $username_family = $_POST['username_family'];
        $password_family = $_POST['password_family'];

       



        $tablename = "students";

        $is_found_username = $select->pqCheckStringIsFound("family", "FUsername", $username_family);

        if (count($is_found_username) > 0) {

            //header("Location: ".URL."new_student");
            echo "username exists , choose other username";
        } else {

            $arrayData = array(
                'SName' => $student_name,
                'SFatherName' => $father_name,
                'SFatherJob' => $father_job,
                'SHomeAddress' => $home_address,
                'StudentHometownGovernorate' => $student_hometown_governorate,
                'SPlaceOfBirth' => $place_of_birth,
                'SDateOfBirth' => $date_of_birth,
                'SNationalityCertificateNumber' => $nationality_certificate_number,
                'SCivilStatusIDNumber' => $civil_status_id_number,
                'SSchoolTransferredFromThem' => $school_transferred_from_them,
                'SGovernorateTransferredFromThem' => $governorate_transferred_from_them,
                'SNumberOfDocument' => $number_of_document,
                'SDateOfDocument' => $date_of_document,
                'SDateCommencementAtSchool' => $date_commencement_at_school,
                'SClassWhichHeAccepted' => $class_which_he_accepted,
                'SDoesHeHaveFailureAtPrimarySchool' => $does_he_have_failure_at_primary_school,
                'SMobileNumberFather' => $mobile_number_father,
                'SMobileNumberMother' => $mobile_number_mother,
                'SNumberFamilyMembers' => $number_family_members,
                'SOrderStudentBetweenTheSons' => $order_student_between_the_sons,
                'SNumberOfBrothers' => $number_of_brothers,
                'SNumberOfSister' => $number_of_sister,
                'SHouseNumber' => $house_number,
                'SSheet' => $sheet,
                'SRecord' => $record,
                'SEducationalAchievementOfFather' => $educational_achievement_of_father,
                'SEducationalAchievementOfMother' => $educational_achievement_of_mother,
                'SNumberRoomsOccupiedByTheFamily' => $number_rooms_occupied_by_the_family,
                'SPhoto' => "$student_image",
                'SDate' => date('Y-m-d'),
                'SClassId' => $class_id,
                'DepartmentsFoundationId' => $departments_foundation_id
            );

            $return = $add->pqInsertData($tablename, $arrayData);

            if ($return) {

                // حساب الطالب
                $arr_student = $select->pqGetLastRow("students", "SId");
                $student_id = $arr_student[0]['SId'];

                $arrayData_ = array(
                    'FStudentId' => "$student_id",
                    'FUsername' => "$username_family",
                    'FPassword' => "$password_family"
                );

                $return_ = $add->pqInsertData("family", $arrayData_);

                // العام الدراسي
                $arrayData_school_year = array(
                    'SYStudentId' => "$student_id",
                    'SYSchoolYearValuesId' => "$school_year_val",
                    'SYDepartmentsFoundationId' => $departments_foundation_id,
                    'SYClassId' => $class_id,
                    'SYDiscountTuitionFeesId' => $discount_tuition_fees,
                    'SYDiscountNotOrPartOrAll' => $discount_not_part_all,
                    'SYIdTuitionFees' => $tuition_fees_id,
                    'SYTypePayTuitionFees' => "$type_pay_tuition_fees",
                    'SYDate' => date("Y-m-d")
                );

                $return_ = $add->pqInsertData("school_year", $arrayData_school_year);


                if ($return_) {
                    
                   // header("Location: ".URL."new_student");
                    echo "تم اضافة طالب جديد";
                    
                     for ($i = 0; $i < count($array); $i++) {
                            ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong></strong> <?php echo $array[$i]; ?>
                            </div>
                            <?php
                        }
                }
            }
        }
    }

    public function checkUsernameIsFound() {
        $select = $this->loadModel('SelectData');
        $username_family = $_POST['username_family'];

        $arr_check = $select->pqGetRowsByAnyColumn("family", "FUsername", $username_family);

        if (count($arr_check) > 0) {
            echo "found";
        } else {
            echo "not_found";
        }
    }

}
