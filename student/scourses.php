<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="student_dashboard.css">
    <link rel="stylesheet" href="scourses.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
<body>
<?php include 'student_sidebar.php';?>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Courses</span>
      </div>
     
      <div class="profile-details">
	  <img id="profile-img" src="../student_images/<?php echo $_SESSION['student_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['student_name']?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="container">
		<div class="card">
			<div class="circle">
				<h2><img src="../course_images/web_development.svg"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Web Development</h4>
				<p>Web development is the building and maintenance of websites</p>
				<a href="#">Read More</a>
			</div>
		</div>
		<div class="card">
			<div class="circle">
				<h2><img src="../course_images/ai.png"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Artifical Intelligence</h4>
				<p>Artificial intelligence is intelligence demonstrated by machines</p>
				<a href="#">Read More</a>
			</div>
		</div>
		<div class="card">
			<div class="circle">
				<h2><img src="../course_images/cloud.svg"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Cloud Computing</h4>
				<p>Cloud computing is the delivery of different services through the Internet.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><img src="../course_images/graphic-design.png"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Graphics Designing</h4>
				<p>Graphic designers create visual concepts using computer software or by hand.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><img src="../course_images/robot.svg"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Robotics</h4>
				<p>Robotics is the intersection of science, engineering and technology that produces machines, called robots.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><img src="../course_images/gamepad.svg"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Game Development</h4>
				<p>Game Development is the art of creating games and describes design, development and release of game.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><i class="fa fa-bitcoin"></i></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Crypto Currency</h4>
				<p>Cryptocurrency is a digital payment system that doesn't rely on banks to verify transactions.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><img src="../course_images/cyber_security.png"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Cyber Security</h4>
				<p>Cybersecurity is the practice of protecting systems, networks, and programs from digital attacks.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><img src="../course_images/mobile_app_development.png"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Mobile App Development</h4>
				<p>Mobile app development is the act or process by which a mobile app is developed for mobile devices.</p>
				<a href="#">Read More</a>
			</div>
		</div>
        <div class="card">
			<div class="circle">
				<h2><img src="../course_images/data_science.png"></h2>
			</div>
			<div class="content">
				<h4 class="work-header">Data Science</h4>
				<p>Data science is the domain of study that deals with vast volumes of data</p>
				<a href="#">Read More</a>
			</div>
		</div>
        
	</div>
	</section>
	<script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
</body>
</html>

