<?php
/**
 * PHP Arrays - Indexed, Associative, and Multidimensional
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arrays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP Arrays</h1>
        <a href="index.php" class="back-link">← Back to Home</a>

        <h2>Indexed Arrays</h2>
        <div class="example">
            <?php
            $fruits = ["Apple", "Banana", "Orange", "Mango"];
            
            echo "<p>Fruits Array:</p>";
            echo "<ul>";
            foreach ($fruits as $index => $fruit) {
                echo "<li>Index $index: $fruit</li>";
            }
            echo "</ul>";
            
            echo "<p>Array Length: " . count($fruits) . "</p>";
            echo "<p>First Fruit: " . $fruits[0] . "</p>";
            echo "<p>Last Fruit: " . $fruits[count($fruits) - 1] . "</p>";
            ?>
        </div>

        <h2>Associative Arrays</h2>
        <div class="example">
            <?php
            $person = [
                "name" => "John Doe",
                "age" => 30,
                "email" => "john@example.com",
                "city" => "New York"
            ];
            
            echo "<p>Person Information:</p>";
            echo "<ul>";
            foreach ($person as $key => $value) {
                echo "<li><strong>" . ucfirst($key) . ":</strong> $value</li>";
            }
            echo "</ul>";
            ?>
        </div>

        <h2>Multidimensional Arrays</h2>
        <div class="example">
            <?php
            $students = [
                [
                    "name" => "Alice",
                    "age" => 20,
                    "grade" => "A"
                ],
                [
                    "name" => "Bob",
                    "age" => 22,
                    "grade" => "B"
                ],
                [
                    "name" => "Charlie",
                    "age" => 21,
                    "grade" => "A"
                ]
            ];
            
            echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
            echo "<tr><th>Name</th><th>Age</th><th>Grade</th></tr>";
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>{$student['name']}</td>";
                echo "<td>{$student['age']}</td>";
                echo "<td>{$student['grade']}</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

        <h2>Array Functions</h2>
        <div class="example">
            <?php
            $numbers = [5, 2, 8, 1, 9, 3];
            
            echo "<p>Original Array: " . implode(", ", $numbers) . "</p>";
            
            sort($numbers);
            echo "<p>Sorted (Ascending): " . implode(", ", $numbers) . "</p>";
            
            rsort($numbers);
            echo "<p>Sorted (Descending): " . implode(", ", $numbers) . "</p>";
            
            $numbers = [5, 2, 8, 1, 9, 3];
            echo "<p>Sum: " . array_sum($numbers) . "</p>";
            echo "<p>Average: " . (array_sum($numbers) / count($numbers)) . "</p>";
            echo "<p>Max: " . max($numbers) . "</p>";
            echo "<p>Min: " . min($numbers) . "</p>";
            ?>
        </div>

        <h2>Array Manipulation</h2>
        <div class="example">
            <?php
            $colors = ["Red", "Green", "Blue"];
            
            echo "<p>Original: " . implode(", ", $colors) . "</p>";
            
            array_push($colors, "Yellow");
            echo "<p>After push: " . implode(", ", $colors) . "</p>";
            
            array_pop($colors);
            echo "<p>After pop: " . implode(", ", $colors) . "</p>";
            
            array_unshift($colors, "Purple");
            echo "<p>After unshift: " . implode(", ", $colors) . "</p>";
            
            array_shift($colors);
            echo "<p>After shift: " . implode(", ", $colors) . "</p>";
            ?>
        </div>

        <h2>Array Search and Filter</h2>
        <div class="example">
            <?php
            $items = ["apple", "banana", "cherry", "date", "elderberry"];
            
            echo "<p>Search for 'cherry': " . array_search("cherry", $items) . "</p>";
            echo "<p>Check if 'banana' exists: " . (in_array("banana", $items) ? "Yes" : "No") . "</p>";
            
            $filtered = array_filter($items, function($item) {
                return strlen($item) > 5;
            });
            echo "<p>Items longer than 5 chars: " . implode(", ", $filtered) . "</p>";
            
            $mapped = array_map('strtoupper', $items);
            echo "<p>Uppercase: " . implode(", ", $mapped) . "</p>";
            ?>
        </div>
    </div>
</body>
</html>
