<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
  $name= $_POST['name'];
 $email= $_POST['email'];
 $ph_no= $_POST['ph_no'];
 $password= $_POST['password'];

 //importing database connection script 
 require_once('init.php');
 
 //Creating sql query 
 $sql = "UPDATE
  users
  SET 
  name = '$name',
  ph_no= '$ph_no',
  password= '$password'
  
  WHERE email= '$email';";


 //Updating database table 
 if(mysqli_query($con,$sql)){
//  file_put_contents($path,base64_decode($user_image));
  echo 'success';
}
else

{
 echo 'Something Went Wrong! Could Not Update User Try Again';
 }
 
 
 //closing connection 
 mysqli_close($con);
 }
 else{

echo 'error';
}