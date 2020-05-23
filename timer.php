<?php
session_start();
?>

<?php 
  // Connect to database
  $db = new mysqli('localhost', 'root', '', 'akoko');


  $categoryQuery = "SELECT * FROM categories";

  $categories = $db->query($categoryQuery);


  $timerQuery = "SELECT * FROM timer WHERE id_user=".$_SESSION['id_user'];

  $timers = $db->query($timerQuery);




 ?>




<!-- Libraries & start html,head,meta,links,... -->
<?php include 'includes/link.php';?>

<body>

    <!-- NAVBAR -->
    <section class="h-100">
      <nav class="navbar container wallpaper-navbar">
        <div class="container">
           <ul class="nav align-items-center">
              <li><i class="far fa-clock"></i></li>
              <li><a class="text-secondary" href="timer.php">Timer</a></li>
              <li><a class="" href="calendar.php">Calendar</a></li>
              <li><a class="" href="task.php">Tasks</a></li>
              <li><a class="" href="#">Dashboard</a></li>
            </ul>
           <ul class="nav navbar-right align-items-center">
              <li><a href="profile.php"><?php echo $_SESSION['user']; ?></a></li>
              <li><a class="aux-text" href="logout.php">Log out</a></li>
           </ul>          
        </div>
      </nav>
    </section>
    <!-- NAVBAR END-->


    <!-- TIMER -->
    <section class="animated fadeInDown">
      
      <div class="row p-5 panel">
        <div class="col-3">
           <div class="field-border row align-items-center">
             <i class="fas fa-calendar-alt"></i>
             <div class="datetime-calendar"></div> <!-- Aqui cambiara la fecha a la fecha de hoy DATETIME CURRENT -->
           </div>
        </div>

          <!-- Timer Panel -->
          <div class="col-9 pl-5">
             <form method="POST" action="addtimer.php">
              <div class="field-border row align-items-center">
                      <!-- Title -->
                      <div class="col-7 p-3">
                        <input type="text" class="form-control timer-title" id="description" placeholder="What are you working on?" name="title">
                        
                      </div>

                      <!-- Categories -->
                      <div class="col-2 p-0">
                      <select name="category" id="categories" class="form-control">
                        <option disabled selected>Categories</option>
                      <?php while ($category=$categories->fetch_assoc()) { ?>
                             <option value="<?=$category['id']?>"><?=$category['title']?></option> 
                        <?php }?>
                      </select>
                      </div>

                      <!-- Timer -->
                      <div class="col-2 timer">
                        <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
                        <input type="text" name="count" id="count" class="d-none">
                      </div>

                      <input type="hidden" value="<?=$_SESSION['id_user']?>" name="id_user">
                      
                      <!-- Button Play -->
                      
                      <div class="col-1" id="btn-timer-script">
                        
                        <div id="btnTimer">
                        <i class="fas fa-play-circle"></i>
                                <!--  El boton Play al dar click se cambiara mediante JQuery al de Stop
                                             <i class="fas fa-stop-circle"></i>     -->

                        </div>
                      </div>

                  </div>
              </form>  
            </div>
         </div>
     </section>


    <section class="animated fadeInDown" style="min-height: 500px;">


      <?php while ($timer=$timers->fetch_assoc()) { ?>
          <div class="row px-5 justify-content-center aceituna" id="block">
              <div class="col-10 field-border-data px-5" id="element">
                <div class="row py-4 align-items-center">
                  <div value hidden><?=$timer['id']?></div>
                  <div class="col-5 font-weight-bold"><?=$timer['title']?></div>
                  <div class="col-2" id="categories"><?=$timer['id_category']?></div>
                  <a href="deletetimer.php?id=<?=$timer['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                  <div id="data-count" hidden><?=$timer['count']?></div>
                  <div class="col-3 text-right text-time" id="show-count"><span id="hours_data">00</span>:<span id="minutes_data">00</span>:<span id="seconds_data">00</span></div>
                </div>
              </div>
          </div>
      <?php }?>




          <!-- Show More Content button -->
          <div class="row justify-content-center pt-4">
            <button class="btn btn-secondary p-2 px-4">Show More</button>
          </div>
   
    </section> 
    
    <!-- TIMER END-->






    <script>
    //CURRENT DATE PRINCIPAL PANEL
    $(document).ready(function(){
        var month = new Array ("January","February","March","April","May","June","July","August","September","October","November","December");
        var dayWeeks = new Array("Sunday","Monday","Tuesday","Wendesday","Thursday","Friday","Saturday");
        var d = new Date();
        var date = dayWeeks[d.getDay()] + " " + d.getDate() + ", " + month[d.getMonth()] + ", " + d.getFullYear();
        $('.datetime-calendar').html(date);
            // Monday 03, May, 2020
    });

    $("#btnTimer").click(function(){
        var sec = 0;
        function pad ( val ) { return val > 9 ? val : "0" + val; }
        var refreshIntervalId = setInterval( function(){
            $("#seconds").html(pad(++sec%60));
            $("#minutes").html(pad(parseInt(sec/60%60,10)));
            $("#hours").html(pad(parseInt(sec/3600,10)));
            console.log(sec);
          }, 1000);

        $("#btn-timer-script").html("<div id=\"btnStop\"><button class=\"border-0 bg-transparent\" id=\"btnTimer\" type=\"submit\" name=\"submit\"><i class=\"fas fa-stop-circle\"></i></button></div>");

        $("#btnStop").click(function(){
            $("#count").val(sec);
            clearInterval(refreshIntervalId);      
        });
    });


    //Mostrar datos del contador de segundos a tiempo de (sec, mins y horas)
    $(document).ready(function(){
     var sec = $('#data-count').html();
     function pad ( val ) { return val > 9 ? val : "0" + val; }
        $("#seconds_data").html(pad(++sec%60));
        $("#minutes_data").html(pad(parseInt(sec/60%60,10)));
        $("#hours_data").html(pad(parseInt(sec/3600,10)));
    });

    

    //  $(document).ready(function(){
    //     var category = $('#categories').html();
    //     console.log(category);
    // });





    </script>

</body>


</html>
