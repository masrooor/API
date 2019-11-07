<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $id= $_POST['id'];

 
 require_once('init.php');

 $sql = "DELETE FROM `shops` WHERE `id`= '$id'";
 
 
 if(mysqli_query($con,$sql)){
 echo 'Deleted';
 }
 else{
 
 echo 'Something went wrong! You can not Delete.';
 }
 
 
 mysqli_close($con);
 

}