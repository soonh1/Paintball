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