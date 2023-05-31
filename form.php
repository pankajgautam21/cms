<!DOCTYPE html>
<html lang="en">
<head>
<link href="college.css">
<link rel="stylesheet" href="college.css">
<link rel="stylesheet" href="complaint-form.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  // $fname = $_POST['firstname'];
  // $lname = $_POST['lastname'];
  // $email = $_POST['E-mail'];
  // $gender = $_POST['Gender'];
  $user_id = $_SESSION['user_id'];
  $date = $_POST['date'];
  $year = $_POST['year'];
  $matter = $_POST['Matter'];
  $description = $_POST['Description'];
  
  if($user_id) {
    // Prepare the insert statement
    $stmt = $conn->prepare("INSERT INTO complaint (user_id, c_date, year, matter, description) VALUES ( ?, ?, ?, ?, ?)");
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind the parameters
    $stmt->bind_param("sssss", $user_id, $date, $year, $matter, $description);
    
    // Execute the statement
    $result = $stmt->execute();
    
    // Check if the execution was successful
    if ($result === false) {
        die("Execution failed: " . $stmt->error);
    }
    
    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
      $complaintId = $conn->insert_id;
      echo "<br/><br/><span>Data Inserted successfully...!!.Your complaint ID is $complaintId</span>";
    } else {
      echo "<p>Insertion Failed. Some Fields are Blank....!!</p>";
    }
    
    // Close the statement
    $stmt->close();
  } else {
    echo "<p>Insertion Failed. Some Fields are Blank....!!</p>";
  }
}

// Close the connection
$conn->close();
?>


<header>
     <h1 class="logo"></h1> 
    <input type="checkbox" class="nav-toggle" id="nav-toggle">
    <nav>
      <ul>
        <li> <a href="index.php">Home</a></li>
        <li> <a class="active" href="form.php">Complaint</a></li>
        <li> <a href="complaint_status.php">Status of Complaint</a></li>
        <li> <a href="contactus.php">Contact us</a></li>
        <li> <a href="work.php">How we work?</a></li>
        <li> <a href="logout.php">logout</a></li>
      </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
    </label>
</header>
    <link rel="stylesheets" href="C:\Users\PAWAN GAUTAM\Desktop\clg maintenance  system\index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form class="form-box" name="complaint_form" action="form.php" method="post">
             <h1 style="text-align: center;">ANY COMPLAINT?</h1>
          <!-- <div class="row">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              
              <input type="text" id="fname" name="firstname" value="" placeholder="" required >
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" value="" placeholder="Your last name.." required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="email">E-mail</label>
            </div>
          <div class="col-75">
            <input type="email" id="email" name="E-mail" value="" placeholder="Your college email id.."  required>
          </div>
        </div>
        <div class="row">
            <div class="col-25">
              <label for="gender">Gender</label>
            </div>
            <div class="col-75">
              <input type="radio" id="male" value="male" name="Gender">
              <label>Male</label>
              <input type="radio" id="Female" value="female" name="Gender">
              <label>Female</label>
            </div>
          </div> -->
          <div class="row">
            <div class="col-25">
              <label for="Date">Complaint-Date</label>
            </div>
            <div class="col-75">
              <input type="date" id="date" name="date" value="">
              
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="year">Year</label>
            </div>
            <div class="col-75">
              <select id="year" name="year" placeholder="choose option" value="">
                <option value="" disabled selected hidden>choose Year</option>
                <option value="first" placeholder="choose option">first</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="final">final</option>
                <option value="none">I am a faculty</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Matter">Matter</label>
            </div>
            <div class="col-75">
              <select id="Matter" name="Matter" value=""  placeholder="choose option">
                <option value="" disabled selected hidden>choose option</option>
                <option value="Furniture" placeholder="choose option">Furniture</option>
                <option value="Electricity">Electricity</option>
                <option value="Sanitary">Sanitary</option>
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col-25">
              <label for="Description">Description</label>
            </div>
            <div class="col-75">
              <textarea id="Description" value="" name="Description" placeholder="Write something.." style="height:200px" required></textarea>
            </div>
          </div>
          <div class="row">
            <input type="submit" class="submit" name="submit" type="reset" value="Submit">
            <input type="reset" value="Reset">
            
            <script>
              function fun()
              {
                alert("your response has been sucessfully submited");
                document.complaint_form.reset();
                
              }
            </script>
          </div>
        </form>
      </div>
      
</body>
</html>