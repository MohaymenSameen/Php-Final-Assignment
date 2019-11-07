<?php       
    session_start();
    require_once ('../Db_Connection/db.connection.php');
    class UserModel extends database
    {        

        /*This is the working one
        public function __construct()
        {
            
        }
        public function Login($email_address,$password)
        {
            if(!empty($email_address) && !empty($password))
            {
                $sql=$this->db->prepare("SELECT * FROM register WHERE email_address=? AND password=?");
                $sql->bind_param('is',$email_address,$password);               
                $sql->execute();

                $sql = "SELECT register_ID, password FROM register WHERE email_address='$email_address'";
                $result = $this->connect()->query($sql);
                $numRows=$result->num_rows;

                if($numRows>0)
                {
                    echo "User Verified,Access granted";
                }
                else
                {
                    echo "Incorrect username or password";
                }
            }
            else
            {
                echo "Please enter username and password";
            }
        }*/

            
            
            public function getUser($email_address,$password)
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

















        /*This is the backup one that does not work
        public $firstname;
        public $lastname;
        public $email_address;
        public $password;

        function __construct($firstname,$lastname,$email_address,$password)
        {
            $this->firstname=$firstname;
            $this->lastname=$lastname;
            $this->email_address=$email_address;
            $this->password=$password;
        }
        function getFirstName()
        {
            return $this->firstname;
        }      
        function setFirstName($firstname)
        {
            $this->firstname=$firstname;
        } 
        function getLastName()
        {
            return $this->lastname;
        }      
        function setLastName($lastname)
        {
            $this->lastname=$lastname;
        }  
        function getEmailAddress()
        {
            return $this->email_address;
        }      
        function setEmailAddress($email_address)
        {
            $this->email_address=$email_address;
        }  
        function getPassword()
        {
            return $this->password;
        }
        function setPassword($password)
        {
            return $this->password=$password;
        }        
        
        function authenticate($email_address,$password)
        {
            $sql = "SELECT register_ID, password FROM register WHERE email_address='$email_address'";
            $result = $this->connect()->query($sql);
            $sql->bindParam(1,$email_address);
            $sql->bindParam(2,$password);
            $numRows=$result->num_rows;
            if($numRows>0)
            {
                $row=$result->fetch_array();                
                $data=$row;                
            }
        }
        function login($email_address,$password)
        {
            //checks against db, does login procedures

            if($this->authenticate1($email_address,$password))
            {
                //start the session for the user
                session_start();
                //instantiate the usermodel object
                $user=$email_address;
                //set user object to the session
                $_SESSION['user']=$user;
                
                return true;
            }
            else
            {        
                return false;
            }
            
        }
        function authenticate1($email_address,$password)
        {
            $authenticate=false;
            //checks database
            if(isset($_POST['Login']))
            {
                if (password_verify($password, $data['password']))
                {                
                    $authenticate=true;
                    return authenticate;
                } 
                else
                {
                    exit("Wrong password email combination");
                }
            }
            
        }*/
    }
   /* if (isset($_POST['Login']))
    {
		include_once 'Db_Connection/db.connection.php';

		$email = mysqli_real_escape_string($conn,$_POST['email_address']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);                
        

        if (mysqli_num_rows($result) > 0)
        {
		    $data = mysqli_fetch_array($result);
            if (password_verify($password, $data['password']))
            {                
                $_SESSION['username']=$_POST['email_address'];
                header("Location: profile.php");
            } 
            else
            {
                exit("Wrong password email combination");
            }
			   
        } 
        else
        {
            exit ("wrong password email combination");
        }

        
       
	}   */
?>