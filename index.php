<!DOCTYPE html>
<?php include 'db.php'; 

$page =(isset($_GET['page']) ? (int)$_GET['page']: 1);
$perPage = (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ?(int)$_GET['per-page']: 5 );
$start =($page > 1) ? ($page * $perPage) - $perPage: 0 ;

$sql = "select * from tasks limit ".$start.",".$perPage." ";
$total = $db-> query("select * from tasks") -> num_rows;
echo $pages = ceil($total / $perPage);




$rows = $db->query($sql);

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
       
           
                <h1 class="h1">Todo list</h1>
                <div class="row" style="margin-top: 70px;">
                <div class ="col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <button type="button" name="button" data-target="#exampleModal" data-toggle="modal" class="btn btn-success">Add task</button>
                <button type="button" name="button" class="btn btn-default float-right" onclick="print()">Print</button>
                <hr> <br>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action = "add.php">
<div class="form-group">
    <label> Task Name</label>
    <input type = "text"  name="task" required  class="form-control" >
</div>
    <input type ="submit" name="send" value="Add task" class="btn btn-success">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
            
            
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Task</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while ($row = $rows->fetch_assoc()): ?>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td class="col-md-10"><?php echo $row['name'] ?></td>
      <td><a href="update.php?id= <?php echo $row['id'];?>" class="btn btn-secondary">Edit</a></td>
      <td><a href="delete.php?id= <?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
    </tr>
      <?php endwhile; ?>
 
  </tbody>
</table>

  <ul class = "pagination">
    <?php for ($i =1; $i <= $pages; $i++): ?>
    <li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>

  <?php endfor; ?>
  </ul>

        </div>
        </div>

</body>

</html>