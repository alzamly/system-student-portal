<?php

class Add_tuition_fees extends Controller {

    public function index($name = '') 
    {
    	$this->select = $this->loadModel('SelectData');
        $departments_foundation = $this->getDepartmentsFoundation();
        $school_years = $this->getSchoolYears();

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/add_tuition_fees/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getDepartmentsFoundation() {

        $return = $this->select->pqSelectAll("departments_foundation WHERE DFStructure='sp_school' OR DFStructure='sp_nurs'");
        return $return;
    }

    public function getSchoolYears() {

        $return = $this->select->pqSelectAll("school_year_values");
        return $return;
    }

    public function getHtmlClasses() {

    	$select = $this->loadModel('SelectData');

    	$dep_fon = $_POST['dep_fon'];

        $return = $select->pqSelectAll("classes WHERE CDepartmentFoundationId=$dep_fon");
        ?>
        <label for="id_departments_foundation_id">الصف</label>

	    <select class="form-control" name="class_id" id="id_class_id">
	      <?php
	      for ($i=0; $i < count($return); $i++) { 
	        ?>
	        <option value="<?php echo $return[$i]['CId'];?>"><?php echo $return[$i]['ClassName'];?></option>
	        <?php
	      }
	      ?>
	    </select>
        <?php
    }

    public function addTuitionFees()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');


		$tuition_fees  			   = $_POST['tuition_fees'];
		$tuition_fees_type         = $_POST['tuition_fees_type'];
		$departments_foundation_id = $_POST['departments_foundation_id'];
		@$class_id 				   = $_POST['class_id'];
		$tuition_fees_name 		   = $_POST['tuition_fees_name'];
		$school_year 			   = $_POST['school_year'];
		
		
	    $tablename = "tuition_fees";

    	$arrayData = array(
			'TFTuitionFeesAmount' => "$tuition_fees",
			"TFTuitionFeesType" => "$tuition_fees_type",
			'TFDepartmentsFoundation' => "$departments_foundation_id",
			'TFClassId' => "$class_id",
			'TFDate' => date('Y-m-d'),
			'TFTuitionFeesName' => "$tuition_fees_name",
			'TFSchoolYearValueId' => "$school_year"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة قسط جديد";
		}
	    
		
	}

}