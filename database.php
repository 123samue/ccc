<?php
/**
 * PHP Database Operations (MySQL/MySQLi)
 * Note: This is example code. Update credentials for actual use.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP Database Operations</h1>
        <a href="index.php" class="back-link">← Back to Home</a>

        <h2>MySQLi Connection (Procedural)</h2>
        <div class="example">
            <pre><code>&lt;?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mydb';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Close connection
mysqli_close($conn);
?&gt;</code></pre>
        </div>

        <h2>MySQLi Connection (Object-Oriented)</h2>
        <div class="example">
            <pre><code>&lt;?php
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?&gt;</code></pre>
        </div>

        <h2>Create Table</h2>
        <div class="example">
            <pre><code>&lt;?php
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error: " . $conn->error;
}
?&gt;</code></pre>
        </div>

        <h2>Insert Data</h2>
        <div class="example">
            <pre><code>&lt;?php
// Using prepared statements (recommended)
$stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $email);

$username = "john_doe";
$email = "john@example.com";
$stmt->execute();

echo "New record created successfully";
$stmt->close();
?&gt;</code></pre>
        </div>

        <h2>Select Data</h2>
        <div class="example">
            <pre><code>&lt;?php
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . 
             " - Name: " . $row["username"] . 
             " - Email: " . $row["email"] . "&lt;br&gt;";
    }
} else {
    echo "0 results";
}
?&gt;</code></pre>
        </div>

        <h2>Update Data</h2>
        <div class="example">
            <pre><code>&lt;?php
$stmt = $conn->prepare("UPDATE users SET email = ? WHERE username = ?");
$stmt->bind_param("ss", $email, $username);

$email = "newemail@example.com";
$username = "john_doe";
$stmt->execute();

echo "Record updated successfully";
$stmt->close();
?&gt;</code></pre>
        </div>

        <h2>Delete Data</h2>
        <div class="example">
            <pre><code>&lt;?php
$stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$username = "john_doe";
$stmt->execute();

echo "Record deleted successfully";
$stmt->close();
?&gt;</code></pre>
        </div>

        <h2>PDO Connection</h2>
        <div class="example">
            <pre><code>&lt;?php
try {
    $dsn = "mysql:host=$host;dbname=$database";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?&gt;</code></pre>
        </div>

        <h2>PDO Prepared Statements</h2>
        <div class="example">
            <pre><code>&lt;?php
// Insert
$stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
$stmt->execute([
    ':username' => 'jane_doe',
    ':email' => 'jane@example.com'
]);

// Select
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute([':username' => 'jane_doe']);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($user);
?&gt;</code></pre>
        </div>

        <h2>Transaction Example</h2>
        <div class="example">
            <pre><code>&lt;?php
try {
    $pdo->beginTransaction();
    
    $pdo->exec("INSERT INTO users (username, email) VALUES ('user1', 'user1@example.com')");
    $pdo->exec("INSERT INTO users (username, email) VALUES ('user2', 'user2@example.com')");
    
    $pdo->commit();
    echo "Transaction completed successfully";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
?&gt;</code></pre>
        </div>

        <div class="example">
            <p><strong>Note:</strong> This page shows example code for database operations. 
            To use these examples, you need to:</p>
            <ul>
                <li>Install MySQL/MariaDB</li>
                <li>Create a database</li>
                <li>Update connection credentials</li>
                <li>Enable mysqli or PDO extension in php.ini</li>
            </ul>
        </div>
    </div>
</body>
</html>
