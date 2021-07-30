<?php
session_start();
include '../db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php
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
    $select2="SELECT * FROM teacher";
    $run2=mysqli_query($conn,$select2);
    while($row_user=mysqli_fetch_array($run2)){
        
        $teacher_id = $row_user['teacher_id'];
        $teacher_name = $row_user['teacher_name'];
        $date=date("Y-m-d");
        $select3="SELECT * FROM teacher_attendance where teacher_id='$teacher_id' and attendance_date='$date'";
        $run3=mysqli_query($conn,$select3);
        
        if($run3->num_rows==0){
            $sql="INSERT INTO `teacher_attendance` (`teacher_id`, `teacher_name`,`attendance_status`, `attendance_date`) VALUES ('$teacher_id','$teacher_name','Absent', CURRENT_DATE());";
            $result=mysqli_query($conn,$sql);
        
        }
    }         
?>
<?php
$a='';
 $sql="SELECT COUNT(student_id) from `student` ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $a.=$row_user['COUNT(student_id)'];
 }
 $b='';
 $sql="SELECT COUNT(teacher_id) from `teacher` ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $b.=$row_user['COUNT(teacher_id)'];
 }
 $c='';
 $sql="SELECT COUNT(course_id) from `courses` ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $c.=$row_user['COUNT(course_id)'];
 }
 $dataPoints = array( 
   array("y" => $a, "label" => "Students","color"=> "LightSeaGreen" ),
   array("y" => $b, "label" => "Teachers" ,"color"=> "RoyalBlue"),
   array("y" => $c, "label" => "Courses","color"=>"#ffa703" ),
   
 );
  
 ?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
  <link rel="stylesheet" href="admin_dashboard.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'admin_sidebar.php';?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Admin Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="Sufiyan Irfan.jpg" alt="">
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="big-box">
      <div class="box1">
        <div class="right-box1">
        <img class="icons" src="../social-media-regular-icons/globe.svg" width=40px height=40px>
        </div>
        <div class="left-box1">
            <h4>Admins</h4>
            <h1>
            <?php
            $sql="SELECT COUNT(admin_id) from `admin` ";
            $run=mysqli_query($conn,$sql);
            while($row_user=mysqli_fetch_array($run)){
              echo $row_user['COUNT(admin_id)'];
            }
            ?>
            </h1>
        </div>
      </div>
      <div class="box1">
        <div class="right-box1">
        <img class="icons" src="../social-media-regular-icons/globe.svg" width=40px height=40px>
        </div>
        <div class="left-box1">
      
        <h4>Students</h4>
        <h1><?php
            echo $a;
           
            ?></h1>
        </div>
      </div>
      <div class="box1">
        <div class="right-box1">
        <img class="icons" src="../social-media-regular-icons/globe.svg" width=40px height=40px>
        </div>
        <div class="left-box1">
        <h4>Teachers</h4>
        <h1><?php
            echo $b;
            ?></h1>
        </div>
      </div>
      <div class="box1">
        <div class="right-box1">
        <img class="icons" src="../social-media-regular-icons/globe.svg" width=40px height=40px>
        </div>
        <div class="left-box1">
        <h4>Courses</h4>
        <h1><?php
            echo $c;
            ?></h1>
        </div>
      </div>
    </div>

    <div class="second-box">
    <div class="column-box" id="columnContainer">
    </div>
    <div class="area-box" id="areaContainer">
    </div>
    <div class="pie-box" id="pieContainer">
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
var chart = new CanvasJS.Chart("columnContainer", {
	animationEnabled: true,
  subtitles: [{
		text: "Attendee",
    fontSize: 18
	}],

     axisX:{
        labelFontColor: "LightSeaGreen",
    },
  axisY:{
        gridThickness: 0,
        labelFontColor: "LightSeaGreen",
      },
	data: [{
		type: "column",
		yValueFormatString: "#",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
</script>

<script type="text/javascript">
window.onload = function () {
    var chart = new CanvasJS.Chart("areaContainer",
    {
	
    axisX:{
		valueFormatString: "DD-MMM" ,
				interval: 5,
				intervalType: "day",
				labelAngle: -50,
				labelFontColor: "LightSeaGreen",
        gridThickness: 0
    },
	axisY:{
        labelFontColor: "LightSeaGreen",
        gridThickness: 0
    },

    data: [
    {        
        type: "area",
		color:"RoyalBlue",
        dataPoints: [//array
        { x: new Date(2021, 07, 1), y: 4},
        { x: new Date(2021, 07, 4), y: 3},
        { x: new Date(2021, 07, 7), y: 5},
        { x: new Date(2021, 07, 10), y: 4},
        { x: new Date(2021, 07, 13), y: 8},
        { x: new Date(2021, 07, 16), y: 4},
        { x: new Date(2021, 07, 19), y: 6},
        { x: new Date(2021, 07, 22), y: 10},
        { x: new Date(2021, 07, 25), y: 9},
        { x: new Date(2021, 07, 28), y: 4},
        { x: new Date(2021, 07, 31), y: 7}

        ]
    }
    ]
});

    chart.render();
}
</script>

<script type="text/javascript">

    var chart1 = new CanvasJS.Chart("pieContainer",
    {
      legend: {
        horizontalAlign: "right",
        verticalAlign: "center"
      },
      data: [
      {
       color: "LightSeaGreen",
       indexLabelPlacement: "outside",
       showInLegend: true,
       type: "doughnut",
       dataPoints: [
       {  y: 11, legendText: "Absent", color: "RoyalBlue" },
       {  y: 89, legendText: "Present", color: "#ffa703" }
       ]
     }
     ]
   });

    chart1.render();
  
  </script>
</body>

</html>