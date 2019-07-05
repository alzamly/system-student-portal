<?php

class Update
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->conn = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    
    // function update data in database
    public function pqUpdateData($tablename, $arrayData, $column_name, $Id)
    {
        if (!is_array($arrayData) || !count($arrayData))
            return FALSE;

        $i = 0;
        $query = array();

        foreach($arrayData as $key => $value) {
           if ($value != NULL) {
              $query[] = "{$key} = :param_{$i}";
              $i++;
           }
        }

        if (! empty($query)) {
          $finalQuery = implode(",", $query);

          $sql ="UPDATE $tablename SET $finalQuery WHERE $column_name=:Id";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':Id', $Id, PDO::PARAM_INT);

          $arr = array();
          foreach($arrayData as $key => $value) {
              $arr[] = $value;
          }
          for ($j = 0; $j < count($arr); $j++) {
              $stmt->bindParam(':param_'.$j, $arr[$j]);
          }
        }
        if(!$stmt->execute())
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function pqUpdateDataByAnyColumn($tablename, $arrayData, $column_name1, $column_value1)
    {
        if (!is_array($arrayData) || !count($arrayData))
            return FALSE;

        $i = 0;
        $query = array();

        foreach($arrayData as $key => $value) {
           if ($value != NULL) {
              $query[] = "{$key} = :param_{$i}";
              $i++;
           }
        }

        if (! empty($query)) {
          $finalQuery = implode(",", $query);

          $sql ="UPDATE $tablename SET $finalQuery WHERE $column_name1=:col_val1";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':col_val1', $column_value1);

          $arr = array();
          foreach($arrayData as $key => $value) {
              $arr[] = $value;
          }
          for ($j = 0; $j < count($arr); $j++) {
              $stmt->bindParam(':param_'.$j, $arr[$j]);
          }
        }
        if(!$stmt->execute())
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function pqUpdateDataByTwoColumn($tablename, $arrayData, $column_name1, $column_value1, $column_name2, $column_value2)
    {
        if (!is_array($arrayData) || !count($arrayData))
            return FALSE;

        $i = 0;
        $query = array();

        foreach($arrayData as $key => $value) {
           if ($value != NULL) {
              $query[] = "{$key} = :param_{$i}";
              $i++;
           }
        }

        if (! empty($query)) {
          $finalQuery = implode(",", $query);

          $sql ="UPDATE $tablename SET $finalQuery WHERE $column_name1=:col_val1 AND $column_name2=:col_val2";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':col_val1', $column_value1);
          $stmt->bindParam(':col_val2', $column_value2);

          $arr = array();
          foreach($arrayData as $key => $value) {
              $arr[] = $value;
          }
          for ($j = 0; $j < count($arr); $j++) {
              $stmt->bindParam(':param_'.$j, $arr[$j]);
          }
        }
        if(!$stmt->execute())
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    
}