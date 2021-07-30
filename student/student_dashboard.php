<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php
    include '../db_connection.php';
    $select="SELECT * FROM student";
    $run=mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){
        
        $student_id = $row_user['student_id'];
        $student_name = $row_user['student_name'];
        $date=date("Y-m-d");
        $select1="SELECT * FROM student_attendance where student_id='$student_id' and attendance_date='$date'";
        $run1=mysqli_query($conn,$select1);
        
        
        if($run1->num_rows==0){
            $sql="INSERT INTO `student_attendance` (`student_id`, `student_name`,`attendance_status`, `attendance_date`) VALUES ('$student_id','$student_name','Absent', CURRENT_DATE());";
            $result=mysqli_query($conn,$sql);
            
        }
    }         

?>
<?php

$a=$_SESSION['student_name'];
fopen("student_attendance_record/".$a.".txt", "a") or die("Unable to open file!");  

if(file_get_contents("student_attendance_record/".$a.".txt")){
  include '../db_connection.php';
  $student_id=$_SESSION['student_id'];
  $student_name=$_SESSION['student_name'];


  $sql="UPDATE `student_attendance` SET `student_id`='$student_id', `student_name`='$student_name',`attendance_status`='Present', `attendance_date`=CURRENT_DATE() where `student_id`='$student_id'" ;
  $result=mysqli_query($conn,$sql);

    unlink("student_attendance_record/".$a.".txt");
    include '../alert.php';
    header("Refresh:5");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="student_dashboard.css">
    
</head>
<body>
    
    <?php include 'student_sidebar.php';?>
    
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Student Dashboard</span>
      </div>
     
      <div class="profile-details">
      <img src="../student_images/<?php echo $_SESSION['student_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['student_name'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <section>
    
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