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
	<link rel="stylesheet" href="css/style.css" type="text/css" />
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