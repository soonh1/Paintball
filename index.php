<?php

	include('db_connection.php');

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
  <link rel="stylesheet" href="css/style1.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="forbedringer/fstyle.css" type="text/css">
    
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col1">
          <div class="team" id="main1">
            <div class="titleBar">
              TEAM
            </div>
            <div class="teamImg" onclick="openNav1()"></div>
          </div>
          <div class="key" id="main2">
            <div class="titleBar">
              KEY
            </div>
            <div class="keyImg" onclick="openNav2()"></div>
          </div>
        </div>
        <div class="col" id="main">
          <div class="titleBar">
            MAP
          </div>
          <div id="mapImg" onclick="openNav()"></div>
        </div>

        <!--Mappen som kommer frem fra højre til ventre-->
        <div id="mySidebar" class="sidebar">
          <p>MAP</p>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
            >×</a
          >
          <div class="wideMap" id="mapImg"></div>
          <div class="wideMapEvent">
            <div class="eventBox">
              <div class="eventIcon" id="weapon"></div>
              <div class="eventText">Armsdealer</div>
              <div class="eventTimer">10</div>
            </div>
            <div class="eventBox">
              <div class="eventIcon" id="zone"></div>
              <div class="eventText">Nextzone</div>
              <div class="eventTimer">60</div>
            </div>
            <div class="eventBox">
              <div class="eventIcon" id="zombies"></div>
              <div class="eventText">Zombies</div>
              <div class="eventTimer" id="time">60</div>
            </div>
          </div>
        </div>

        <!--Mappen som kommer frem fra top til bund-->
        <div id="mySidebar1" class="sidebar">
            <p>TEAMS</p>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()"
              >×</a
            >
            <div class="wideTeam">
			<div class="container">
					<div class="row" id="row1">
						<?php foreach($pizzas as $pizza){ ?>
						
						<div class="col-6 s6 md6" id="teamVenstre">
							<div class="card z-depth-0">
								<div class="card-content center">
									<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
								</div>
							</div>	
						</div>
						
						<?php } ?>
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
									<div class="members">Members : <?php echo htmlspecialchars($pizza['ingredients']); ?></div>
								</div>
							</div>	
						</div>
						
						<?php } ?>
					</div>
				</div>
            </div>
          </div>

           <!--Mappen som kommer frem fra bund til top-->
        	<div id="mySidebar2" class="sidebar">
				<p>KEY</p>
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav2()"
				>×</a
        >
        <div class="wideMapEvent" id="wideKeyWhite">
          <div class="wideMapEboxtext"><h4>The Right Swipe</h4></div>
          <div class="wideMapEbox1"><h4>The game is simple. Just swipe the following direction when the arrow is <i style="color: #37A2EB;">blue</i> and the opposite when it's <i style="color: #FF6484;">red</i>.  </h4></div>
          <div class="wideMapEboxtext"><h4>Score</h4></div>
          <div class="wideMapEbox2">
          <h4>You need atleast 150 points to unlock the crate.</h4>
            <div id="scoreBox" style="color: white;">0</div>
          </div>
        </div>
				<div class="wideMap" style="background-color: white;">
              <!-- SPILLET -->
              <div class="game-container" id="gamePlay" style="display: none;">
              <button id="restartGameButton"><i class="fas fa-sync-alt"></i></button>
              <div id="progress-bar-container">
                <div id="progress-bar"></div>
              </div>
              <div id="test"></div>
              <div>
                <span id="score" class="animated">0</span>
              </div>
              <!-- <i class="fas fa-arrow-circle-right arrow"></i> -->
            </div>
            <div class="wrapper"><input type="button" id="playButton" name="answer" value="Play" onclick="showDiv()" /></div>
              </div>
				
          	</div>
      </div>
	</div>
  <script src="script/javascript.js"></script>
  <script src="forbedringer/fgame.js"></script>
  </body>
</html>
