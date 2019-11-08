<?php
    require_once ('../Db_Connection/db.connection.php');
    class ResetPassModel extends Database
    {
        public $email_address;
        public $password;

        public function __construct($email_address,$password)
        {
            $this->email_address=$email_address;
            $this->password=$password;
        }
        public function getEmailAddress()
        {
            return $this->email_address;
        }
        public function setEmailAddress()
        {
            $this->email_address=$email_address;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword()
        {
            $this->password=$password;
        }
        public function checkEmail($email_address,$password)
        {
            $sql="SELECT register_ID FROM register WHERE email_address='$email_address'";
            $result=$this->connect()->query($sql); 
            $numRows=$result->num_rows;            
            if($numRows>0)
            {
                //$row=$result->fetch_array();
                //$data=$row;
                return true;
            }
        }
        public function updatePass($password)
        {
            session_start();
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE `register` SET password='$hash' WHERE email_address='{$_SESSION['username']}'";
            $result=$this->connect()->query($sql); 
        }

    }
?>