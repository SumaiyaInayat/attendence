<?php
session_start();
include '../db_connection.php';
include 'admin_sidebar.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '../db_connection.php';
    if(isset($_POST['teacher'])){
        $teacher_id = $_POST['teacher_id'];
        $teacher_name=$_POST['teacher_name'];

        $teacher_image=$_FILES['teacher_image']['name'];
        $temp_name=$_FILES['teacher_image']['tmp_name'];

        $password = $_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $courses_teaching= implode(',',$_POST['courses_teaching']);
        $sql="INSERT INTO `teacher`(`teacher_id`,`teacher_name`,`teacher_image`, `password`,`email`,`phone`,`courses_teaching`) VALUES ('$teacher_id','$teacher_name','$teacher_image',MD5('$password'),'$email','$phone','".$courses_teaching."')";
      
        $result=mysqli_query($conn,$sql); 
        if($result){
          move_uploaded_file($temp_name,"../teacher_images/$teacher_image");
          header('Location:add_teacher.php');
          exit;
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_teacher.css">
    <link rel="stylesheet" href="admin_dashboard.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Add Employee</span>
      </div>

      <div class="profile-details">
      <img src="Zunaira Hasnain.jpg">
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>
    <div class="container">
        <div class="title">
            Add Teacher
        </div>
        <form class="form" method="post" action="" autocomplete="off" enctype="multipart/form-data">


            <div class="inputfield">
                <label for="">Teacher ID</label>
                <input type="text" name="teacher_id" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Teacher Name</label>
                <input type="text" name="teacher_name" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Teacher Image</label>
                <input type="file" name="teacher_image" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Password</label>
                <input type="password" name="password" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" required />
            </div>


            <div class="container1">
                <div class="title1">
                    Select Courses
                </div>
                <ul class="group">

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Web Development" id="Web Development" />
                        <label for="Web Development">Web Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Artifical Intelligence"
                            id="Artifical Intelligence" />
                        <label for="Artifical Intelligence">Artifical Intelligence</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Cloud Computing" id="Cloud Computing" />
                        <label for="Cloud Computing">Cloud Computing</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Graphics Designing"
                            id="Graphics Designing" />
                        <label for="Graphics Designing">Graphics Designing</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Robotics" id="Robotics" />
                        <label for="Robotics">Robotics</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Game Development"
                            id="Game Development" />
                        <label for="Game Development">Game Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_enrolled[]" value="Crypto Currency" id="Crypto Currency" />
                        <label for="Crypto Currency">Crypto Currency</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Cyber Security" id="Cyber Security" />
                        <label for="Cyber Security">Cyber Security</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Mobile App Development"
                            id="Mobile App Development" />
                        <label for="Mobile App Development">Mobile App Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Data Science" id="Data Science" />
                        <label for="Data Science">Data Science</label>
                    </li>

    
            </div>
            <input type="submit" name="teacher" value="SAVE" class="btn" />
        </form>

        
    </div>
</section>
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
</body>

</html>