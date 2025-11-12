<?php
/**
 * PHP Form Handling - GET and POST
 */

$submitted = false;
$formData = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
    
    // Validate and sanitize input
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $interests = $_POST['interests'] ?? [];
    $message = trim($_POST['message'] ?? '');
    
    // Validation
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($age)) {
        $errors[] = "Age is required";
    } elseif (!is_numeric($age) || $age < 1 || $age > 120) {
        $errors[] = "Age must be between 1 and 120";
    }
    
    if (empty($errors)) {
        $formData = [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'age' => htmlspecialchars($age),
            'gender' => htmlspecialchars($gender),
            'country' => htmlspecialchars($country),
            'interests' => array_map('htmlspecialchars', $interests),
            'message' => htmlspecialchars($message)
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Handling</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        button {
            background: #4F5B93;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #3d4773;
        }
        .error {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .success {
            background: #efe;
            border: 1px solid #cfc;
            color: #3c3;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Form Handling</h1>
        <a href="index.php" class="back-link">← Back to Home</a>

        <?php if ($submitted && !empty($errors)): ?>
            <div class="error">
                <strong>Please fix the following errors:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($submitted && empty($errors)): ?>
            <div class="success">
                <h2>Form Submitted Successfully!</h2>
                <p><strong>Name:</strong> <?php echo $formData['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $formData['email']; ?></p>
                <p><strong>Age:</strong> <?php echo $formData['age']; ?></p>
                <p><strong>Gender:</strong> <?php echo $formData['gender'] ?: 'Not specified'; ?></p>
                <p><strong>Country:</strong> <?php echo $formData['country']; ?></p>
                <p><strong>Interests:</strong> <?php echo !empty($formData['interests']) ? implode(', ', $formData['interests']) : 'None'; ?></p>
                <p><strong>Message:</strong> <?php echo nl2br($formData['message']); ?></p>
            </div>
        <?php endif; ?>

        <h2>Registration Form</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Age *</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>" min="1" max="120" required>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <label><input type="radio" name="gender" value="Male" <?php echo (($_POST['gender'] ?? '') === 'Male') ? 'checked' : ''; ?>> Male</label>
                <label><input type="radio" name="gender" value="Female" <?php echo (($_POST['gender'] ?? '') === 'Female') ? 'checked' : ''; ?>> Female</label>
                <label><input type="radio" name="gender" value="Other" <?php echo (($_POST['gender'] ?? '') === 'Other') ? 'checked' : ''; ?>> Other</label>
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="">Select a country</option>
                    <option value="USA" <?php echo (($_POST['country'] ?? '') === 'USA') ? 'selected' : ''; ?>>United States</option>
                    <option value="UK" <?php echo (($_POST['country'] ?? '') === 'UK') ? 'selected' : ''; ?>>United Kingdom</option>
                    <option value="Canada" <?php echo (($_POST['country'] ?? '') === 'Canada') ? 'selected' : ''; ?>>Canada</option>
                    <option value="Australia" <?php echo (($_POST['country'] ?? '') === 'Australia') ? 'selected' : ''; ?>>Australia</option>
                    <option value="India" <?php echo (($_POST['country'] ?? '') === 'India') ? 'selected' : ''; ?>>India</option>
                </select>
            </div>

            <div class="form-group">
                <label>Interests</label>
                <?php $selectedInterests = $_POST['interests'] ?? []; ?>
                <label><input type="checkbox" name="interests[]" value="Programming" <?php echo in_array('Programming', $selectedInterests) ? 'checked' : ''; ?>> Programming</label>
                <label><input type="checkbox" name="interests[]" value="Design" <?php echo in_array('Design', $selectedInterests) ? 'checked' : ''; ?>> Design</label>
                <label><input type="checkbox" name="interests[]" value="Music" <?php echo in_array('Music', $selectedInterests) ? 'checked' : ''; ?>> Music</label>
                <label><input type="checkbox" name="interests[]" value="Sports" <?php echo in_array('Sports', $selectedInterests) ? 'checked' : ''; ?>> Sports</label>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>

        <h2>GET Method Example</h2>
        <div class="example">
            <p>Try accessing: <code>form.php?name=John&age=25</code></p>
            <?php if (!empty($_GET)): ?>
                <p><strong>GET Parameters:</strong></p>
                <ul>
                    <?php foreach ($_GET as $key => $value): ?>
                        <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
