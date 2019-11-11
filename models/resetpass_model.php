<?php
    require_once ('../Db_Connection/db.connection.php');
    class ResetPassModel extends Database
    {
        public $password;
        
        public function __construct($password)
        {
            $this->password=$password;
        }        
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword()
        {
            $this->password=$password;
        }
        //function to update pass in db after changing         
        public function updatePass($password)
        {
            session_start();
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE `register` SET password='$hash' WHERE email_address='{$_SESSION['username']}'";
            $result=$this->connect()->query($sql); 
        }

    }
?>