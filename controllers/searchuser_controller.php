<?php
    require_once ('../models/searchuser_model.php');
    class SearchUserController extends SearchUserModel
    {
        //if found the user it will communicate with the view
        public function findUser($firstname,$email_address)        
        {
            $SearchUserModel= new SearchUserModel($firstname,$email_address);
            $data=$SearchUserModel->searchUser($firstname,$email_address);
            if($data)
            {
                return $data;
            }
        }
        //checking if email exists
        public function checkEmail($firstname,$email_address)
        {
            $SearchUserModel = new SearchUserModel($firstname,$email_address);
            if($SearchUserModel->validateEmail($firstname,$email_address))
            {
                return true;
            }            
        }
        //checking if name exists
        public function checkName($firstname,$email_address)
        {
            $SearchUserModel = new SearchUserModel($firstname,$email_address);
            if($SearchUserModel->validateName($firstname,$email_address))
            {
                return true;
            }            
        }
    }
?>