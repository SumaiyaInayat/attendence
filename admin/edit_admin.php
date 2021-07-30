<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_student.css">

</head>

<body>
    <div class="container">
        <div class="title">
            Edit Admin
        </div>
        
<?php
  
    include '../db_connection.php';
        $admin_id=$_GET['admin_id'];
        $sql="SELECT * FROM admin where admin_id='$admin_id'";
      
        $result=mysqli_query($conn,$sql);
        $row_user=mysqli_fetch_array($result);
        
        $admin_name=$row_user['admin_name'];
        $email=$row_user['email'];
        $phone=$row_user['phone'];
        $address=$row_user['address'];
      
?>

        <form class="form" method="post" action="aupdate.php" autocomplete="off" enctype="multipart/form-data">

            <div class="inputfield">
                <label for="">Admin Name</label>
                <input type="hidden" name="admin_id" class="input" value="<?php echo $admin_id?>" required />
                <input type="text" name="admin_name" class="input" value="<?php echo $admin_name?>" required />
            </div>

            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" value="<?php echo $email?>" required />
            </div>


            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" value="<?php echo $phone?>" required />
            </div>

            <div class="inputfield">
                <label for="">Address</label>
                <input type="text" name="address" class="input" value="<?php echo $address?>" required />
            </div>

          


            
            <input type="submit" name="admin" value="Save" id="save" class="btn" />
        </form>

        
</div>

</body>

</html>
