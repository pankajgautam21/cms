<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="" method="post">
      <input type="text" name="username" id="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Login">
      <div class="row">
                <p>Don't have an account? <a href="account.php">Create account here</a></p>
            </div>
    </form>
  </div>
  <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database credentials
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "cms_new";

    // Create a database connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT hashed_password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $result = $stmt->fetch();
    $stmt->close();

    // Verify the password
    if (password_verify($password, $hashedPassword)) {

      $sql = "SELECT * FROM user WHERE  username= '$username'";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
        $email = $row["email"]; 
        $userId = $row['user_id'];
    }

    session_start();
    $_SESSION["email"] = $email;
    $_SESSION['user_id'] = $userId;
    print_r($_SESSION);
    

        // Check if the username is admin
        if ($username === "admin") {
            // Redirect to the admin page
            header("Location: admin.php");
            exit();
        } else {
            // Redirect to the home 
            if (isset($_SESSION['email'])) {
            header("Location: index.php");
            exit();
            }
        }
    } else {
        // Invalid username or password, display an error message
        echo "<script>alert('Invalid username or password');</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
</body>
</html>
