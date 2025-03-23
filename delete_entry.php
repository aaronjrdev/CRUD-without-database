<?php
    $delIndex = $_GET['id']; 

    $myfile = fopen("guestbook.txt", "r+") or die("Unable to open file!");

    $textFile = trim( fread($myfile, filesize("guestbook.txt"))); 
    $info = explode(PHP_EOL . PHP_EOL, $textFile);

    if(isset($info[$delIndex])){
        unset($info[$delIndex]);
        file_put_contents("guestbook.txt" , implode(PHP_EOL . PHP_EOL, $info));
        header("Location: view_guestbook.php");
        exit;
    }

    



    
?>