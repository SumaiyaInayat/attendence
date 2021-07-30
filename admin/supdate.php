
<?php
    include '../db_connection.php';
        $student_id = $_POST['student_id'];
        $estudent_name=$_POST['student_name'];

        $sql1="SELECT * FROM student where student_id='$student_id'";
        $result1=mysqli_query($conn,$sql1);
        $row_user5=mysqli_fetch_array($result1);
        $student_image=$row_user5['student_image'];

        $estudent_image=$_FILES['student_image']['name'];
        $etemp_name=$_FILES['student_image']['tmp_name'];
        $epassword = $_POST['password'];
        $eemail=$_POST['email'];
        $ephone=$_POST['phone'];

      
        $ecourses_enrolled= implode(',',$_POST['courses_enrolled']);
     

        if(empty($estudent_image)){
            $estudent_image=$student_image;
        }
       
        $update="UPDATE student SET student_name='{$estudent_name}',student_image='$estudent_image',password='{$epassword}', email='{$eemail}',phone='{$ephone}',courses_enrolled='$ecourses_enrolled' WHERE student_id={$student_id}";
        $run_update=mysqli_query($conn,$update)  or die("Error");

        
        
        if($run_update){
            echo "Data has been updated successfully";
            move_uploaded_file($etemp_name,"../student_images/$estudent_image");
            header('Location:view_student.php');
        }
        else{
            echo "Failed, Try Again !!!";
        }
    
    ?>