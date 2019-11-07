<?php
    require_once ('../Db_Connection/db.connection.php');
    class RegisterModel extends Database
    {
        public $firstname;
        public $lastname;
        public $email_address;
        public $password;

        public function __construct($firstname,$lastname,$email_address,$password)
        {
            $this->firstname=$firstname;
            $this->lastname=$lastname;
            $this->email_address=$email_address;
            $this->password=$password;            
        }
        public function getFirstName()
        {
            return $this->firstname;
        }
        public function setFirstName()
        {
            $this->firstname=$firstname;
        }
        public function getLastName()
        {
            return $this->lastname;
        }
        public function setLastName()
        {
            $this->lastname=$lastname;
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
        public function inputUser($firstname,$lastname,$email_address,$password)
        {
            $hash=password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO register (firstname,lastname,email_address,password)
            VALUES ('$firstname','$lastname','$email_address','$hash')";
            $result=$this->connect()->query($sql); 
            if($result===TRUE)
            {
                return $result;
            }           
        }
        /*public function validateEmail($email_address)
        {
            $validate="SELECT `email_address` FROM `register` WHERE `email_address`='".$email_address."'" or exit($this->connect()->error);
            $result=$this->connect()->query($validate);
            if($result)
            {
                return true;
            }                      
        }*/
        

        

    }




?>