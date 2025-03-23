<?php
session_start(); // Start the session.

// Error holders
$nameErr = $emailErr = $messageErr = "";

// Textfield values
$nameVal = $emailVal = $messageVal = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["submit"])) {
        $gName = trim($_POST['name']);
        $gEmail = trim($_POST['email']);
        $gMessage = trim($_POST['message']);

        // Sanitize input
        $sanitizeName = htmlspecialchars($gName);
        $sanitizeEmail = htmlspecialchars($gEmail);
        $sanitizeMessage = htmlspecialchars($gMessage);

        // Name validation
        if (empty($gName)) {
            $nameErr = "The name field is empty!";
        } elseif (strlen($gName) < 5) {
            $nameErr = "Name must be at least 5 characters!";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $gName)) {
            $nameErr = "Name must contain only letters and spaces!";
        }

        // Email validation
        if (empty($gEmail)) {
            $emailErr = "The email field is empty!";
        } elseif (strlen($gEmail) < 8) {
            $emailErr = "Email must be at least 8 characters!";
        } elseif (!filter_var($gEmail, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format!";
        }

        // Message validation
        if (empty($gMessage)) {
            $messageErr = "The message field is empty!";
        } elseif (strlen($gMessage) < 10) {
            $messageErr = "Message must be at least 10 characters!";
        }

        



        // Redirect back to index.php if there are errors
        if (!empty($nameErr) || !empty($emailErr) || !empty($messageErr)) {
            $_SESSION['errorName'] = $nameErr;
            $_SESSION['errorEmail'] = $emailErr;
            $_SESSION['errorMessage'] = $messageErr;
            header("Location: index.php");
            exit;
        }

        // If no errors, write to the guestbook

        $myfile = fopen("guestbook.txt", "a") or die("Unable to open file!");
        $entry = "Name: $sanitizeName" . PHP_EOL .
                 "Email: $sanitizeEmail" . PHP_EOL .
                 "Message: $sanitizeMessage" . PHP_EOL .
                 "Date: " . date("Y-m-d") . PHP_EOL . PHP_EOL;
                 
                 
        fwrite($myfile, $entry);
        fclose($myfile);

        // Clear session errors and values
        unset($_SESSION['nameErr'], $_SESSION['emailErr'], $_SESSION['messageErr']);
       
        // Redirect to success page or same page
        header("Location: success.php");
        exit;
    }
}
?>
