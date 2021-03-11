 <?php include('crud-database.php');


$id = $_GET['update'];


$where = array(
    'stu_id' => $id
);



$obj = new crud_database;
$obj->select('student_info', '*' , null,$where, null,null  );
$array = $obj->getdata();
//echo '<pre>';
//print_r($array);
//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>OOP CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-heading text-center ">
                        <h1 class="display-4 bg-warning p-4 font-weight-bold">Update Record </h1>
                    </div>

                </div>


                <div class="col-md-6 offset-md-3">
                    <div class="myform">
                        <form action="update-process.php" method="post">
                           <?php foreach($array as list('stu_id'=>$sid , 'name'=>$name , 'email'=>$email , 'age'=>$age)){ ?>
                            <div class="form-group">
                                
                                <input type="text" value="<?php echo $id ?>" class="form-control" name="uid">
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" value="<?php echo $name ?>" class="form-control" name="uname">
                            </div>
                            
                             <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" value="<?php echo $email ?>" class="form-control" name="uemail">
                            </div>
                            
                             <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" value="<?php echo $age ?>" class="form-control" name="uage">
                            </div>
                            <?php } ?>
                            
                            
                            <button class="btn btn-primary" name="usubmit"> Update</button>
                            
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </section>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
