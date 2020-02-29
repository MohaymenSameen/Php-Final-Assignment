<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Import CSV</title>
</head>
<body>
    <header>        
        <img src="/img/logo.png">
        <h1>TechnoGuides</h1>
        <h2>Your only reliable source for tech news</h2>
    
        <div class="navigation_bar">    
            <a href="home_view.php">Home</a>        
            <a href="import_view.php">Import Csv</a>
            <a href="upload_view.php">Upload Image</a>
            <a href="payment_view.php">Tickets</a>
            <a href="searchuser_view.php">Search User</a>                    
            <a href="edituser_view.php">Edit Details</a>
            <a href="logout_view.php?logout"><strong>Login/Logout</strong></a>        
        </div>
    </header>    
    
    <div class="background_color">
        <form method="POST" enctype="multipart/form-data" action="import_view.php" id="import">
        <h1>Import CSV File</h1>
        <?php

            session_start();
            //if user is not logged in feature cannot be used
            if(!isset($_SESSION['username']))
            {
                echo '<br>';
                exit("<p id='error'>You must login to use this feature</p><br>");                               
            }
            //import code for csv files
            if(isset($_POST['import']))
            {    
                //getting filename
                $fileName = $_FILES['file']['name'];  
                //seperating filename and extension                  
                $fileExt = explode('.',$fileName);
                //making a variable just for the extension
                $fileActualExt = strtolower(end($fileExt));
                //an array for the allowed formats
                $allowed = array('csv','xlsx','xls'); 
                //destination for the csv file   
                $fileDestination = '../imports/'.$fileName;
                $fileTmpName = $_FILES['file']['tmp_name'];
                                
                $path = '../imports/';
                
                if(!empty($fileName))
                {
                    if(in_array($fileActualExt,$allowed))
                    {
                        //moving csv file to the file destination
                        move_uploaded_file($fileTmpName,$fileDestination);
                        //creating a table
                        echo "<html><body><table>\n\n";        
                        
                        $f = fopen($path.$fileName, "r");
                        while (($line = fgetcsv($f)) !== false)
                        {
                            echo "<tr>";
                            foreach ($line as $cell)
                            {
                                echo "<td>" . htmlspecialchars($cell) . "</td>";
                            }
                            echo "</tr>\n";
                        }
                        fclose($f);
                        echo "\n</table></body></html>";
                    }
                    else
                    {
                        echo "<p id ='error'>Incorrect Extension</p>";
                    }                       
                }
                else
                {
                    echo "<p id ='error'>Please Upload A File</p>";
                }               
            }       
        ?>
        <br>
        <input type="file" name="file"><br>
        <button type="submit" name="import" id="upload">Import</button>
        </form>
    </div> 

</body>
</html>