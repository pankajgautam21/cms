<!DOCTYPE html>
<html>
<head>
    <title>Complaint Status</title>
    <link rel="stylesheet" href="contactus.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        .status_container {
            padding: 50px;
        }

        h1 {
            text-align: center;
            top:20px;
            position:relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
        }
    </style>
    <header>
     <h1 class="logo"></h1> 
    
    <nav>
      <ul>
        <li> <a href="index.php">Home</a></li>
        <li> <a href="form.php">Complaint</a></li>
        <li> <a href="contactus.php">Contact us</a></li>
        <li> <a class="active" href="complaint_status.php">Status of Complaint</a></li>
        <li> <a href="work.php">How we work?</a></li>
        <li> <a href="logout.php">logout</a></li>
      </ul>
    </nav>
    
</header>
</head>
<body>

<header>
     <h1 class="logo"></h1> 
    
    <nav>
      <ul>
        <li> <a href="index.php">Home</a></li>
        <li> <a href="form.php">Complaint</a></li>
        <li> <a href="contactus.php">Contact us</a></li>
        <li> <a class="active" href="work.php">How we work?</a></li>
        <li> <a href="logout.php">logout</a></li>
      </ul>
    </nav>
    
</header>
<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_new";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$email = $_SESSION["email"];
$userId = $_SESSION["user_id"];

// Prepare the SQL query to fetch complaints and their statuses for the given email
$sql = "SELECT * FROM complaint WHERE user_id = '$userId'";
$result = $conn->query($sql);

// Check if any complaints exist for the given email
if ($result->num_rows > 0) {
    echo "<div class='status_container'><h1>Complaint Status</h1>
            <table>
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Matter</th>
                        <th>Complaint</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody></div>";

    // Output the complaints and their statuses
    while ($row = $result->fetch_assoc()) {
        $complaint_id = $row["complaint_id"];
        $matter = $row["matter"];
        $complaintText = $row["description"];
        $status = $row["status"];

        echo "<tr>
                <td>$complaint_id</td>
                <td>$matter</td>
                <td>$complaintText</td>
                <td>$status</td>
            </tr>";
    }

    echo "</tbody>
        </table>";
} else {
    echo '<h1>No complaints found for the given email.</h1>';
}

// Close the database connection
$conn->close();
?>
</body>
</html>
