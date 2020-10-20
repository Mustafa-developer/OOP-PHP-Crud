<?php 

include('crud-database.php');
error_reporting(0);
$obj = new crud_database;
$obj->select('student_info', '*' , null,null, null,null  );
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
                        <h1 class="display-4 bg-warning p-4 font-weight-bold">OOP PHP <b> Crud </b></h1>
                    </div>

                </div>


                <div class="col-md-6 offset-md-3">
                    <div class="myform">
                        <form action="insert-process.php" method="post">
                           
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            
                             <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            
                             <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" class="form-control" name="age">
                            </div>
                            
                             <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            
                            
                            <button class="btn btn-primary" name="submit"> Submit</button>
                            
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </section>
    
<!--Show data-->
   
    <section>
       
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="header-show text-center my-4">
                     <h2 class="display-4 bg-warning p-4 font-weight-bold">  Show Student DATA</h2>
                   </div>
                   
                   <div class="col-md-12">
                       <table class="table">
                           <thead>
                               <tr>
                                   <th>#ID</th>
                                   <th>Student Name</th>
                                   <th>Student Email</th>
                                   <th>Student Age</th>
                                   <th colspan="2" class="text-center">Action</th>
                                   
                                   
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                               foreach($array as list('stu_id'=>$id , 'name'=>$name , 'email'=>$email , 'age'=>$age , )){
                               ?>
                               
                               <tr>
                                   <td><?php echo $id ?></td>
                                   <td><?php echo $name ?></td>
                                   <td><?php echo $email ?></td>
                                   <td><?php echo $age ?></td>
                                   <td><a href="update.php?update=<?php echo $id ?>">Edit</a></td>
                                   <td><a href="delete.php?delete=<?php echo $id ?>">Delete</a></td>
                               </tr>
                               
                               <?php } ?>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
        
    </section>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
