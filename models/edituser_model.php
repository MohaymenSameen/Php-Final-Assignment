<?php
    require_once ('../Db_Connection/db.connection.php');

    class EditUserModel extends Database
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
        public function getUser()
        {
            session_start();
            $sql="SELECT * FROM register WHERE email_address='{$_SESSION['username']}'";
            $result = $this->connect()->query($sql);              
            $row=$result->fetch_assoc();
            while($row)
            {
                $rows[]=$row;                
                return $rows;                
            }
        }
        public function updateUser(string $firstname,string $lastname,string $email_address,string $password)
        {            
            $sql="UPDATE `register` SET firstname='$firstname',lastname='$lastname',email_address='$email_address' WHERE email_address='{$_SESSION['username']}'";
            $result = $this->connect()->query($sql);            
        }
        public function updatePass(string $firstname,string $lastname,string $email_address,string $password)
        {
            //session_start();
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $sql="UPDATE `register` SET firstname='$firstname',lastname='$lastname',email_address='$email_address',password='$hash' WHERE email_address='{$_SESSION['username']}'";
            $result = $this->connect()->query($sql);            
        }
        public function deleteUser(string $email_address)
        {
            $sql="DELETE FROM `register` WHERE email_address='{$_SESSION['username']}'";
            $result=$this->connect()->query($sql);                
        }
    }
?>