<?php 
	include('db_connection.php');
    
    if(isset($_POST['delete'])){
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
		$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
		if(mysqli_query($conn, $sql)){
			header('Location: teams.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}
	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		// make sql
		$sql = "SELECT * FROM pizzas WHERE id = $id";
		// get the query result
		$result = mysqli_query($conn, $sql);
		// fetch result in array format
		$pizza = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Odense Paintball - tablet</title>
		<link
		rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
		crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="css/style1.css" type="text/css" />
  	</head>
	<body>

		<div id="mySidebar3" class="sidebar">
            <p>TEAM</p>
            <a href="teams.php" class="closebtn" onclick="closeNav1()"
              >×</a
            >
            <div class="wideTeam">
				
			</div>
            <div class="wideAlive">
				<?php ?>

					<div class="container center" id="detailBox">
						<?php if($pizza): ?>
							<h4 class="detailTitle"><?php echo $pizza['title']; ?></h4>
							<h5 class="detailInfo" id="detail1">Members:</h5>
							<h4 class="detailInfo"><?php echo $pizza['ingredients']; ?></h4>
							<h5 class="detailInfo" id="detail1">Created by:</h5>
							<h4 class="detailInfo"><?php echo $pizza['email']; ?></h4>
							<h5 class="detailInfo" id="detail1">Date:</h5>
							<h4 class="detailInfo"><?php echo date($pizza['created_at']); ?></h4>
							
							
							<!-- DELETE FORM -->
							<form action="detail.php" method="POST">
								<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
								<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" id="btnDelete">
							</form>
							

						<?php else: ?>
							<h5>No such pizza exists.</h5>
						<?php endif ?>
					</div>

				<?php ?>
            </div>
		  </div>
	</body>
	

</html>