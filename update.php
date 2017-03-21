<!DOCTYPE HTML>
<html>
<head>
    <title>Update records</title>
     
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css" />         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update Records</h1>
        </div>
     
		    <?php
		// get passed parameter value, in this case, the record ID
		// isset() is a PHP function used to verify if a value is there or not
		$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
		 
		//include database connection
		include 'database.php';
		 
		// read current record's data
		try {
		    // prepare select query
		    $query = "SELECT id, name, email, phno, role FROM emp WHERE id = ? LIMIT 0,1";
		    $stmt = $con->prepare( $query );
		     
		    // this is the first question mark
		    $stmt->bindParam(1, $id);
		     
		    // execute our query
		    $stmt->execute();
		     
		    // store retrieved row to a variable
		    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		     
		    // values to fill up our form
		    $name = $row['name'];
		    $email = $row['email'];
		    $phno = $row['phno'];
		    $role = $row['role'];
		}
		 
		// show error
		catch(PDOException $exception){
		    die('ERROR: ' . $exception->getMessage());
		}
		?>

	<?php
		// isset() is a PHP function used to verify if a value is there or not
		$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');
		 
		//database connection
		include 'database.php';
		 
		// if form was submitted!
		if($_POST){
		     
		    try{
		     
		        // update query
		        $query = "UPDATE emp 
		                    SET name=:name, email=:email, phno=:phno, role=:role 
		                    WHERE id = :id";
		 
		        // prepare query for excecution
		        $stmt = $con->prepare($query);
		 
		        // html special characters removes whitespaces and tags
		        $name=htmlspecialchars(strip_tags($_POST['name']));
		        $email=htmlspecialchars(strip_tags($_POST['email']));
		        $phno=htmlspecialchars(strip_tags($_POST['phno']));
		        $role=htmlspecialchars(strip_tags($_POST['role']));
		 
		        // bind the parameters
		        $stmt->bindParam(':name', $name);
		        $stmt->bindParam(':email', $email);
		        $stmt->bindParam(':phno', $phno);
		        $stmt->bindParam(':role', $role);
		        $stmt->bindParam(':id', $id);
		         
		        // Execute the query
		        if($stmt->execute()){
		            echo "<div class='alert alert-success'>Record was updated.</div>";
		        }else{
		            echo "<div class='alert alert-danger'>Unable to update record.</div>";
		        }
		         
		    }
		     
		    // show errors
		    catch(PDOException $exception){
		        die('ERROR: ' . $exception->getMessage());
		    }
		}
		?>

		<!-- update form -->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
		    <table class='table table-hover table-responsive table-bordered'>
		        <tr>
		            <td>Name</td>
		            <td><input type='text' name='name' value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" class='form-control' /></td>
		        </tr>

		        <tr>
		            <td>Email</td>
		            <td><input type='text' name='email' value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>" class='form-control' /></td>
		        </tr>

		        <tr>
		            <td>Phno</td>
		            <td><input type='number' name='phno' value="<?php echo htmlspecialchars($phno, ENT_QUOTES);  ?>" class='form-control' /></td>
		        </tr>

		        <tr>
		            <td>Role</td>
		            <td><input type='text' name='role' value="<?php echo htmlspecialchars($role, ENT_QUOTES);  ?>" class='form-control' /></td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>
		                <input type='submit' value='Save Changes' class='btn btn-primary' />
		                <a href='index.php' class='btn btn-danger'>Read Records</a>
		            </td>
		        </tr>
		    </table>
		</form>


         
    </div> 
     
<!-- jQuery -->

<script src="bootstrap-3.3.6/dist/js/jquery-3.0.0.min.js"></script>
  
<!-- java script -->
<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
</body>
</html>