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

// This function will display the form with the current values of the input fields
// It will use the values passed as parameters to pre-fill the form fields
function displayForm($Sender, $Email, $Subject, $Message) {
    ?> <h2 style = "text-align:center">Contact Me</h2>
    <form name ="contact" action="ContactForm.php" method="post">
        <p>Your Name: 
            <input type="text" name="Sender" value="<?php echo $Sender; ?>" /></p>
        <p>Your Email: 
            <input type="text" name="Email" value="<?php echo $Email; ?>" /></p>
        <p>Subject: 
            <input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>
        <p>Message: <br />
            <textarea name="Message"><?php echo $Message; ?></textarea></p>
        <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;
            <input type="submit" name="submit" value="Send Form" /></p>
    </form>

<?php }

// Initialize variables
$ShowForm = TRUE;
$errorCount = 0;
$Sender = "";
$Email = "";
$Subject = "";
$Message = "";



</body>
</html>