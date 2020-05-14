<!-- Libraries & start html,head,meta,links,... -->
<?php include 'includes/link.php';?>

<body>


    <!-- NAVBAR -->
    <section class="h-100">
      <nav class="navbar container wallpaper-navbar">
        <div class="container">
           <ul class="nav align-items-center">
              <li><i class="far fa-clock"></i></li>
              <li><a class="" href="timer.php">Timer</a></li>
              <li><a class="text-secondary" href="calendar.php">Calendar</a></li>
              <li><a class="" href="task.php">Tasks</a></li>
              <li><a class="" href="#">Dashboard</a></li>
            </ul>
           <ul class="nav navbar-right align-items-center">
              <li><a href="#">Profile</a></li>
              <li><a class="aux-text" href="#">Log out</a></li>
           </ul>          
        </div>
      </nav>
    </section>
    <!-- NAVBAR END-->




    <!-- CALENDAR -->

   
        <div class="container-fluid animated fadeInDown">
          <div class="row">
            <div class="col"></div>

            <div class="col-9 pt-5">
                <div id="CalendarWeb"></div>
            </div>

            <div class="col"></div>
          </div>
        </div>

      

          <script>
            $(document).ready(function(){
                $('#CalendarWeb').fullCalendar();
            });

          </script>

   

    <!-- CALENDAR END-->



</body>
</html>
