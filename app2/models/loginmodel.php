<?php

class LoginModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function pqLogin($username,$password)
    {
        $sql = "SELECT * FROM `users`,`departments_foundation` WHERE users.UUsername=:username AND users.UPassword=:password AND users.UDepartmentFoundationId=departments_foundation.DFId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if (count($row) > 0)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }

    }

}