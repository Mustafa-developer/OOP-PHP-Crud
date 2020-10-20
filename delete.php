<?php 
require 'crud-database.php';
error_reporting(0);

$id = $_GET['delete'];

$where  = array(
    
    'stu_id' => $id

);


$obj = new crud_database;
$obj->select('student_info', '*' , null,$where, null,null  );
$array = $obj->getdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
   
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-heading text-center bg-warning p-4">
                        <h1 class="display-4  font-weight-bold">Delete Here</h1>
                        <p class="font-weight-bold">Please follow these steps </p>
                    </div>

                </div>


                <div class="col-md-8 offset-md-2 my-4 bg-secondary">
                   
                   <h2 class="font-weight-bold  text-center text-light py-5">Are you sure you want to Delete this</h2>
                   
                    <div class="myform text-center pb-5">
                        <form action="" method="post">
                           
                           <button class=" col-3 py-3 btn btn-warning text-light font-weight-bold" name="delete">Delete</button>
                           <a href="crud-index.php" class="col-3 py-3 btn btn-primary text-light font-weight-bold">Cancel</a>
                            
                          
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </section>
    
    
    <?php 
    
  
    
    print_r($where);
    
    if($obj->delete('student_info' , $where)){
        header('location:crud-index.php?Record_Deleted_Successfully');
    }else{
        echo "error";
    }
    
    ?>
    
</body>
</html>