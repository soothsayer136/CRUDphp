<!DOCTYPE html>
<?php 
include 'db.php'; 


$id = (int)$_GET['id'];

$sql = "select * from tasks where id ='$id'";

$rows = $db->query($sql);
$row = $rows-> fetch_assoc();
if(isset($_POST['send'])) {

$task = htmlspecialchars($_POST['task']);
  
$sql = "update tasks set name = '$task' where id ='$id'";
$db->query($sql);

header('location: index.php');
}


?>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>
        CRUD APP
    </title>
    
</head>
<style type="text/css" media ="screen">
    h1{
        text-align: center;
    }
    </style>

<body>
    <div class="container">
       
           
                <h1 class="h1">Update list</h1>
                <div class="row" style="margin-top: 70px;">
                <div class ="col-md-10 col-md-offset-1">
            <table class="table">
               
                
                <hr> <br>
               
  
        <form method="post" >
<div class="form-group">
    <label> Task Name</label>
    <input type = "text" value="<?php echo $row['name']; ?>"name="task" required  class="form-control" >
</div>
    <input type ="submit" name="send" value="Add task" class="btn btn-success">
    <a href="index.php" class= "btn btn-warning">Back</a>

        </form>
            
            
  

        </div>
        </div>

</body>

</html>