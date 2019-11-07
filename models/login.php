<?php       
    session_start();

    class Login extends database
    {
        public function checkUsers()
        {
            $sql = "SELECT register_ID password FROM register WHERE email_address='$email'";
            $result = $this->connect()->query($sql);
            $numRows=$result->num_rows;
            if($numRows>0)
            {

            }

        }
    }
    if (isset($_POST['Login']))
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

        
       
	}   
?>