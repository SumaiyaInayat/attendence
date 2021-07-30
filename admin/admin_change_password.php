<?php
session_start();
include '../db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php 
include 'admin_sidebar.php';
include '../db_connection.php';
if(isset($_POST['password'])){
    $admin_id=$_SESSION['admin_id'];
    $select="SELECT * FROM `admin` where admin_id='$admin_id' ";
    
    $run=mysqli_query($conn,$select);
    $row_user=mysqli_fetch_array($run);
    $password=$row_user['password'];
    $oldpassword = MD5($_POST['oldpassword']);
    
    $newpassword = MD5($_POST['newpassword']);
    if($password==$oldpassword){
        $update="UPDATE `admin` SET password='{$newpassword}' where `admin_id`='$admin_id' ";
        $run_update=mysqli_query($conn,$update)  or die("Error");
        header('Location:../login.php');
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
  <link rel="stylesheet" href="admin_dashboard.css">
  <link rel="stylesheet" href="admin_change_password.css">
</head>

<body>             
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Change Password</span>
      </div>

      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>
    <div class="container">
    <div class="contact-form">
     
      
      <form method="post" action="" autocomplete="off">
        <h3 class="title">Change Password</h3>
        <div class="input-container">
          <input type="text" name="oldpassword" class="input" required />
          <label for="">Old Password</label>
          <span>Old Password</span>
        </div>
        <div class="input-container">
          <input type="password" name="newpassword" class="input" id="password1"required />
          <strong class="input eye" onclick="myfunction1()">
          <i id="hide3" class="fa fa-eye"></i>
          <i id="hide4" class="fa fa-eye-slash"></i>
          </strong>

          <label for="">New Password</label>
          <span>New Password</span>
        </div>
        <input type="submit" name="password" value="Change Password" class="btn" />
      </form>
    </div>
    </div>
</section>
</body>
<script src="../app.js"></script>
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
</html>