<?php
    session_start();
    require_once ('../Db_Connection/db.connection.php');

    class LoginModel extends Database
    {
        private $email_address;
        private $password;        
        //constructor
        public function __construct($email_address,$password)
        {
            $this->email_address=$email_address;
            $this->password=$password;
        }
        //getting email_address
        public function getEmailAddress()
        {
            return $this->email_address;
        }
        //setting email_address
        public function setEmailAddress($email_address)
        {
            $this->email_address=$email_address;
        }
        //getting password
        public function getPassword()
        {
            return $this->password;
        }
        //setting password
        public function setPassword($password)
        {
            $this->password=$password;
        }
        //getting user
        public function getUser(string $email_address, string $password)
        {
            $sql = "SELECT register_ID, password FROM register WHERE email_address='$email_address'";
            $result = $this->connect()->query($sql);
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