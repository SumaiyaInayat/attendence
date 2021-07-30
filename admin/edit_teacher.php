<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_teacher.css">

</head>

<body>
    <div class="container">
        <div class="title">
            Edit Teacher
        </div>
        
<?php
  
    include '../db_connection.php';
        $teacher_id=$_GET['teacher_id'];
        $sql="SELECT * FROM teacher where teacher_id='$teacher_id'";
      
        $result=mysqli_query($conn,$sql);
        $row_user=mysqli_fetch_array($result);

        $teacher_name=$row_user['teacher_name'];

        $teacher_image=$row_user['teacher_image'];
        $password = $row_user['password'];
        $email=$row_user['email'];
        $phone=$row_user['phone'];

        $courses_teaching1= $row_user['courses_teaching'];
        $courses_teaching= explode(',',$courses_teaching1);

       
    
?>

        <form class="form" method="post" action="tupdate.php" autocomplete="off" enctype="multipart/form-data">

            <div class="inputfield">
                <label for="">Teacher Name</label>
                <input type="hidden" name="teacher_id" class="input" value="<?php echo $teacher_id?>" required />
                <input type="text" name="teacher_name" class="input" value="<?php echo $teacher_name?>" required />
            </div>

            <div class="inputfield">
                <label for="">Teacher Image</label>
                <input type="file" name="teacher_image" class="input" />
            </div>


            <div class="inputfield">
                <label for="">Password</label>
                <input type="password" name="password" class="input" value="<?php echo $password?>" required />
            </div>


            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" value="<?php echo $email?>" required />
            </div>


            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" value="<?php echo $phone?>" required />
            </div>

            <div class="container1">
                <div class="title1">
                    Select Courses
                </div>
                <?php 
                // $sql1="SELECT * FROM courses_enrolled";
                // $courses_enrolled= explode(',',$courses_enrolled);
                // print_r($courses_enrolled);
                // $result1=mysqli_query($conn,$sql1); 
                // if($result1){
                //     while($row1=mysqli_fetch_assoc($result1)){
                //     }
                // }              
                ?>
                <ul class="group">
                    <li>
                        <input type="checkbox" name="courses_teaching[]" 
                        value="Web Development"                            
                        id="Web Development" <?php if (in_array("Web Development",$courses_teaching) )echo 'checked'; ?> />
                        <label for="Web Development">Web Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Artifical Intelligence"
                        id="Artifical Intelligence" <?php if (in_array("Artifical Intelligence",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Artifical Intelligence">Artifical Intelligence</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Cloud Computing" id="Cloud Computing"<?php if (in_array("Cloud Computing",$courses_teaching) )echo 'checked'; ?> />
                        <label for="Cloud Computing">Cloud Computing</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Graphics Designing"
                        id="Graphics Designing" <?php if (in_array("Graphics Designing",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Graphics Designing">Graphics Designing</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Robotics" id="Robotics" <?php if (in_array("Robotics",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Robotics">Robotics</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Game Development"
                            id="Game Development" <?php if (in_array("Game Development",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Game Development">Game Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Crypto Currency" id="Crypto Currency" <?php if (in_array("Crypto Currency",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Crypto Currency">Crypto Currency</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Cyber Security" id="Cyber Security" <?php if (in_array("Cyber Security",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Cyber Security">Cyber Security</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Mobile App Development"
                            id="Mobile App Development" <?php if (in_array("Mobile App Development",$courses_teaching) )echo 'checked'; ?>/>
                        <label for="Mobile App Development">Mobile App Development</label>
                    </li>

                    <li>
                        <input type="checkbox" name="courses_teaching[]" value="Data Science" id="Data Science" <?php if (in_array("Data Science",$courses_teaching) )echo 'checked'; ?> />
                        <label for="Data Science">Data Science</label>
                    </li>

                </ul>
            </div>
            <input type="submit" name="teacher" value="save" id="save" class="btn" />
        </form>

        
</div>

</body>

</html>
