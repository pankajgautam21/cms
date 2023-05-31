<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard - College Maintenance System</title>
	<!-- Add CSS stylesheet -->
	<link rel="stylesheet" type="text/css" href="admin.css">
	<!-- PHP code to establish connection with the localserver -->
	<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['email'])) {
    // User is not authenticated, redirect to login page or another page
    header("Location: login.php");
    exit();
}

// Proceed with displaying the admin content
// ...
?>
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'cms_new';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
if (isset($_POST['resolved'])) {
    $id = $_POST['resolved']; // Get the ID of the row
    $updateQuery = "UPDATE complaint SET status = 'Resolved' WHERE complaint_id = '$id'";
    $mysqli->query($updateQuery);
}
if (isset($_POST['decline'])) {
    $id = $_POST['decline']; // Get the ID of the row
    $updateQuery = "UPDATE complaint SET status = 'Decline' WHERE complaint_id = '$id'";
    $mysqli->query($updateQuery);
}
// SQL query to select data from database
$sql = " SELECT u.email,u.username, c.*
FROM complaint c
JOIN user u ON c.user_id = u.user_id;
 ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

</head>
<body>
	<!-- Add main content area -->
	<main>
		<h1><center>Welcome Admin</center></h1>
		
        <table style="width:100%;">
            <tr>
			    <th>Complaint ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Complaint date</th>
				<th>Year</th>
				<th>Matter</th>
				<th>Description</th>
				<th>Status</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
				
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
			    <td><?php echo $rows['complaint_id'];?></td>
                <td><?php echo $rows['username'];?></td>
				<td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['c_date'];?></td>
                <td><?php echo $rows['year'];?></td>
				<td><?php echo $rows['matter'];?></td>
				<td><?php echo $rows['description'];?></td>
				<td><?php echo $rows['status'];?></td>
				<form method="post" action="">
                         <td><button type="submit" name="resolved" value="<?php echo $rows['complaint_id']; ?>">Resolved</button></td>
                        </form>
						<td>
                        <form method="post" action="">
                        <td><button type="submit" name="decline" value="<?php echo $rows['complaint_id']; ?>">Decline</button></td>
                        </form>
                    </td>

            </tr>
            <?php
				}
			?>
        </table>
	</main>
</body>
</html>