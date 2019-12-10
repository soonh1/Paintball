<?php

  include('db_connection.php');
  include('add.php');
  

	//write query for all pizza 
	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

	//make query and get result
	$result = mysqli_query($conn, $sql);

	//fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//free result from memory
	mysqli_free_result($result);

	//close connection 
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
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
	<link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
        <!--Mappen som kommer frem fra top til bund-->
        <div id="mySidebar3" class="sidebar">
            <p>TEAMS</p>
            <a href="instruktor.php" class="closebtn" onclick="closeNav1()"
              >×</a
            >
            <div class="wideTeam">
			<div class="container">
					<div class="row" id="row1">
            <?php ?>

              <section class="container grey-text">
                <h4 class="center">Add a Pizza</h4>
                <form class="white" action="teams.php" method="POST">
                  <label>Your Email</label>
                  <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
                  <div class="red-text"><?php echo $errors['email']; ?></div>
                  <label>Team name</label>
                  <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
                  <div class="red-text"><?php echo $errors['title']; ?></div>
                  <label>Members (comma separated)</label>
                  <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
                  <div class="red-text"><?php echo $errors['ingredients']; ?></div>
                  <div class="center">
                    <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
                  </div>
                </form>
              </section>

            <?php  ?>
					</div>
				</div>
			</div>
            <div class="wideAlive">
				<div class="container">
					<div class="row">
						<?php foreach($pizzas as $pizza){ ?>
						
						<div class="col-5 s6 md6" style="margin: 20px;">
							<div class="card1 z-depth-0">
								<div class="card-content center">
									<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
									<div class="members"><a id="testy" href="detail.php?id=<?php echo $pizza['id'] ?>">More information</a></div>
                                </div>
							</div>	
						</div>
						
						<?php } ?>
					</div>
				</div>
            </div>
          </div>
  </body>
</html>
