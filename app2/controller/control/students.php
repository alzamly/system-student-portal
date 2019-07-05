<?php


class Students extends Controller
{
	public function index($name = '')
	{
		$this->select = $this->loadModel('SelectData');

		$students = $this->getStudents();

		$divisions = $this->getDivisions();

		$payment_installment = $this->getPaymentInstallment();

		$calss_data = $this->getClassData();

		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/students/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';

	}

	public function getStudents()
	{	
		

		$class = $_GET['class'];
		$div = $_GET['div'];

		if ($div == 'all') {

		$return = $this->select->pqSelectAll("students WHERE SClassId=$class ");
			
		}
		else{

		$return = $this->select->pqSelectAll("students WHERE SClassId=$class AND SDivisionId = $div");			
		}

		return $return;
	}


	public function getDivisions()
	{	

		$class = $_GET['class'];


		$return = $this->select->pqSelectAll("divisions WHERE ClassId=$class ");
			
		
		return $return;
	}

	public function getPaymentInstallment()
	{	

		$class = $_GET['class'];


		$return = $this->select->pqSelectAll("payment_installments");
			
		
		return $return;
	}

	public function getClassData()
	{	

		$class = $_GET['class'];


		$return = $this->select->pqSelectAll("classes WHERE CId=$class");
			
		
		return $return;
	}


	public function changeStudentDiv()
	{
		$student = $_POST['student'];
		@$div = $_POST['div'];

		$update = $this->loadModel('Update');

		if ($div == "") {
			echo "قم باختيار الشعبة";
		}
		else
		{

		    $tablename = "students";

	    	$arrayData = array(
				'SDivisionId' => "$div"
			);

			$return = $update->pqUpdateData($tablename, $arrayData, "SId", $student);

			if ($return) {
				echo "تم تغيير شعبة الطالب";
			}
		}
	}

	


	public function getModalBodyEvaluationLevel()
	{
		$select = $this->loadModel('SelectData');

		$student = $_POST['student'];
		$class_id = $_POST['class_id'];

		$evaluation_cases = $select->pqSelectAll("evaluation_cases");


		?>
		<div class="form-group has-success">
	      <input type="text" class="form-control" id="id_num_student" value="<?php echo $student;?>" style=" display: none;">
	    </div>


	    <div class="form-group">
	        <label for="id_evaluation_level_text">حالة الطالب</label>

	        <select class="form-control" name="evaluation_level_text" id="id_evaluation_level_text">
	          
                    <?php
                    for($i=0; $i<count($evaluation_cases); $i++)
                    {
                    ?>
                        <option value="<?php echo $evaluation_cases[$i]['ECId'];?>"><?php echo $evaluation_cases[$i]['ECCase'];?></option>
                    <?php
                    }
                    ?>
	            
	        </select>

	     </div>

	    <div class="form-group has-success">
	    	<label>الملاحظات</label>

	      	<textarea class="form-control" id="id_note_evaluation_level" placeholder="الملاحظات"></textarea>
	    </div>

            <?php
	}

	public function addEvaluationLevelStudents()
	{
		$student = $_POST['student'];
		$evaluation_level_text = $_POST['evaluation_level_text'];
		$note = $_POST['note'];

		$add = $this->loadModel('Add_New');

		$tablename = "evaluation_level";

                $arrayData = array(
                    'ELStudentId' => "$student",
                    'ELCaseId' => "$evaluation_level_text",
                    'ELNotes' => "$note",
                    'ELDate' => date('Y-m-d')
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة تقييم الطالب";
		}
	}

	public function getModalBodyAddGradesStudents()
	{
		$select = $this->loadModel('SelectData');

		$student = $_POST['student'];
		$class_id = $_POST['class_id'];

		$title_grades_students = $select->pqSelectAll("title_grades_students WHERE TGSClassId=$class_id");
		$materials = $select->pqSelectAll("material WHERE MClassId = $class_id");
		?>

		<div class="form-group has-success">
            <input type="text" class="form-control" id="student_id_grades_students" value="<?php echo $student;?>" style=" display: none; ">
          </div>

          <div class="form-group has-success">
            <input type="text" class="form-control" id="class_id" value="<?php echo $class_id;?>" style=" display: none; ">
          </div>

          <div class="form-group">
            <label for="id_type_grades_students">نوع الدرجة</label>

            <select class="form-control" name="type_grades_students" id="id_type_grades_students">
              
            <?php
            for ($i=0; $i < count($title_grades_students); $i++) 
            { 
              ?>
            
              <option value="<?php echo $title_grades_students[$i]['TGSId'];?>"><?php echo $title_grades_students[$i]['TGSTitleGradesStudents']." ( ".$title_grades_students[$i]['TGSFullGrades']." )";?></option>
            <?php
            }
            ?>

          </select>

         </div>

          <div class="form-group">
            <label for="id_material">المادة</label>

            <select class="form-control" name="material" id="id_material">
              
            <?php
            for ($i=0; $i < count($materials); $i++) 
            { 
              ?>
            
              <option value="<?php echo $materials[$i]['MId'];?>"><?php echo $materials[$i]['MName'];?></option>
            <?php
            }
            ?>

          </select>

         </div>


        <div class="form-group">
          <label for="id_grade_student">الدرجة</label>
          <input type="text" class="form-control" name="grade_student" id="id_grade_student" placeholder="الدرجة">
        </div>




		<?php
	}

	public function addGradesStudents()
	{
		$student = $_POST['student'];
		$class_id = $_POST['class_id'];
		$type_grades_students = $_POST['type_grades_students'];
		$material = $_POST['material'];
		$grade_student = $_POST['grade_student'];

		$add = $this->loadModel('Add_New');

		$tablename = "grades_students";

    	$arrayData = array(
			'GSStudentId' => "$student",
			'GSClassId' => "$class_id",
			'GSMaterialId' => "$material",
			'GSDegree' => "$grade_student",
			'GSDate' => date('Y-m-d'),
			'GSTitleGradesStudentsId' => "$type_grades_students"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة درجة الطالب";
		}
	}

	public function addPrivateNotification()
	{
		$student = $_POST['student'];
		$title_notification = $_POST['title_notification'];
		$text_notification = $_POST['text_notification'];
		$notification_options = $_POST['notification_options'];

		$add = $this->loadModel('Add_New');

		$tablename = "notifications";

    	$arrayData = array(
			'NTitle' => "$title_notification",
			'NText' => "$text_notification",
			'NType' => "private",
			'NStudentId' => "$student",
        	'NAddOptionAcceptOrReject' => "$notification_options",
			'NDate' => date('Y-m-d')
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة التبليغ";
		}
	}


}