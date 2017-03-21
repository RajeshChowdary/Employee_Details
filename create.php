<!DOCTYPE HTML>
<html>
<head>
    <title>employee</title>
     
    <!-- Bootstrap -->
  
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css" />
 
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Create employee record:</h1>
        </div>
        
     
    <!-- dynamic content will be here -->
   
     <!-- html form here where the product information will be entered -->
<form action="adding.php" method="post">
    <div class="form-group">
      <label for="id">Employee Id:</label>
      <input type="number" name ="id" class="form-control" id="id" required>
    </div>
    <div class="form-group">
      <label for="name">Employee Name:</label>
      <input type="text" name="name" class="form-control" id="name" required>
    </div>
    <div class="form-group">
      <label for="email">Employee Email:</label>
      <input type="email" name="email" class="form-control" id="email" required>
    </div>
    <div class="form-group">
      <label for="phno">Employee Phone Number:</label>
      <input type="number" name="phno" class="form-control" id="phno" required>
    </div>
     <div class="form-group">
      <label for="role">Employee Role:</label>
      <input type="text" name="role" class="form-control" id="role" required>
    </div>

    <div class="form-group"> 
    <div class="col-sm-offset-5 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

  
         
</form>    
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="bootstrap-3.3.6/dist/js/jquery-3.0.0.min.js"></script>
  
<!-- java script -->
<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
 
</body>
</html>