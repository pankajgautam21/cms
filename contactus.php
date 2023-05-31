<!DOCTYPE html>
<html>

<head>
	<title>Contact Us page</title>
	<link rel="stylesheet" href="contactus.css">
</head>

<body>
	
      <header>
     <h1 class="logo"></h1> 
    <input type="checkbox" class="nav-toggle" id="nav-toggle">
    <nav>
      <ul>
        <li> <a href="index.php">Home</a></li>
        <li> <a href="form.php">Complaint</a></li>
        <li> <a class="active" href="contactus.php">Contact us</a></li>
		<li> <a href="work.php">How we work?</a></li>
		<li> <a href="logout.php">logout</a></li>
      </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
      <span></span>
    </label>
  </header>
  
  <div class="container">
	<section class="background firstsection">
		<div class="box-main">
			<div class="firstHalf">	
				<p class="text-big">Contact Us</p>

				<p class="text-small">
					You can Contact Us if you face any problem
				</p>

				<br>
				<p class="center"
				style="text-decoration:none;
						color:white;">
					Click on the below options to Contact us
				</p>

			</div>
		</div>
        
	</section>
	<section class="service">
		 
		<!-- Heading-->
		<h1 class="h-primary center"
			style="margin-top:30px;">
			Options to Contact
		</h1>
		<div id="service">
			<div class="box">
				<!-- Form -->
				
				<br>
				
				<!-- Displaying text at
					the center of the box-->
				
			</div>
			<div class="box">
				
				<!-- Email -->
				<img src="images/mail.png"
					alt= "mail">
				<br>
				
					<!-- Displaying text at
					the center of the box-->
				<p class="center">
					Use this Email to send us about the problem faced
				</p><p>pietjaipur@rtu.ac.in</p>


			</div>
			<div class="box">
				<img src="images/phone.png"
					alt= "color_image">
				<br>
				
				<!-- Displaying text at
					the center of the box-->
				<p class="center">
					CONTACT Number:0141- 2771259
				</p>

			</div>
		</div>
		<div class="box">
		<a href="https://in.linkedin.com/school/poornima-group-of-colleges/" style="font-size: 150px;position: relative;left: 250px; bottom:20px"><ion-icon name="logo-linkedin"></ion-icon></a>
		<span class="center" style="position: relative;left: 100px;" >
			Linkedink
		</span>
		<a href="https://www.instagram.com/piet_jaipur/" style="font-size: 150px;position: relative;left: 450px; bottom:20px"><ion-icon name="logo-instagram"></ion-icon></a>
		<span class="center" style="position: relative;left: 300px;" >
			Instagram
		</span>
	</div>
	</section>
    </div>
	<footer class="background">
		<p class="text-footer">
			Copyright @-All rights are reserved
		</p>

	</footer>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
