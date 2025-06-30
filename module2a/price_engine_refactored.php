<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T-Shirt Price Engine</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f6f8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .receipt { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; border-top: 5px solid #005a9c; }
        h1 { text-align: center; color: #005a9c; }
        ul { list-style: none; padding: 0; }
        li { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
        .total { font-size: 1.5em; color: #28a745; }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Order Summary</h1>
        <?php
            // --- Configuration: Change these values to test all business rules! ---
            $size = 'L'; // Options: 'S', 'M', 'L', 'XL'
            $color = 'Ocean Blue'; // Any string, but test with 'Sunset Orange' or 'Ocean Blue'
            $isCustomized = true; // Options: true, false
            $customerFirstName = 'Jos'; // <-- IMPORTANT: REPLACE WITH YOUR ACTUAL FIRST NAME

            // --- Part A: Implement the logic below using ONLY simple, nested if-statements ---
            $finalPrice = 22.50;
            $details = "<li>Base Price: <span>$" . number_format($finalPrice, 2) . "</span></li>";


            if($size == 'L') {
                $finalPrice = $finalPrice + 1.75;
                $details .= "<li>Size (L) Upcharge: <span>+$1.75</span></li>";
            }
            if($size == 'XL') {
                $finalPrice = $finalPrice + 2.50;
                $details .= "<li>Size (XL) Upcharge: <span>+$2.50</span></li>";
            }
            if($color == 'Sunset Orange' || $color == 'Ocean Blue') {
                $finalPrice = $finalPrice + 2.00;
                $details .= "<li>Color ($color) Upcharge: <span>+$2.00</span></li>";
            }
            if($isCustomized == true && $size == 'XL') {
                $finalPrice = $finalPrice + 5.00;
                $details .= "<li>Customization Fee: <span>+$5.00</span></li>";
                $finalPrice = $finalPrice + 3.00;
                $details .= "<li>Customization Fee (XL) Upcharge: <span>+$3.00</span></li>";
            }
            elseif($isCustomized == true && $size != 'XL') {
                $finalPrice = $finalPrice + 5.00;
                $details .= "<li>Customization Fee: <span>+$5.00</span></li>";
            }
            if(strlen($customerFirstName) > 6) {
                $finalPrice = $finalPrice - 1.00;
                $details .= "<li>Long Name Discount: <span>-$1.00</span></li>";
            }


            // --- DO NOT EDIT BELOW THIS LINE ---
            echo "<ul>" . $details . "</ul>";
            echo "<ul><li><span class='total'>Final Price:</span> <span class='total'>$" . number_format($finalPrice, 2) . "</span></li></ul>";

/*
MY DEBUGGING LOG:
Problem: I tried changing the variable values in the configuration section, but after saving the code and
refreshing the page in my browser, the price didn't change as expected.
Solution: I realized I had never changed the url in the browser to point to the new refactored file,
so I was still viewing the old price_engine.php file. I updated the URL to point to the new
price_engine_refactored.php file, and now the prices change as expected when I modify the configuration values.
*/

        ?>
    </div>
</body>
</html>