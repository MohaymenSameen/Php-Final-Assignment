<?php
    require_once ('../Db_Connection/db.connection.php');
    class SearchUserModel extends Database
    {
        public $firstname;
        public $email_address;      

        public function __construct($firstname,$email_address)
        {
            $this->firstname=$firstname;
            $this->email_address=$email_address;       
        } 
        public function getFirstName()
        {
            return $this->firstname;
        }
        public function setFirstName()
        {
            $this->firstname=$firstname;
        }            
        public function getEmailAddress()
        {
            return $this->email_address;
        }
        public function setEmailAddress()
        {
            $this->email_address=$email_address;
        } 
        //using a function to search for users with a name and email_address     
        public function searchUser($firstname,$email_address)
        {
            $sql="SELECT `email_address`,`firstname`,`lastname`,`registration_date` FROM `register` WHERE `email_address` like '".$email_address."' OR `firstname` like '".$firstname."'";
            $result=$this->connect()->query($sql);
            $numRows=$result->num_rows;            
            if($numRows>0)
            {                                
                while($res=$result->fetch_assoc())
                {                  
                    $data[] = $res;
                }   
                return $data;
            }  
        } 
        //checking if email exists 
        public function validateEmail($firstname,$email_address)
        {
            $validate="SELECT `email_address` FROM `register` WHERE `email_address`='".$email_address."'";
            $result=$this->connect()->query($validate);
            $numRows=$result->num_rows;            
            if($numRows>0)
            {           
                return true;
            }                                   
        }
        //checking if name exists
        public function validateName($firstname,$email_address)
        {
            $validate="SELECT `firstname` FROM `register` WHERE `firstname`='".$firstname."'";
            $result=$this->connect()->query($validate);
            $numRows=$result->num_rows;            
            if($numRows>0)
            {     
                return true;
            }                                   
        } 
    }
?>