<?php 
session_start();
include 'admin_sidebar.php';
include '../db_connection.php';
if(isset($_GET['del'])){
    $del_id=$_GET['del'];
    $delete="DELETE from student where student_id='$del_id'";
    $run_delete=mysqli_query($conn,$delete);
    header('Location:view_student.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="view_student.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Student Details</span>
      </div>
     
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name"><?php echo $_SESSION['admin_name']?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <h1>Student Details</h1>

    <div class="container">
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Courses Enrolled</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db_connection.php';
                $select="SELECT * FROM student";
                $run=mysqli_query($conn,$select);
                while($row_user=mysqli_fetch_array($run)){
                    $id=$row_user['id'];
                    $student_id = $row_user['student_id'];
                    $student_name=$row_user['student_name'];
                    $student_image=$row_user['student_image'];
        
                    $email=$row_user['email'];
                    $phone=$row_user['phone'];
                    $courses_enrolled=$row_user['courses_enrolled'];

                    
                ?>

                <tr>
                    <td>
                        <?php echo $id?>
                    </td>
                    <td>
                        <?php echo $student_id?>
                    </td>
                    <td>
                        <?php echo $student_name?>
                    </td>
                    <td><img src="../student_images/<?php echo $student_image;?>" height="100px" width="100px"></td>
                  
                    <td>
                        
                        <?php echo $email?>
                  
                    </td>
                    <td>
                        <?php echo $phone?>
                    </td>
                    <td>
                        <?php 
                    $exp=explode(",",$courses_enrolled);
                   
                    for($i=0;$i<count($exp);$i++)
                        echo $exp[$i]."<br>";
                    
                    ?>
                    </td>
                    <td>
                    <a href="edit_student.php?student_id=<?php echo $student_id;?>">
                    <input type="image" name="Edit"
                    src="../edit.svg" width=25px height=25px>
                    <a>
                    
                    <a href="view_student.php?del=<?php echo $student_id;?>">
                    <input type="image" name="Delete"
                    src="../trash.svg" width=25px height=25px>
                    <a>
                    </td>
               

                </tr>
                <?php } ?>
            </tbody>
        </table>
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
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "pagingType": "full_numbers"
            });
        });
    </script>
</body>

</html>