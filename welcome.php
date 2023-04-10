<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db.php';
	$username=$_SESSION['username'];
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$City=$_POST['city'];
	$Phone=$_POST['phone'];
	$product=$_POST['product'];
	$quantity=$_POST['quantity'];
	$delivery=$_POST['delivery'];
	$notes=$_POST['notes'];
    // $exists=false;

        // $exists = false; 
            $sql1 = "INSERT INTO `userinfo` ( `name`, `email`,`city`, `phone`) VALUES ('$Name','$Email','$City', '$Phone')";
            $sql2 = "INSERT INTO `productinfo` ( `product`, `quantity`,`delivery_date`, `note`,`name`) VALUES ('$product','$quantity','$delivery', '$notes','$Name')";
			$result1 = mysqli_query($conn, $sql1);
			$result2 = mysqli_query($conn, $sql2);
			if ($result1 && $result2){
                echo 'database inserted successfully';
            }
        
            else{
                 echo 'try again';
                }
    }

	?>
<!doctype html>
<html lang="en">
  <head>
  <?php require '_nav.php' ?>  
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" type="text/css" href="sql.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome - <?php $_SESSION['username']?></title>
  </head>
 
  <body style="background-color: rgb(237, 237, 121);color: rgb(27, 126, 126);background-image: url('http://i.stack.imgur.com/kx8MT.gif');
background-size: cover;
height: 100vh;
"
      >
   
    
	  <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>

      <p>Hello <?php echo $_SESSION['username']?>. For User Information and Product Requirements Please fill this form.</p>

      <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link.</a></p>
	  <p class="mb-0"> </p>
    </div>
  </div>
  <form action=welcome.php method='POST'>
<div class='row'>
	<div class="column">
		
		<h2>User Information</h2>
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		<br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<br>

        <label for="city">City:</label>
		<input type="city" id="city" name="city" required>
		<br>

		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone" required>
		<br>
		</div>

	<div class="column">

		<h2>Product Requirements</h2>
		<label for="product">Product:</label>
		<input type="text" id="product" name="product" required>
		<br>

		<label for="quantity">Quantity:</label>
		<input type="number" id="quantity" name="quantity" required>
		<br>

		<label for="delivery">Delivery Date:</label>
		<input type="date" id="delivery" name="delivery" required>
		<br>

		<label for="notes">Notes:</label>
		<textarea id="notes" name="notes"></textarea>
		<br>

		<input type="submit" value="Submit">
	
	</div>
	</div>
	</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>