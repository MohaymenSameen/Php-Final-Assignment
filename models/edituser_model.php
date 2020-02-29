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
        //getting user info from db
        public function getUser()
        {
            $sql="SELECT * FROM register WHERE email_address='{$_SESSION['username']}'";
            $result = $this->connect()->query($sql);              
            $row=$result->fetch_assoc();
            while($row)
            {
                $rows[]=$row;                
                return $rows;                
            }
        }
        //function to update user
        public function updateUser($firstname,$lastname,$email_address,$password)
        {            
           $sql="UPDATE `register` SET firstname='$firstname',lastname='$lastname',email_address='$email_address' WHERE email_address='{$_SESSION['username']}'";
            $result = $this->connect()->query($sql);            
        }
        //function to update user and user password
        public function updatePass($firstname,$lastname,$email_address,$password)
        {            
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $sql="UPDATE `register` SET firstname='$firstname',lastname='$lastname',email_address='$email_address',password='$hash' WHERE email_address='{$_SESSION['username']}'";
            $result = $this->connect()->query($sql);            
        }
        //function to delete user
        public function deleteUser($email_address)
        {
            $sql="DELETE FROM `register` WHERE email_address='{$_SESSION['username']}'";
            $result=$this->connect()->query($sql);                
        }        
    }
?>