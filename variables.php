<?php
/**
 * PHP Variables and Data Types
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP Variables & Data Types</h1>
        <a href="index.php" class="back-link">← Back to Home</a>

        <h2>Variable Declaration</h2>
        <div class="example">
            <?php
            $name = "John Doe";
            $age = 30;
            $salary = 50000.50;
            $isEmployed = true;
            
            echo "<p>Name: $name (Type: " . gettype($name) . ")</p>";
            echo "<p>Age: $age (Type: " . gettype($age) . ")</p>";
            echo "<p>Salary: $salary (Type: " . gettype($salary) . ")</p>";
            echo "<p>Employed: " . ($isEmployed ? 'Yes' : 'No') . " (Type: " . gettype($isEmployed) . ")</p>";
            ?>
        </div>

        <h2>Variable Scope</h2>
        <div class="example">
            <?php
            $globalVar = "I'm global";

            function testScope() {
                $localVar = "I'm local";
                global $globalVar;
                echo "<p>Inside function: $globalVar</p>";
                echo "<p>Local variable: $localVar</p>";
            }

            testScope();
            echo "<p>Outside function: $globalVar</p>";
            ?>
        </div>

        <h2>Constants</h2>
        <div class="example">
            <?php
            define("SITE_NAME", "My PHP Website");
            define("MAX_USERS", 100);
            const PI = 3.14159;

            echo "<p>Site Name: " . SITE_NAME . "</p>";
            echo "<p>Max Users: " . MAX_USERS . "</p>";
            echo "<p>PI: " . PI . "</p>";
            ?>
        </div>

        <h2>Type Casting</h2>
        <div class="example">
            <?php
            $number = "123";
            $intNumber = (int)$number;
            $floatNumber = (float)$number;
            
            echo "<p>Original: $number (Type: " . gettype($number) . ")</p>";
            echo "<p>As Integer: $intNumber (Type: " . gettype($intNumber) . ")</p>";
            echo "<p>As Float: $floatNumber (Type: " . gettype($floatNumber) . ")</p>";
            ?>
        </div>

        <h2>String Operations</h2>
        <div class="example">
            <?php
            $firstName = "John";
            $lastName = "Doe";
            $fullName = $firstName . " " . $lastName;
            
            echo "<p>Full Name: $fullName</p>";
            echo "<p>Length: " . strlen($fullName) . "</p>";
            echo "<p>Uppercase: " . strtoupper($fullName) . "</p>";
            echo "<p>Lowercase: " . strtolower($fullName) . "</p>";
            echo "<p>Substring: " . substr($fullName, 0, 4) . "</p>";
            ?>
        </div>

        <h2>Variable Variables</h2>
        <div class="example">
            <?php
            $varName = "message";
            $$varName = "Hello from variable variable!";
            
            echo "<p>Variable name: $varName</p>";
            echo "<p>Variable value: $message</p>";
            ?>
        </div>
    </div>
</body>
</html>
