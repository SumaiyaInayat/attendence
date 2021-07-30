
<?php
    include '../db_connection.php';
        $admin_id = $_POST['admin_id'];
        $uadmin_name=$_POST['admin_name'];

        $sql1="SELECT * FROM admin where admin_id='$admin_id'";
        $result1=mysqli_query($conn,$sql1);
        $row_user1=mysqli_fetch_array($result1);
   
        $uemail=$_POST['email'];
        $uphone=$_POST['phone'];
        $uaddress=$_POST['address'];
  

        $update="UPDATE admin SET admin_name='{$uadmin_name}', email='{$uemail}',phone='{$uphone}',address='$uaddress' WHERE admin_id={$admin_id}";
        $run_update=mysqli_query($conn,$update)  or die("Error");

        
        
        if($run_update){
            echo "Data has been updated successfully";
         
            header('Location:admin_profile.php');
        }
        else{
            echo "Failed, Try Again !!!";
        }
    
    ?>