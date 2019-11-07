<?php
 

 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values
	$userLat= $_POST['userLat'];
 	$userLong= $_POST['userLong'];
 	$userId= $_POST['user_id'];

// $userId=29;
require "init.php";
// echo $userId;


$userProducts = "SELECT * FROM usersProductsList WHERE u_id = '$userId'";
$up = mysqli_query($con,$userProducts);
$resultProdcut = array();
$shop_id = array();
 
while($row = mysqli_fetch_array($up)){
    $pName = $row['p_name'];
    $shop_id_qry = "SELECT * FROM products WHERE p_name = '$pName'" ;
    $sp = mysqli_query($con,$shop_id_qry);
    while($r = mysqli_fetch_array($sp)){
        
        $s_id = $r['s_id'];
    
    }
    
     array_push($shop_id, $s_id);
    
}

//  echo json_encode(array("result"=>$shop_id));

 

// $shops = array(); 

// foreach ($up as $product){ 
//   $shop_id = "SELECT * FROM products WHERE p_name = $product->p_name";
//   $sp = mysqli_query($con,$shop_id);
//   array_push($shops, $sp->s_id);
// } 



//  //Creating sql query
 $sql = "SELECT
    *,
    6371 * 2 * ASIN(
        SQRT(
            POWER(
                SIN(
                    ($userLat - ABS(`shop_lat`)) * PI() / 180 / 2),
                    2
                ) + COS($userLat * PI() / 180) * COS(ABS(`shop_lat`) * PI() / 180) * POWER(
                    SIN(
                        ($userLong-`shop_longt`) * PI() / 180 / 2),
                        2
                    )
                )) AS DISTANCE
            FROM
                shops
            
            ORDER BY
                DISTANCE DESC
            LIMIT 10; ";

 require "init.php";
 //executing query
 $r = mysqli_query($con,$sql);
 $result = array();
 
while($row = mysqli_fetch_array($r)){
    array_push($result,array(
        'DISTANCE'=>$row['DISTANCE'],
             'id'=>$row['id'],

     'shop_name'=>$row['shop_name'],
    ));
 

if($row['DISTANCE']<= 2)
 {
     
     foreach ($shop_id as $id){ 
         

       
        if($row['id'] == $id){
            $shop_name=$row['shop_name'];
//  	$doc_exp_date=$row['doc_exp_date'];

  $msg="You are Near to $shop_name,Please check your lists may be you selected some produtcs to buy." ;
        }
        
        
    } 
 	
    
    }
}

// echo json_encode(array('result'=>$msg));
echo $msg;

mysqli_close($con);

}

 