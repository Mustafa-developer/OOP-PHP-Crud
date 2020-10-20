<?php 
include('crud-database.php');
$obj2 = new crud_database;

$sname = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$password = $_POST['password'];

$values = ['name'=>$sname , 'email'=>$email , 'age'=>$age , 'password'=>$password  ];


if($obj2->insert('student_info',$values) || $obj2->insert == true){
header('location:crud-index.php?record_submitted_successfully');
    
}else{
    header('location:crud-index.php?we_are_sorry_an_error_occured');
}

?> 