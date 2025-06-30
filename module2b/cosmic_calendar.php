<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmic Calendar</title>
    <!-- All styling for the final output page is included below -->
    <style>
        body { font-family: sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #2d3748; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #9f7aea; }
        .calendar-grid { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .day-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 5px; background-color: #4a5568; font-size: 1.2rem; }
        .cosmic-name { background-color: #9f7aea; color: #fff; transform: scale(1.1); box-shadow: 0 0 15px #9f7aea; }
        .cosmic-month { border: 2px solid #f6e05e; }
        .cosmic-both { background-color: #ed8936; color: #fff; border: 2px solid #f6e05e; transform: scale(1.1); box-shadow: 0 0 15px #ed8936; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Calendar</h1>
        <div class="calendar-grid">
<?php

    //Create a variable to store your first name
    $firstName = "Jos";

    // Fetch the raw JSON string from the URL
    $jsonString = file_get_contents('https://timeapi.io/api/time/current/zone?timeZone=America%2FLos_Angeles');

    // Decode the JSON string into a PHP object
    $data = json_decode($jsonString);

    // Use strlen() to calculate your name length.
    $nameLength = strlen($firstName);

    // Extract dateTime from the API object
    $dateTimeString = $data->dateTime;

    // Create a DateTime object from the dateTime string
    $date = new DateTime($dateTimeString);

    // Write a for loop that starts at your name’s length and ends at the current day of the year.
    for ($i = $nameLength; $i <= $date->format('z') + 1; $i++) {
        echo $i . " <br>";
    }

    ?>

        </div>
    </div>
</body>
</html>