<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $p_name= $_POST['p_name'];
  $u_id= $_POST['u_id'];
 $p_price= $_POST['p_price'];
 $p_category= $_POST['p_category'];
 $s_id= $_POST['s_id'];
 
 require_once('init.php');


 $sql = "INSERT INTO products (p_name,p_price,u_id,p_category,s_id) VALUES('$p_name','$p_price','$u_id','$p_category','$s_id')";
 
 if(mysqli_query($con,$sql)){
     
 echo 'Successfully Register';
 }
 else{
 
 echo 'Something went wrong! You are not Registered';
 }

 
 mysqli_close($con);
 
}
