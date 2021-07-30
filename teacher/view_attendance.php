<?php 
//teacher
session_start();
$teacher_id=$_SESSION['teacher_id'];
include 'teacher_sidebar.php';
include '../db_connection.php';

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
    <link rel="stylesheet" href="teacher_dashboard.css">
    <link rel="stylesheet" href="view_attendance.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">View Attendance</span>
      </div>
     
      <div class="profile-details">
      <img src="../teacher_images/<?php echo $_SESSION['teacher_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['teacher_name']?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <br><br>
    <div class="container">
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Attendance Status</th>
                    <th>Attendance Date</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db_connection.php';
                $select="SELECT * FROM teacher_attendance where teacher_id='$teacher_id' ";
                $run=mysqli_query($conn,$select);
                while($row_user=mysqli_fetch_array($run)){
                    $id=$row_user['id'];
                    $teacher_id = $row_user['teacher_id'];
                    $teacher_name=$row_user['teacher_name'];
                    $attendance_status=$row_user['attendance_status'];
                    $attendance_date=$row_user['attendance_date'];            
                ?>

                <tr>
                    <td>
                        <?php echo $id?>
                    </td>
                    <td>
                        <?php echo $teacher_id?>
                    </td>
                    <td>
                        <?php echo $teacher_name?>
                    </td>
                    <td>
                    
                    <?php if($attendance_status=="Present")
                    {   echo "<span style='background-color:#c8ffc8;color:#349354;padding:0px 5px;border-radius:6px;'>$attendance_status</span>";
                    }
                    else echo "<span style='background-color:#ffcbcb;color:red;padding:0px 5px;border-radius:6px;'>$attendance_status</span>";
                    ?>
                    
                    
                    </td>
                    <td>
                        <?php echo $attendance_date?>
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