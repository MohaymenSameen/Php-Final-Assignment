<?php

class Database
    {
        //Declaring Variables       
        private $dbServername;
        private $dbUsername;
        private $dbPassword;
        private $dbName;

        //connection to the database
        public function connect()
        {
            $this->dbServername = "localhost";
            $this->dbUsername = "root";
            $this->dbPassword = "";
            $this->dbName = "s627650_memberdb";

            $conn = new mysqli($this->dbServername,$this->dbUsername,$this->dbPassword,$this->dbName);

            return $conn;
        }
        public function escape_string($value)
        {
            return $this->connect()->real_escape_string($value);
        }        
    }

    

    
