<?php
    $myfile = fopen("guestbook.txt", "r+") or die("Unable to open file!");
?>

<html>
<style>
        *{
            background-color: beige;
            color: black;
            font-size: 1rem ;
            align-items: center;
        }
</style>
    <body>
       <form action="" method="POST">
            <div class="main">
               <?php 
                    if (filesize("guestbook.txt") > 0) {
                        $content = trim( fread($myfile, filesize("guestbook.txt"))); 
                        $information = explode(PHP_EOL . PHP_EOL, $content);
                        
                        foreach ($information as $index => $userInfo) {
                            if (trim($userInfo) != "") {
                                echo nl2br($userInfo) . PHP_EOL . "<br>";
                                echo "<a href='delete_entry.php?id=$index' style='text-decoration:none;'>
                                    <button type='button'>Delete</button>
                                    </a><br><br>";
                        


                            }
                        }
                    } else {
                        echo "No feedback yet!" . PHP_EOL;
                    }
                ?>
            </div>
       </form>
        
    </body>
</html>
