<?php

echo "<h1>Wait some time ...</h1>";

if($_SERVER['REQUEST_METHOD']=='GET')
{
    $filename=$_GET['vidname'];
    $filepath='video/'.$filename;

    if(file_exists($filepath))
    {
        // header("Cache-Control: public");
        // header("Content-Description: FIle Transfer");
        // header("Content-Description: attachment; filename=$filename");
        // header("Content-Type: application/mp4");
        // header("Content-Transfer-Emcoding: binary");
        
        header("Content-Type: application/mp4");
        header("Content-Disposition: attachment;filename=".$_GET['vidname']);
        header("Pragma: no-cache");
        header("Expires: 0");


        readfile($filepath);
        header("location: index.php");
        // exit;

    }
    else{
        echo "The file does not exists";
    }
}


?>