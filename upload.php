<?php

$success=FALSE;
$alert=FALSE;
$msg="";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $postBy=$_POST['name'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    include 'dbconnect.php';

    if(isset($_FILES['video']))
    {
        // echo "<pre>";
        // print_r($_FILES['video']);
        // echo "</pre>";

        $fileName=$_FILES['video']['name'];
        $fileType=$_FILES['video']['type'];

        $res=strpos($fileType,"mp4");
        if($res)
        {
        // space replace to underscrore-bar 
        $fileName=preg_replace("/\s+/","_",$fileName);

        $fileTempName=$_FILES['video']['tmp_name'];
        $fileError=$_FILES['video']['error'];
        $fileSize=$_FILES['video']['size'];

        // divide file-name and file-extension 
        $fileName_ext=pathinfo($fileName,PATHINFO_EXTENSION);
        $fileName=pathinfo($fileName,PATHINFO_FILENAME);

        // unique name creation of file 
        $newName=$fileName.time().".".$fileName_ext;

        // uploade directory 
        move_uploaded_file($fileTempName,"video/".$newName);

        $sql="INSERT INTO `video` (`sl`, `postby`, `title`, `descrip`, `videoname`, `date_time`) VALUES (NULL, '$postBy', '$title', '$description', '$newName', current_timestamp())";

        $result=mysqli_query($conn,$sql);
        if($result)
        {

            setcookie("Your_Name",$postBy,time()+86400,"/");
            setcookie("Title",$title,time()+86400,"/");
            setcookie("File_Name",$_FILES['video']['name'],time()+86400,"/");

            $msg="File uploaded successfully.";
            $success=TRUE;
        }


        }
        else 
        {
            $msg="Not Mp4 file. Please upload Mp4 file only .";
            $alert=TRUE;
        }

    }
}


?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Upload Center | SC</title>
</head>

<body>
<?php include 'navbar.php'; ?>
<?php
if($success== TRUE)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Message</strong> '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else if($alert==TRUE)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Message</strong> '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
     <div class="container my-5">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titleTopic" class="form-label"><b>Your Name</b></label>
                <input type="text" name="name" class="form-control" id="titleTopic" required>
                <div id="emailHelp" class="form-text"><em>Who post the video.</em></div>
            </div>
            <div class="mb-3">
                <label for="titleTopic" class="form-label"><b>Title </b></label>
                <input type="text" name="title" class="form-control" id="titleTopic" required>
                <div id="emailHelp" class="form-text"><em>Give the correct Title .</em></div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Description with out using any emoji .</label>
            </div>

            <div class="mb-3">
               
                <label for="video">Upload video here.</label> <br>
                <input type="file" name="video" id="video" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</html>