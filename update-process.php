<?php

include('crud-database.php');

$obj = new crud_database();
//
//$obj->update('student_info' , ['name' => 'mustafa' ,'email' => 'jjjjjjjjj@gmail.com'] , 'stu_id = "2"');
//$array=  $obj->getdata();
//print_r($array);
////
$uid = array(

    'stu_id' => $_POST['uid']

) ;


 $uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$uage = $_POST['uage'];


$values = ['name'=>$uname ,  'email' => $uemail , 'age' => $uage];

if($obj->update('student_info' , $values ,$uid)){
     header('location:crud-index.php?Record_Updated_Successfully');
}else{
    echo error;
}


?>