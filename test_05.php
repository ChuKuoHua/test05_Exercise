<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       <style>
       .container{
           padding-top:2em;
       }
       </style>
</head>
<body>
    <?php require_once 'combine.php'?>

    <?php 
        $con= new mysqli('localhost','root','','txt') or die (mysqli_error($con));
        $result = $con ->query("SELECT *FROM client") or die($con->error);
    ?>

    <?php
        if(isset($_SESSION['message'])):
    ?>

    <div class="alert alert-<?php echo $_SESSION['msg_type']?>" >

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>

    <?php endif ?>
    <div class="row justify-content-center text-light bg-dark" >
        <h1> PHP&SQL</h1>
    </div>
<div class ="container" >
    <div class="row justify-content-center" >
        <div class="col-md-3 shadow-sm p-3 mb-5 bg-white rounded">
            <form action="combine.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group w-75">
                    <label ><h5>Name</h5></label>
                    <input class="form-control" type="text" name="name" value ="<?php echo $name; ?>" placeholder ="Enter name">
                </div>
                <div class="form-group w-75">   
                    <label ><h5>Phone</h5></label>   
                    <input class="form-control" type="text" name="phone" value ="<?php echo $phone ?>" placeholder ="Enter phone">
                </div>
                <div class="form-group w-75 ">   
                    <label ><h5>E-mail</h5></label>
                    <input class="form-control" type="text" name="email" value ="<?php echo $email ?>" placeholder ="Enter email">
                </div>
                <div class="form-group"> 
                    <?php
                        if($update == true):
                    ?>  
                    <button class="btn btn-warning " type ="submit" name="update">Update</button>
                        <?php else:?>
                    <button class="btn btn-dark " type ="submit" name="save">Save</button>
                        <?php endif;?>
                </div>
            </form>
           
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
            <table class="table ">
                        
                <thead>
                <tr colspan="5">
                    <th class="text-center text-dark" colspan="5"><h3>Client</h3></th>
                </tr>
                    <tr>
                        <th class="text-info">Name</th>
                        <th class="text-info">Phone</th>
                        <th class="text-info">Email</th>
                        <th class="text-danger " colspan="2">Action</th>
                    </tr>
                </thead>

                <?php
                    while($row =$result->fetch_assoc()):                
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                    <a href="test_05.php?edit=<?php echo $row['id']; ?>" class=" btn btn-warning">Edit</a>
                    
                    <a href="combine.php?delete=<?php echo $row['id']; ?>" class=" btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                endwhile;                
                ?>
            </table>
        </div>
    </div>

    
                    
    
</div>
</body>
</html>