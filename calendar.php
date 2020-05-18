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

                        $("#txtDate").val(date.format());
                        $("#modalEvent").modal();

                    },

                    events:'http://localhost/akoko_final/events.php',

                  
                    eventClick:function(calEvent,jsEvent,view){

                      // H2
                      $('#titleEvent').html(calEvent.title);
                      // Mostrar info del evetno en los inputs
                      $('#txtDescription').val(calEvent.description);
                      $('#txtID').val(calEvent.id);
                      $('#txtTitle').val(calEvent.title);
                      $('#txtColor').val(calEvent.color);

                      //Accede al formato con _i y lo separa
                      DateTime = calEvent.start._i.split(" ");
                      $('#txtDate').val(DateTime[0]);
                      $('#txtTime').val(DateTime[1]);





                      $("#modalEvent").modal();
                    }


                });
            });

          </script>

   

    <!-- CALENDAR END-->




      <!-- Modal (Add, Edit, Delete)-->
      <div class="modal fade" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titleEvent"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              Id: <input type="text" id="txtID" name="txtID">
              Date: <input type="text" id="txtDate" name="txtDate"><br/>
              Title: <input type="text" id="txtTitle"><br/>
              Time: <input type="text" id="txtTime" value="10:30"><br/>
              Description: <textarea id="txtDescription" rows="3"></textarea><br/>
              Color: <input type="color" value="#ff0000" id="txtColor"><br/>

            </div>
            <div class="modal-footer">
              <button type="button" id="btnAdd" class="btn btn-success">Add</button>
              <button type="button" class="btn btn-info">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
              <button type="button" class="btn btn-light" data-dismiss="modal">Exit</button>
            </div>
          </div>
        </div>
      </div>




      <script>

      var form = new FormData();
        
      $("#btnAdd").click(function(){
         collectDataGUI();
         sendData('add',form);
      });


      function collectDataGUI(){
        form.append("title", $("#txtTitle").val());
        form.append("description", $("#txtDescription").val());
        form.append("color", $("#txtColor").val());
        form.append("textColor", "#FFFFFF");
        form.append("start", $("#txtDate").val() + " " + $("#txtTime").val());
        form.append("end", $("#txtDate").val() + " " + $("#txtTime").val());

      }

      function sendData(action,objEvent){
          var settings = {
            "url": "events.php?action="+action,
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": objEvent
          };

          $.ajax(settings).done(function (response) {
            $('#CalendarWeb').fullCalendar('refetchEvents');
            $("#modalEvent").modal('toggle');
            console.log(response);
          });
      }





        



        // console.log(objEvent);
        //   $.ajax({
        //       type:'POST',
        //       url:'events.php?action='+action,
        //       data:objEvent,
        //       success:function(msg){
        //         if (msg) {
        //           $('#CalendarWeb').fullCalendar('refetchEvents');
        //           $("#modalEvent").modal('toggle');

        //         }
        //       },
        //       error:function(){
        //           alert('There is an ERROR ...');
        //       }
        //   });

      </script>


</body>
</html>
