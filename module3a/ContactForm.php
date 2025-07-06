<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Contact Me</title>
</head>
<body>
<?php
// This function will validate the input from the form
// It will check if the input is empty and return an error message if it is
// It will also clean up the input by trimming whitespace and removing slashes
function validateInput($data, $fieldname) {
    global $errorCount;
    if (empty($data)) {
        echo "\"$fieldname\" is a required field.<br />\n";
        ++$errorCount;
        $retval = "";
    }
    else { // Only clean up the input if it isn't empty
        $retval = trim($data);
        $retval = stripslashes($retval);
    }
    return $retval;
}

// This function will validate the email input from the form
// It will check if the input is empty and return an error message if it is
// It will also sanitize the email and validate it using PHP's filter_var function
// If the email is not valid, it will return an error message
function validateEmail($data, $fieldname) {
    global $errorCount;
    if (empty($data)) {
        echo "\"$fieldname\" is a required field.<br />\n";
        ++$errorCount; $retval = "";
    }
    else {
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL);
        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
            echo "\"$fieldname\" is not a valid email address.<br />\n";
        }
    }
    return ($retval);
}
?>
</body>
</html>