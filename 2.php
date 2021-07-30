<?php include "db_connection.php";
$select="SELECT student_name FROM student";
$run=mysqli_query($conn,$select);
while($row_user=mysqli_fetch_array($run)){
    $student_name = $row_user['student_name'];
    $php_framework[] = $student_name;
}
print_r($php_framework);
?>



<?php include "../db_connection.php";
$select="SELECT student_name FROM student";
$run=mysqli_query($conn,$select);
while($row_user=mysqli_fetch_array($run)){
    $student_name = $row_user['student_name'];
    $php_framework[] = $student_name;
}
print_r($php_framework);
?>

var labels = <?php echo '["'.implode('","',$php_framework).'"]'?>

const labels = <?php echo '["'.implode('","',$php_framework).'"]' ;?>;