<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Upload Image</title>
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
        <form action="upload_view.php" method="POST" enctype="multipart/form-data" id="upload">
        <h1>Upload Image</h1>
        <?php        
        if(isset($_POST['upload']))
        {
            $file= $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
    
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg','jpeg','png'); 
    
            if(in_array($fileActualExt,$allowed))
            {
                if($fileError === 0)
                {
                    if($fileSize>20000)
                    {
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = '../uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        header("Location: upload_view.php?uploadSuccessful");
                    }
                    else
                    {
                        echo "<p id ='error'>File Is Too Large</p>";
                    }
                }
                else
                {
                    echo "<p id ='error'>Error With Uploading</p>";
                }
            }
            else
            {
                echo "<p id ='error'>Extention Is Incorrect Type</p>";
            }        
        }
        ?>
        <br>
        <input type="file" name="file"><br>
        <button type="submit" name="upload" id="upload">Upload Image</button>
        </form>
    </div> 

</body>
</html>