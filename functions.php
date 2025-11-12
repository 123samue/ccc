<?php
/**
 * PHP Functions - User-defined and Built-in
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP Functions</h1>
        <a href="index.php" class="back-link">← Back to Home</a>

        <h2>Basic Functions</h2>
        <div class="example">
            <?php
            function sayHello($name) {
                return "Hello, $name!";
            }

            function add($a, $b) {
                return $a + $b;
            }

            function multiply($a, $b) {
                return $a * $b;
            }

            echo "<p>" . sayHello("Alice") . "</p>";
            echo "<p>5 + 3 = " . add(5, 3) . "</p>";
            echo "<p>4 × 6 = " . multiply(4, 6) . "</p>";
            ?>
        </div>

        <h2>Default Parameters</h2>
        <div class="example">
            <?php
            function greet($name = "Guest", $greeting = "Hello") {
                return "$greeting, $name!";
            }

            echo "<p>" . greet() . "</p>";
            echo "<p>" . greet("John") . "</p>";
            echo "<p>" . greet("Mary", "Good morning") . "</p>";
            ?>
        </div>

        <h2>Type Declarations</h2>
        <div class="example">
            <?php
            function calculateArea(float $length, float $width): float {
                return $length * $width;
            }

            function isAdult(int $age): bool {
                return $age >= 18;
            }

            echo "<p>Area (5.5 × 3.2): " . calculateArea(5.5, 3.2) . "</p>";
            echo "<p>Is 25 adult? " . (isAdult(25) ? "Yes" : "No") . "</p>";
            echo "<p>Is 15 adult? " . (isAdult(15) ? "Yes" : "No") . "</p>";
            ?>
        </div>

        <h2>Variable-length Arguments</h2>
        <div class="example">
            <?php
            function sum(...$numbers) {
                $total = 0;
                foreach ($numbers as $num) {
                    $total += $num;
                }
                return $total;
            }

            echo "<p>Sum of 1, 2, 3: " . sum(1, 2, 3) . "</p>";
            echo "<p>Sum of 10, 20, 30, 40: " . sum(10, 20, 30, 40) . "</p>";
            ?>
        </div>

        <h2>Anonymous Functions (Closures)</h2>
        <div class="example">
            <?php
            $square = function($n) {
                return $n * $n;
            };

            $cube = function($n) {
                return $n * $n * $n;
            };

            echo "<p>Square of 5: " . $square(5) . "</p>";
            echo "<p>Cube of 3: " . $cube(3) . "</p>";

            $numbers = [1, 2, 3, 4, 5];
            $squared = array_map($square, $numbers);
            echo "<p>Squared array: " . implode(", ", $squared) . "</p>";
            ?>
        </div>

        <h2>Arrow Functions (PHP 7.4+)</h2>
        <div class="example">
            <?php
            $double = fn($n) => $n * 2;
            $isEven = fn($n) => $n % 2 === 0;

            echo "<p>Double of 7: " . $double(7) . "</p>";
            echo "<p>Is 8 even? " . ($isEven(8) ? "Yes" : "No") . "</p>";

            $nums = [1, 2, 3, 4, 5];
            $doubled = array_map(fn($n) => $n * 2, $nums);
            echo "<p>Doubled: " . implode(", ", $doubled) . "</p>";
            ?>
        </div>

        <h2>Recursive Functions</h2>
        <div class="example">
            <?php
            function factorial($n) {
                if ($n <= 1) {
                    return 1;
                }
                return $n * factorial($n - 1);
            }

            function fibonacci($n) {
                if ($n <= 1) {
                    return $n;
                }
                return fibonacci($n - 1) + fibonacci($n - 2);
            }

            echo "<p>Factorial of 5: " . factorial(5) . "</p>";
            echo "<p>Fibonacci sequence (first 10):</p>";
            echo "<p>";
            for ($i = 0; $i < 10; $i++) {
                echo fibonacci($i) . " ";
            }
            echo "</p>";
            ?>
        </div>

        <h2>Built-in String Functions</h2>
        <div class="example">
            <?php
            $text = "  Hello World  ";
            
            echo "<p>Original: '$text'</p>";
            echo "<p>Trimmed: '" . trim($text) . "'</p>";
            echo "<p>Uppercase: " . strtoupper($text) . "</p>";
            echo "<p>Lowercase: " . strtolower($text) . "</p>";
            echo "<p>Length: " . strlen(trim($text)) . "</p>";
            echo "<p>Replace: " . str_replace("World", "PHP", $text) . "</p>";
            echo "<p>Position of 'World': " . strpos($text, "World") . "</p>";
            ?>
        </div>
    </div>
</body>
</html>
