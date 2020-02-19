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
        public function csvDownload($firstname,$email_address, $filename = "export.csv", $delimiter=";")
        {
            $array= $this->findUser($firstname,$email_address);
            $f = fopen('php://output', 'w');            
            foreach ($array as $line) 
            { 
                fputcsv($f, $line, $delimiter); 
            }       
                
            // tell the browser it's going to be a csv file
            header('Content-Type: text/csv; charset=utf-8');
            // tell the browser we want to save it instead of displaying it
            header('Content-Disposition: attachment; filename="'.$filename.'";');
            // make php send the generated csv lines to the browser
            exit();
        }
    }
?>