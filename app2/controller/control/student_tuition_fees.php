<?php

class Student_tuition_fees extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

		$students = $this->getStudentData();

		$classes = $this->getClasses();

		$divisions = $this->getDivisions();

		$discounts = $this->getDiscount();

		$tuition_fees = $this->getTuitionFees();

		$student_payment_tuition_fees = $this->getStudentPaymentTuitionFees();


        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';

        //echo "<pre>";
		//print_r($students);
//echo "</pre>";

        require VIEW . $_SESSION['control_pq'] . '/student_tuition_fees/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getStudentData()
	{	
		$student_id = $_GET['student'];
		$return = $this->select->pqSelectAll("students,school_year,school_year_values,departments_foundation WHERE
		 students.SId=$student_id AND students.SId=school_year.SYStudentId AND school_year.SYDepartmentsFoundationId=departments_foundation.DFId AND
		 school_year.SYSchoolYearValuesId=school_year_values.SYVId");		
		return $return;
	}

	public function getDivisions()
	{	
		$return = $this->select->pqSelectAll("divisions");
		return $return;
	}

	public function getClasses()
	{	
		$return = $this->select->pqSelectAll("classes");
		return $return;
	}

	public function getDiscount()
	{	
		$return = $this->select->pqSelectAll("discount_percentage");
		return $return;
	}

	public function getTuitionFees()
	{	
		$student_id = $_GET['student'];
		$return = $this->select->pqSelectAll("tuition_fees,school_year WHERE school_year.SYStudentId=$student_id AND ( school_year.SYClassId=tuition_fees.TFClassId OR school_year.SYDepartmentsFoundationId=tuition_fees.TFDepartmentsFoundation )");
		return $return;
	}


	public function getStudentPaymentTuitionFees()
	{	
		$student_id = $_GET['student'];
		$return = $this->select->pqSelectAll("payment_installments,school_year WHERE school_year.SYStudentId=$student_id AND school_year.SYId=payment_installments.PISchoolYeartId");
		return $return;
	}

	public function paymentInstallment()
	{
		$id_student_school_year 		 = $_POST['id_student_school_year'];
		$id_tuition_fees   				 = $_POST['id_tuition_fees'];
		$id_payment_val 				 = $_POST['id_payment_val'];
		$datepicker_date_student_payment = $_POST['datepicker_date_student_payment'];
		$id_note 					 	 = $_POST['id_note'];

		$add = $this->loadModel('Add_New');


		$tablename = "payment_installments";

    	$arrayData = array(
			'PIPayment' => "$id_payment_val",
			'PIDatePaid' => "$datepicker_date_student_payment",
			'PITuitionFeesId' => "$id_tuition_fees",
			'PISchoolYeartId' => "$id_student_school_year",
			'PIDate' => date('Y-m-d'),
			'PINote' => "$id_note"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة مبلغ تسديد القسط";
		}
		
	}

}