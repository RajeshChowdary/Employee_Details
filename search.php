<!DOCTYPE HTML>
<html>
<head>
    <title>reading</title>
     <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    </style>
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Searching Records:</h1> 
        </div>

       <div class="row">
       <form name="search" action="search.php">
            <div class="col-md-4">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Type Employee name" name="search" id ="search-id" required>
              <div class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div><!-- /input-group -->
          </div>
           
       </form>
          
          <div class="col-md-8">
            <div class='right-button-margin'>
                
                    <a href='create.php' class='btn btn-primary pull-right'>
                        <span class='glyphicon glyphicon-plus'></span> Create Record
                    </a>
                    <br>
                
                </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
     
    <!-- dynamic content will be here -->

    <?php
// include database connection
include 'database.php';

//$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
//if($action=='deleted'){
   // echo "<div class='alert alert-success'>Record was deleted.</div>";
//}

 $id=isset($_GET['search']) ? $_GET['search'] : die('ERROR: Record ID not found.');
 
    // delete query

 //echo $id;
    //$query = "SELECT id, name, email, phno, role FROM emp WHERE name like = '%".$id."%'";

    $query = "SELECT id, name, email, phno, role FROM emp WHERE name LIKE '%".$id."%'";

     // $query = "SELECT id, name, email, phno, role FROM emp WHERE name = '$id'";
    //echo $query;
    $stmt = $con->prepare($query);
    $stmt->execute();
   // $stmt->bindParam(1, $id);
// this is how to get number of rows returned
$num = $stmt->rowCount();

echo "<br>";
echo $num." Records found.";
 

 
//check if more than 0 record found
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
     
        //creating our table heading
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone Number</th>";
            echo "<th>Role</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
       
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$phno}</td>";
                echo "<td>{$role}</td>";
                
                echo "<td>";
                   
                     
                    // we will use this links on next part of this post
                    echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Update</a>";
 
                    // we will use this links on next part of this post
                    echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                echo "</td>";
            echo "</tr>";
        }
     
    // end table
    echo "</table>";
     
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
  
<!-- java script -->
<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>

<!-- when user click delete button -->
<script type='text/javascript'>
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script>

 
</body>
</html>