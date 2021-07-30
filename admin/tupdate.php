
<?php
    include '../db_connection.php';
        $teacher_id = $_POST['teacher_id'];
        $eteacher_name=$_POST['teacher_name'];

        $sql1="SELECT * FROM teacher where teacher_id='$teacher_id'";
        $result1=mysqli_query($conn,$sql1);
        $row_user5=mysqli_fetch_array($result1);
        $teacher_image=$row_user5['teacher_image'];

        $eteacher_image=$_FILES['teacher_image']['name'];
        $etemp_name=$_FILES['teacher_image']['tmp_name'];
        $epassword = $_POST['password'];
        $eemail=$_POST['email'];
        $ephone=$_POST['phone'];

      
        $ecourses_teaching= implode(',',$_POST['courses_teaching']);
     

        if(empty($eteacher_image)){
            $eteacher_image=$teacher_image;
        }
       
        $update="UPDATE teacher SET teacher_name='{$eteacher_name}',teacher_image='$eteacher_image',password='{$epassword}', email='{$eemail}',phone='{$ephone}',courses_teaching='$ecourses_teaching' WHERE teacher_id={$teacher_id}";
        $run_update=mysqli_query($conn,$update)  or die("Error");

        
        
        if($run_update){
            echo "Data has been updated successfully";
            move_uploaded_file($etemp_name,"../teacher_images/$eteacher_image");
            header('Location:view_teacher.php');
        }
        else{
            echo "Failed, Try Again !!!";
        }
    
    ?>