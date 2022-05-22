<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Video | SC</title>
</head>



<body>
    <?php include 'navbar.php'; ?>

    <?php
    if(isset($_COOKIE['File_Name']))
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sunglasses" viewBox="0 0 16 16">
        <path d="M3 5a2 2 0 0 0-2 2v.5H.5a.5.5 0 0 0 0 1H1V9a2 2 0 0 0 2 2h1a3 3 0 0 0 3-3 1 1 0 1 1 2 0 3 3 0 0 0 3 3h1a2 2 0 0 0 2-2v-.5h.5a.5.5 0 0 0 0-1H15V7a2 2 0 0 0-2-2h-2a2 2 0 0 0-1.888 1.338A1.99 1.99 0 0 0 8 6a1.99 1.99 0 0 0-1.112.338A2 2 0 0 0 5 5H3zm0 1h.941c.264 0 .348.356.112.474l-.457.228a2 2 0 0 0-.894.894l-.228.457C2.356 8.289 2 8.205 2 7.94V7a1 1 0 0 1 1-1z"/>
      </svg> Your IP : '.$_SERVER['REMOTE_ADDR'].'</strong><br>Title :  '.$_COOKIE['Title'].'<br>Your Name : '.$_COOKIE['Your_Name']. ' <br>File Name :'.$_COOKIE['File_Name'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    // echo "<h1>". $_COOKIE['File_Name']."</h1>";

    ?>
    <div class="container">
        <h1 class="text-center"> 🔥 Short Video 🔥</h1>
        <div class="row">


            <?php
     include 'dbconnect.php';

     $sql="SELECT * FROM `video` ORDER BY `sl` DESC";
     $result=mysqli_query($conn,$sql);
     $num=mysqli_num_rows($result);
    //  echo $num;

    if($num==0)
    {
        echo '
        <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Lets start Upload video</h1>
                <p class="col-md-8 fs-4">Be the first person to Upload video and added Title Or Description.</p>
            </div>
        </div>
    </div>
        ';

    }
    else 
    {
        for($i=0;$i<$num;$i++)
        {
            $row=mysqli_fetch_assoc($result);

            if($row['postby']=="Suvendu" ||$row['postby']== "Suvendu Chowdhury")
            {
                echo '<div class="col-md-4 my-3">
                <div class="card" style="width: 18rem;">
                    
                    <video class="card-img-top" width="200%" controls>
                        <source src="video/'.$row['videoname'].'">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">'.$row['title'].'</h5>
                        <p class="card-text ">'.$row['descrip'].'</p>
                        <em><b>Post by :</b>'.$row['postby'].' [Admin]</em>
                        <hr>
                        <a href="download.php?vidname='.$row['videoname'].'" class="btn btn-success">Download video</a>
                    
        
                    </div>
                </div>
            </div>';

            }
            else 
            {

                echo '<div class="col-md-4 my-3">
                <div class="card" style="width: 18rem;">
                    
                    <video class="card-img-top" width="200%" controls>
                        <source src="video/'.$row['videoname'].'">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">'.$row['title'].'</h5>
                        <p class="card-text ">'.$row['descrip'].'</p>
                        <em><b>Post by :</b>'.$row['postby'].'</em>
                        <hr>
                        <a href="download.php?vidname='.$row['videoname'].'" class="btn btn-success">Download video</a>
                    
        
                    </div>
                </div>
            </div>';
            }
    
        }
    }

    ?>

            <?php include 'footer.php'; ?>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
                crossorigin="anonymous">
            </script>

</body>

</html>