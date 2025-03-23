<?php 
    session_start(); // Start the session.
    //Chinecheck kung may laman ba si error , if true kukunin neto abd value. Pag false naman magiging $nameErr = '';
    $nameErr = isset($_SESSION['errorName']) ? $_SESSION['errorName'] : '';
    $emailErr = isset($_SESSION['errorEmail']) ? $_SESSION['errorEmail'] : '';
    $messageErr = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : '';


    // Para mawawala yung error display pag nag refresh si user
    
    unset($_SESSION['errorName'],$_SESSION['errorEmail'],$_SESSION['errorMessage']);



?>
<!-- 
 Author : Chavez , Aaron James B.
 Course/Year : BSCS 1st Year!
 KUPAL PARIN SA FUTURE

 03/13/25
-->

<html>
    <body>
        <style>
            *{
                background-color: beige;
                color: black;
                padding: 5px;
                margin: 2px;
            }
            .form{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 70vh;
            }
            .submit{
                margin-top: 10;
            }
        </style>
        <div class="form">
            <form action="save_guestbook.php" method="POST">
                <h1>Guest Book</h1> <br>
                <div class="name">
                    <label >Name : </label> <br>
                    <input type="text" name="name" placeholder="NAME"> <br>
                    <p><?php echo $nameErr ?></p>
                </div>
                <div class="email">
                    <label > Email :</label> <br>
                    <input type="text" name="email" placeholder="EMAIL"><br>
                    <p><?php echo $emailErr ?></p>
                </div>
                <div class="message">
                    <label > Message : </label> <br>
                    <textarea name="message" placeholder="Enter your message"></textarea><br>
                    <p><?php echo $messageErr ?></p>
                </div>
                <div class="submit">
                    <input type="submit" name="submit" placeholder="SUBMIT"> <br>
                </div>
                <div class="button">
                  <a href="./view_guestbook.php"><button type="button">View All Feedback</button></a>
                </div>

                
            </form>

        </div>
    </body>
</html>
