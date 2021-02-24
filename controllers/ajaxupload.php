<?php 
    
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $path = 'uploads/'; // upload directory
        if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image']){
        $img = $_FILES['image']['name'];
        //stores the original filename from the client
        $tmp = $_FILES['image']['tmp_name'];
        //stores the name of the designated temporary file

        $errorimg = $_FILES["image"]["error"];
        //stores any error code resulting from the transfer

        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) { 
        $path = $path.strtolower($final_image); 
            if(move_uploaded_file($tmp,$path)) {
            echo "<img src='$path' />";
            $name = $_POST['name'];
            $email = $_POST['email'];
        //include database configuration file
        include_once 'connect.php';
        //insert form data in the database
        $insert = $conn->query("INSERT uploading (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");
        //echo $insert?'ok':'err';
            }
        } else {
        echo 'Invalid file type';
            }
        }

?>