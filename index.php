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
  </head>
  <style>
	.container {
	width: 100%;
	}
	.col {
	margin: 20px 0 20px 30px;
	height: 95vh;
	padding: 0;
	}
	.col1 {
	margin: 20px 0 20px 0;
	height: 95vh;
	width: 30%;
	}
	.team {
	height: 45vh;
	margin-bottom: 5vh;
	}
	.key {
	height: 45vh;
	}
	.titleBar {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 30px;
	font-weight: 900;
	color: white;
	text-align: center;
	background-color: rgb(63, 56, 56);
	height: 45px;
	}
	.teamImg {

		background-color: red;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	height: 40vh;
	cursor: pointer;
	}
	.keyImg {
		background-color: red;
	background-repeat: no-repeat;
	background-position: 50%;
	background-size: cover;
	height: 39vh;
	cursor: pointer;
	}
	#mapImg {
	background-color: red;
	background-repeat: no-repeat;
	background-position: 60%;
	background-size: cover;
	height: 89vh;
	cursor: pointer;
	}

	/*testing*/
	#mySidebar {
	height: 100%;
	width: 0;
	position: fixed;
	z-index: 1;
	right: 0;
	}

	#mySidebar1 {
	height: 0;
	width: 100%;
	position: fixed;
	z-index: 1;
	right: 0;
	}

	#mySidebar2 {
	height: 0;
	width: 100%;
	position: fixed;
	z-index: 1;
	bottom: 0;
	right: 0;
	}

	.sidebar {
	background-color: rgb(63, 56, 56);
	overflow-x: hidden;
	transition: 0.5s;
	}

	.sidebar a {
	padding: 8px 8px 8px 32px;
	text-decoration: none;
	font-size: 25px;
	color: #818181;
	display: block;
	transition: 0.3s;
	}
	.sidebar p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 30px;
	font-weight: 900;
	color: white;
	position: absolute;
	top: 0;
	text-align: center;
	width: 100%;
	margin: 20px;
	}

	.sidebar a:hover {
	color: #f1f1f1;
	}

	.sidebar .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
	}

	.openbtn {
	font-size: 20px;
	cursor: pointer;
	background-color: #111;
	color: white;
	padding: 10px 15px;
	border: none;
	}

	.openbtn:hover {
	background-color: #444;
	}

	#main {
	transition: transform 0.25s ease;
	}

	#main1 {
	transition: transform 0.25s ease;
	}

	#main2 {
	transition: transform 0.25s ease;
	}

	.wideMap {
	background-color: gray;
	margin: 80px 0 0px 0;
	height: 89vh;
	width: 70%;
	float: left;
	border: 20px solid white;
	}

	.wideMapEvent {
	background-color: #384d57;
	margin: 80px 0 0px 0;
	height: 89vh;
	float: left;
	width: 30%;
	border: 20px solid white;
	}

	.wideTeam {
	background-color: #384d57;
	margin: 80px 0 0px 0;
	height: 89vh;
	width: 30%;
	float: left;
	border: 20px solid white;
	}

	.wideAlive {
	background-color: #384d57;
	margin: 80px 0 0px 0;
	height: 89vh;
	float: left;
	width: 70%;
	border: 20px solid white;
	}

	.eventBox {
	background-color: rgb(63, 56, 56);
	width: 100%;
	height: 80px;
	border: 10px solid #384d57;
	}

	.eventIcon {
	float: left;
	color: white;
	width: 40px;
	height: 40px;
	margin: 10px 10px 10px 10px;
	text-align: center;
	}

	.eventText {
	float: left;
	color: white;
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
	width: 40%;
	margin: 15px 10px;
	}

	.eventTimer {
	float: right;
	color: white;
	font-size: 20px;
	font-weight: 700;
	width: 10%;
	margin: 15px 10px;
	text-align: center;
	}

	#weapon {
	background-image: url("../img/rifle-128.png");
	background-size: contain;
	background-repeat: no-repeat;
	}

	#zone {
	background-image: url("../img/self-distract-button-128.png");
	background-size: contain;
	background-repeat: no-repeat;
	}

	#zombies {
	background-image: url("../img/skull-74-512.png");
	background-size: contain;
	background-repeat: no-repeat;
	}

  </style>
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
            <p>TEAM</p>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()"
              >×</a
            >
            <div class="wideTeam">
			<div class="container">
					<div class="row" style="padding-right: 20px;">
						<?php foreach($pizzas as $pizza){ ?>
						
						<div class="col-6 s6 md6" style="margin: 20px;">
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
					<div class="row" style="padding-right: 20px;">
						<?php foreach($pizzas as $pizza){ ?>
						
						<div class="col-5 s6 md6" style="margin: 20px;">
							<div class="card z-depth-0">
								<div class="card-content center">
									<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
									<div style="text-align: center;"><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
								</div>
								<div>
									<a href="detail.php?id=<?php echo $pizza['id']?>"> More info</a>
								</div>
							</div>	
						</div>
						
						<?php } ?>

						<?php if(count($pizzas) >= 3): ?>
							<h1>Theres are 3 or more pizzas</h1>
						<?php else: ?>
							<h1>Theres less than 3 pizzas</h1>
						<?php endif; ?>
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
            <div class="wideMap" id="mapImg"></div>
            <div class="wideMapEvent">
            </div>
          </div>
      </div>
    </div>
  </body>
  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "100%";
      document.getElementById("main").style.transform = "scale(0.9)";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.transform = "scale(1)";
    }

    function openNav1() {
      document.getElementById("mySidebar1").style.height = "100%";
      document.getElementById("main1").style.transform = "scale(0.9)";
    }

    function closeNav1() {
      document.getElementById("mySidebar1").style.height = "0";
      document.getElementById("main1").style.transform = "scale(1)";
    }

    function openNav2() {
      document.getElementById("mySidebar2").style.height = "100%";
      document.getElementById("main2").style.transform = "scale(0.9)";
    }

    function closeNav2() {
      document.getElementById("mySidebar2").style.height = "0";
      document.getElementById("main2").style.transform = "scale(1)";
    }

    // Countdown timer til event on-click
    // document.getElementById("gameStart").addEventListener("click", function() {
    //   var timeleft = 60;

    //   var downloadTimer = setInterval(function function1() {
    //     document.getElementById("countdown").innerHTML = timeleft;

    //     timeleft -= 1;
    //     if (timeleft <= 0) {
    //       clearInterval(downloadTimer);
    //       document.getElementById("countdown").innerHTML = "0";
    //     }
    //   }, 1000);
    // });

    // Countdown timer til event
    function startTimer(duration, display) {
      var timer = duration,
        minutes,
        seconds;
      setInterval(function() {
        seconds = parseInt(timer % 60, 10);

        seconds = seconds < 0 ? "0" + seconds : seconds;

        display.textContent = seconds;

        if (--timer < 0) {
          timer = duration;
        }
      }, 1000);
    }

    window.onload = function() {
      var fiveMinutes = 60 * 5,
        display = document.querySelector("#time");
      startTimer(fiveMinutes, display);
    };

  </script>
</html>
