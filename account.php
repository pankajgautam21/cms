<!DOCTYPE html>
<html>
<head>
  <title>Create Account</title>
  <link rel="stylesheet" type="text/css" href="account.css">
</head>
<body>
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "cms_new";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) { 
  // Fetching variables from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  
  if($username != '' && $email != '' && $password != '' && $confirmPassword != '') {
    // Check if the passwords match
    if ($password === $confirmPassword) {
      // Prepare the insert statement
      // Hash the password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO user(username, email, hashed_password) VALUES (?, ?, ?)");
      
      // Check if the statement was prepared successfully
      if ($stmt === false) {
          die("Prepare failed: " . $conn->error);
      }
      
      // Hash the password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      
      // Bind the parameters
      $stmt->bind_param("sss", $username, $email, $hashedPassword);
      
      // Execute the statement
      $result = $stmt->execute();
      
      // Check if the execution was successful
      if ($result === false) {
          die("Execution failed: " . $stmt->error);
      }
      
      // Check if the insertion was successful
      if ($stmt->affected_rows > 0) {
        echo "<br/><br/><span>Account created successfully! </span>";
      } else {
        echo "<p>Account creation failed.</p>";
      }
      
      // Close the statement
      $stmt->close();
    } else {
      echo "<p>Passwords do not match.</p>";
    }
  } else {
    echo "<p>Please fill in all the required fields.</p>";
  }
}

// Close the connection
$conn->close();
?>

    <div class="container">
        <h1>Create Account</h1>
        <form class="form-box" name="create_account_form" action="account.php" method="post">
            <div class="row">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="row">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="row">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="row">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="row">
                <input type="submit" class="submit" name="submit" value="Create Account"<?php if(isset($_POST['submit'])) { 
header("Location: index.php"); } ?>
            </div>
            <div class="row">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
