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
    <div class="container">
      <div class="row">
        <div class="col1">
          <div class="team" id="main1">
            <div class="titleBar">
              TEAM
            </div>
            <a href="teams.php"><div class="teamImg"></div>
            </a>
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
            MAP - INSTRUKTOR
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
	<script src="script/javascript.js"></script>
  </body>
</html>
