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

// Check for and validate form submission
// If there is a POST request with the submit button, validate the inputs
// If there are no errors, set $ShowForm to FALSE to hide the form and display a thank you message
// If there are errors, set $ShowForm to TRUE to display the form again
if (isset($_POST['submit'])) {
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email = validateEmail($_POST['Email'], "Your Email");
    $Subject = validateInput($_POST['Subject'], "Subject");
    $Message = validateInput($_POST['Message'], "Message");

    // If there are no errors, display a thank you message
    if ($errorCount == 0) 
        $ShowForm = FALSE;
    else
        $ShowForm = TRUE;
}

// If the form is being displayed for the first time or if there are errors, show the form
// If there are no errors, send the email and display a thank you message
if ($ShowForm == TRUE) {
    if ($errorCount > 0) {
        echo "<p>Please re-enter the form information below.</p>\n";
        displayForm($Sender, $Email, $Subject, $Message);
    }
    else {
        $SenderAddress = "$Sender <$Email>";
        $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

        $result = mail("recipient@example.com", $Subject, $Message, $Headers);

        if ($result) {
            echo "<p>Your message has been sent. Thank you, " . $Sender . ".</p>\n";
        } else {
            echo "<p> There was an error sending your message, " . $Sender . ".</p>\n";
        }
    }
}

?>

</body>
</html>