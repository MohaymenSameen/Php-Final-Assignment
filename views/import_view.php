
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
            
            <a href="/views/home_view.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>            
            <a href="#Tvs">Tvs</a>
            <a href="/views/searchuser_view.php">Search User</a>
            <a href="/views/login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form method="POST" enctype="multipart/form-data" action="import_view.php" id="import">
        <h1>Import CSV File</h1>
        <?php

            if(isset($_POST['import']))
            {    
                
                $fileName = $_FILES['file']['name'];                    
                $fileExt = explode('.',$fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('csv','xlsx','xls');    
                $fileDestination = '../imports/'.$fileName;
                $fileTmpName = $_FILES['file']['tmp_name'];
                
                $path = '../imports/';
                
                if(!empty($fileName))
                {
                    if(in_array($fileActualExt,$allowed))
                    {
                        move_uploaded_file($fileTmpName,$fileDestination);
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