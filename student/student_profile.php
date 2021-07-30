<?php 

session_start();
include 'student_sidebar.php';
include '../db_connection.php';
$student_id=$_SESSION['student_id'];
$select="SELECT * FROM student where student_id='$student_id' ";
$run=mysqli_query($conn,$select);
$row_user=mysqli_fetch_array($run);
  
  $student_name=$row_user['student_name'];
  $student_image=$row_user['student_image'];
  $email=$row_user['email'];
  $phone=$row_user['phone'];
  $address=$row_user['address'];
  $courses_enrolled=$row_user['courses_enrolled'];
 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="student_dashboard.css">
  <link rel="stylesheet" href="student_profile.css">
</head>

<body>             
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Student Profile</span>
      </div>

      <div class="profile-details">
      <img src="../student_images/<?php echo $student_image;?>">
        <span class="admin_name">
          <?php echo $student_name?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="container">
      <div class="card1">
      <img class="admin-profile-img" src="../student_images/<?php echo $student_image;?>">
       
        <p class="name">
          <?php echo $student_name?>
        <p>
        <a href="student_logout.php"><input type="submit" class="edit-btn" value="Logout"></a>
      </div>
      <div class="card2">
        <table style="width:90%">
          <tr>
            <th>Student ID</th>
            <td>
              <?php echo $student_id?>
            </td>
          </tr>
        
          <tr>
            <th>Full Name</th>
            <td>
              <?php echo $student_name?>
            </td>
          </tr>

          <tr>
            <th>Email</th>
            <td>
              <?php echo $email?>
            </td>
          </tr>

          <tr>
            <th>Phone</th>
            <td>
              <?php echo $phone?>
            </td>
          </tr>

          <tr>
            <th>Address</th>
            <td>
              <?php echo $address?>
            </td>
          </tr>

        </table>


      </div>
      <div class="card3">
        <a href="#"><img class="icons" src="../social-media-regular-icons/globe.svg"></a><span class="icons-name">Website</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/github.svg"></a><span class="icons-name">Github</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/twitter.svg"></a><span class="icons-name">Twitter</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/instagram.svg"></a><span class="icons-name">Instagram</span>
        <hr>
        <a href="#"><img class="icons" src="../social-media-regular-icons/facebook.svg"></a><span class="icons-name">Facebook</span>
        
      </div>
      <div class="card4">
       <h3>Courses Enrolled</h3>
       <?php 
                    $exp=explode(",",$courses_enrolled);
                    for($i=0;$i<count($exp);$i++)
                    { 
                      echo '<label>'.($i+1).' '.$exp[$i].'</label>';
                    }
      ?>
       
    
      </div>

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
  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        "pagingType": "full_numbers"
      });
    });
  </script>
</body>

</html>