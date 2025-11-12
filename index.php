<?php
/**
 * PHP Basics - Main Entry Point
 * Demonstrates fundamental PHP concepts
 */

// Display errors for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Examples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 { color: #4F5B93; }
        h2 { color: #666; border-bottom: 2px solid #4F5B93; padding-bottom: 10px; }
        .example {
            background: #f9f9f9;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #4F5B93;
            border-radius: 4px;
        }
        code {
            background: #e8e8e8;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        .nav {
            margin: 20px 0;
        }
        .nav a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background: #4F5B93;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .nav a:hover {
            background: #3d4773;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐘 PHP Code Examples</h1>
        
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="variables.php">Variables</a>
            <a href="functions.php">Functions</a>
            <a href="arrays.php">Arrays</a>
            <a href="oop.php">OOP</a>
            <a href="database.php">Database</a>
            <a href="form.php">Forms</a>
        </div>

        <h2>1. Basic PHP Syntax</h2>
        <div class="example">
            <h3>Hello World</h3>
            <?php
            echo "<p>Hello, World!</p>";
            echo "<p>Current Date: " . date('Y-m-d H:i:s') . "</p>";
            ?>
        </div>

        <h2>2. Variables and Data Types</h2>
        <div class="example">
            <?php
            $string = "Hello PHP";
            $integer = 42;
            $float = 3.14;
            $boolean = true;
            $array = [1, 2, 3, 4, 5];
            
            echo "<p><strong>String:</strong> $string</p>";
            echo "<p><strong>Integer:</strong> $integer</p>";
            echo "<p><strong>Float:</strong> $float</p>";
            echo "<p><strong>Boolean:</strong> " . ($boolean ? 'true' : 'false') . "</p>";
            echo "<p><strong>Array:</strong> " . implode(', ', $array) . "</p>";
            ?>
        </div>

        <h2>3. Control Structures</h2>
        <div class="example">
            <h3>If-Else Statement</h3>
            <?php
            $age = 25;
            if ($age >= 18) {
                echo "<p>You are an adult (Age: $age)</p>";
            } else {
                echo "<p>You are a minor (Age: $age)</p>";
            }
            ?>

            <h3>Switch Statement</h3>
            <?php
            $day = date('l');
            switch ($day) {
                case 'Monday':
                    echo "<p>Start of the work week!</p>";
                    break;
                case 'Friday':
                    echo "<p>TGIF!</p>";
                    break;
                case 'Saturday':
                case 'Sunday':
                    echo "<p>Weekend! 🎉</p>";
                    break;
                default:
                    echo "<p>It's $day</p>";
            }
            ?>
        </div>

        <h2>4. Loops</h2>
        <div class="example">
            <h3>For Loop</h3>
            <?php
            echo "<p>";
            for ($i = 1; $i <= 5; $i++) {
                echo "Number $i ";
            }
            echo "</p>";
            ?>

            <h3>Foreach Loop</h3>
            <?php
            $fruits = ['Apple', 'Banana', 'Orange', 'Mango'];
            echo "<ul>";
            foreach ($fruits as $fruit) {
                echo "<li>$fruit</li>";
            }
            echo "</ul>";
            ?>
        </div>

        <h2>5. Functions</h2>
        <div class="example">
            <?php
            function greet($name = "Guest") {
                return "Hello, $name!";
            }

            function add($a, $b) {
                return $a + $b;
            }

            echo "<p>" . greet("John") . "</p>";
            echo "<p>5 + 3 = " . add(5, 3) . "</p>";
            ?>
        </div>

        <h2>6. Server Information</h2>
        <div class="example">
            <?php
            echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
            echo "<p><strong>Server Software:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . "</p>";
            echo "<p><strong>Document Root:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'N/A') . "</p>";
            echo "<p><strong>Current Script:</strong> " . $_SERVER['PHP_SELF'] . "</p>";
            ?>
        </div>
    </div>
</body>
</html>
