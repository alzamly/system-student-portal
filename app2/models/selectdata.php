<?php

class SelectData {

    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->conn = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    // function get rows by any column I choose
    public function pqGetRowsByAnyColumn($tablename, $columnNmae, $columnValue) {
        $sql = "SELECT * FROM $tablename WHERE $columnNmae=:columnValue";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":columnValue", $columnValue);
        $stmt->execute();
        //$row = $stmt->fetch();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return @$array;
    }

    // function get rows by any two column I choose
    public function pqGetRowsByTwoAnyColumn($tablename, $columnNmae1, $columnValue1, $columnNmae2, $columnValue2) {
        $sql = "SELECT * FROM $tablename WHERE $columnNmae1=:columnValue1 AND $columnNmae2=:columnValue2";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":columnValue1", $columnValue1);
        $stmt->bindParam(":columnValue2", $columnValue2);
        $stmt->execute();
        //$row = $stmt->fetch();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return @$array;
    }

    // get employees data
    public function pqGetEmployeesData() {
        $array = array();
        $sql = "SELECT users.UId, users.UName, users.UUsername, users.UDepartmentFoundationId, departments_foundation.DFId, departments_foundation.DFName, departments_foundation.DFType, departments_foundation.DFStructure FROM users, departments_foundation WHERE users.UDepartmentFoundationId=departments_foundation.DFId  GROUP BY users.UId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }



    // get courses for employees
    public function pqGetCoursesData($emp) {
        $array = array();
        $sql = "SELECT * FROM courses WHERE EmpId=$emp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    // get all courses for employees
    public function pqGetAllProductsData() {
        $array = array();
        $sql = "SELECT * FROM products,product_images WHERE products.PId = product_images.PId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    public function pqSelectProducts() {
        $array = array();
        $sql = "SELECT * FROM products,product_images WHERE products.PId = product_images.PId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    public function pqSelectAll($tablename) {
        $array = array();
        $sql = "SELECT * FROM $tablename";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    public function pqSelectMaxNum($tablename, $num, $other_col) {
        $array = array();
        //$sql = "SELECT MAX($num)".$other_col." FROM $tablename";
        $sql = "SELECT $num $other_col FROM $tablename ORDER BY ShId DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    public function pqCheckStringIsFound($tablename, $col_name, $col_val) {
        $array = array();
        $sql = "SELECT * FROM $tablename WHERE $col_name='$col_val'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    public function pqGetLastRow($tablename, $col) {
        $array = array();
        $sql = "SELECT * FROM $tablename ORDER BY $col DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }
    
    
    // check if daily duty for Lessons found by date :: 2019-02-26
    public function pqGetDailyDutiesLessonsDate($date, $class_id, $div_id, $lesson_id) {
        $array = array();
        $sql = "SELECT * FROM daily_duties WHERE DDClassId=$class_id AND DDDivId=$div_id AND DDLessonsId=$lesson_id AND DDDutyDate='$date'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

    // search students
    public function pqSearchStudents($school, $class, $div, $search){
        $array = array();

        $sql = "SELECT * FROM students WHERE SName LIKE '%$search%'";

        if ($school != "all") {
            $sql .= " AND DepartmentsFoundationId=$school ";
        }

        if ($class != "all") {
            $sql .= " AND SClassId=$class ";
        }

        if ($div != "all") {
            $sql .= " AND SDivisionId=$div ";
        }

        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $array[] = $row;
        }

        return $array;
    }

}
