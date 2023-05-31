 <html>
<head>
<title>home page</title>
<link href="college.css">
<link rel="stylesheet" href="college.css">
</head>
<body>
  <header>
     <h1 class="logo"></h1> 
    <input type="checkbox" class="nav-toggle" id="nav-toggle">
    <nav>
      <ul>
        <li> <a class="active" href="index.php">Home</a></li>
        <li> <a href="form.php">Complaint</a></li>
        <li> <a href="contactus.php">Contact us</a></li>
        <li> <a href="work.php">How we work?</a></li>
        <li> <a href="logout.php">logout</a></li>
      </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
      <span></span>
    </label>
  </header>

  <?php
  session_start();
if (!isset($_SESSION['email'])) {
  // User is not authenticated, redirect to login page or another page
  header("Location: login.php");
  exit();
}
  ?>
  <!-- Section One -->
  
  <section class="section-one">
    <h2 class="header">Welcome to College Maintenance System</h2>
    <p class="section-one-paragraph" style="text-align: center;">College maintenance includes cleaning common areas and repairing items that are broken. It can involve inspecting, repairing, and maintaining electrical systems, heating and air conditioning systems, and other utility services.</p>
    
  </section>
  
  <!-- Section Two -->
  <section class="section=two">
    <img src="images/home-background.gif" style="display: inline;">
    
  </section>
  
  <!-- Section Three -->
  <section class="section-three">
    <h3>We ensure the proper maintenance of college on the student or faculty complaint on any improper condition if any.</h3>
  </section>
  
  
</body>
</html>