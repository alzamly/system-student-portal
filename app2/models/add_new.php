<?php

class Add_New
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

	// function insert data in database
    public function pqInsertData($tablename, $arrayData)
    {
        if (!is_array($arrayData) || !count($arrayData))
            return FALSE;
        
        $bind = ':'.implode(',:', array_keys($arrayData));
        $sql = 'INSERT INTO '.$tablename.'('.implode(',', array_keys($arrayData)).') '.
                'VALUE ('.$bind.')';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_combine(explode(',', $bind), array_values($arrayData)));
        
        if($stmt->rowCount() > 0)
        {
            return TRUE;
        }
        
        return FALSE;
    }
}