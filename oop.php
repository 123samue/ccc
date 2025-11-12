<?php
/**
 * PHP Object-Oriented Programming
 */

// Class Definition
class Person {
    private $name;
    private $age;
    private $email;

    public function __construct($name, $age, $email) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getEmail() {
        return $this->email;
    }

    public function introduce() {
        return "Hi, I'm {$this->name}, {$this->age} years old.";
    }
}

// Inheritance
class Student extends Person {
    private $studentId;
    private $grade;

    public function __construct($name, $age, $email, $studentId, $grade) {
        parent::__construct($name, $age, $email);
        $this->studentId = $studentId;
        $this->grade = $grade;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function introduce() {
        return parent::introduce() . " I'm a student with ID: {$this->studentId}";
    }
}

// Abstract Class
abstract class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function makeSound();

    public function getName() {
        return $this->name;
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof! Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

// Interface
interface PaymentInterface {
    public function processPayment($amount);
    public function getPaymentStatus();
}

class CreditCardPayment implements PaymentInterface {
    private $status = "pending";

    public function processPayment($amount) {
        $this->status = "completed";
        return "Processed $amount via Credit Card";
    }

    public function getPaymentStatus() {
        return $this->status;
    }
}

// Static Methods and Properties
class MathHelper {
    public static $pi = 3.14159;

    public static function square($n) {
        return $n * $n;
    }

    public static function circleArea($radius) {
        return self::$pi * self::square($radius);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP Object-Oriented Programming</h1>
        <a href="index.php" class="back-link">← Back to Home</a>

        <h2>Basic Class</h2>
        <div class="example">
            <?php
            $person = new Person("John Doe", 30, "john@example.com");
            echo "<p>" . $person->introduce() . "</p>";
            echo "<p>Email: " . $person->getEmail() . "</p>";
            ?>
        </div>

        <h2>Inheritance</h2>
        <div class="example">
            <?php
            $student = new Student("Alice Smith", 20, "alice@example.com", "S12345", "A");
            echo "<p>" . $student->introduce() . "</p>";
            echo "<p>Grade: " . $student->getGrade() . "</p>";
            ?>
        </div>

        <h2>Abstract Classes</h2>
        <div class="example">
            <?php
            $dog = new Dog("Buddy");
            $cat = new Cat("Whiskers");
            
            echo "<p>{$dog->getName()} says: {$dog->makeSound()}</p>";
            echo "<p>{$cat->getName()} says: {$cat->makeSound()}</p>";
            ?>
        </div>

        <h2>Interfaces</h2>
        <div class="example">
            <?php
            $payment = new CreditCardPayment();
            echo "<p>Status before: " . $payment->getPaymentStatus() . "</p>";
            echo "<p>" . $payment->processPayment(100.50) . "</p>";
            echo "<p>Status after: " . $payment->getPaymentStatus() . "</p>";
            ?>
        </div>

        <h2>Static Methods</h2>
        <div class="example">
            <?php
            echo "<p>PI: " . MathHelper::$pi . "</p>";
            echo "<p>Square of 5: " . MathHelper::square(5) . "</p>";
            echo "<p>Circle area (radius 3): " . MathHelper::circleArea(3) . "</p>";
            ?>
        </div>

        <h2>Magic Methods</h2>
        <div class="example">
            <?php
            class Product {
                private $data = [];

                public function __set($name, $value) {
                    $this->data[$name] = $value;
                }

                public function __get($name) {
                    return $this->data[$name] ?? null;
                }

                public function __toString() {
                    return json_encode($this->data);
                }
            }

            $product = new Product();
            $product->name = "Laptop";
            $product->price = 999.99;
            
            echo "<p>Product Name: {$product->name}</p>";
            echo "<p>Product Price: \${$product->price}</p>";
            echo "<p>Product as String: {$product}</p>";
            ?>
        </div>
    </div>
</body>
</html>
