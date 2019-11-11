<?php
    require_once ('../Db_Connection/db.connection.php');

    class ForgotPassModel extends Database
    {
        public $email_address;
        
        public function __construct($email_address)
        {
            $this->email_address=$email_address;
        }
        public function getEmailAddress()
        {
            return $this->email_address;
        }
        public function setEmailAddress()
        {
            $this->email_address=$email_address;
        }
        //function to get email from db
        public function getEmail($email_address)
        {
            $sql="SELECT register_ID FROM register WHERE email_address='$email_address'";
            $result=$this->connect()->query($sql); 
            $numRows=$result->num_rows;            
            if($numRows>0)
            {
                $row=$result->fetch_array();
                $data=$row;
                return $data;
            }
        }
    }
?>