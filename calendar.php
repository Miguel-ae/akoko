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

   
        <div class="container">
          <div class="row">
            <div class="col"></div>

            <div class="col-9 pt-4">
                <div id="CalendarWeb"></div>
            </div>

            <div class="col"></div>
          </div>
        </div>

      

          <script>
            $(document).ready(function(){
                $('#CalendarWeb').fullCalendar({
                    header:{
                        left:'today,prev,next',
                        center:'title',
                        right:'month, basicWeek,basicDay, agendaWeek,agendaDay'
                    },
                    dayClick:function(date,jsEvent,view){
                        alert("Valor seleccionado" + date.format());
                        alert("Vista actual:" + view.name);
                        $(this).css('background-color', 'red');
                        $("#exampleModal").modal();
                    },
                    events:[
                        {
                          title:'event1',
                          start:'2020-05-01'
                        },
                        {
                          title:'event2',
                          start:'2020-05-07',
                          end:'2020-05-09',
                        },
                        {
                          title:'event3',
                          start:'2020-05-11T12:30:00',
                          allDay:false
                        }
                    ]

                });
            });

          </script>

   

    <!-- CALENDAR END-->



      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success">Add</button>
              <button type="button" class="btn btn-info">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Exit</button>
            </div>
          </div>
        </div>
      </div>

</body>
</html>
