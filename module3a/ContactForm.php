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
?>
</body>
</html>