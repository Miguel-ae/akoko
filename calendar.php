<?php
session_start();
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
              <li><a class="" href="timer.php">Timer</a></li>
              <li><a class="text-secondary" href="calendar.php">Calendar</a></li>
              <li><a class="" href="task.php">Tasks</a></li>
              <li><a class="" href="">Dashboard</a></li>
            </ul>
           <ul class="nav navbar-right align-items-center">
              <li><a href="profile.php"><?php echo $_SESSION['user']; ?></a></li>
              <li><a class="aux-text" href="logout.php">Log out</a></li>
           </ul>          
        </div>
      </nav>
    </section>
    <!-- NAVBAR END-->




    <!-- CALENDAR -->

   
        <div class="container">
          <div class="row">
            <div class="col"></div>

            <div class="col-10 pt-4 animated fadeInDown">
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
                        cleanForm();
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
                      


                      $("#modalEvent").modal();
                    },
                    editable:true,
                    eventDrop:function(calEvent){
                       $('#txtID').val(calEvent.id);
                       $('#txtTitle').val(calEvent.title);
                       $('#txtColor').val(calEvent.color);
                       $('#txtDescription').val(calEvent.description);

                       var dateTime = calEvent.start.format().split("T");
                      $('#txtDate').val(dateTime[0]);
                      $('#txtTime').val(dateTime[1]);
                      collectDataGUI();
                      sendData('edit',form,true);
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
              
              <input type="hidden" id="txtID" name="txtID">
              <input type="hidden" id="txtDate" name="txtDate"><br/>
              
              <div class="form-row">
                  <div class="form-group col-md-8">
                    <label>Title:</label>
                    <input type="text" id="txtTitle" class="form-control" placeholder="Title of Event">
                  </div>

                  <div class="form-group col-md-4">
                    <label>Time Event:</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" id="txtTime" value="10:30" class="form-control">
                    </div>
          
                  </div>
              </div>

              <div class="form-group">
                <label>Description:</label>
                <textarea id="txtDescription" rows="3" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label>Color:</label>
                
                <input type="color" value="#ff0000" id="txtColor" class="form-control color-picker" style="height: 36px;">
          <!--   <input type="color" value="#ff0000" id="txtColor" class="form-control" style="height: 36px;"> -->
                
              </div>

              <input type="hidden" value="<?=$_SESSION['id_user']?>" id="id_user">

            </div>
            <div class="modal-footer">
              <button type="button" id="btnAdd" class="btn btn-success">Add</button>
              <button type="button" id="btnEdit" class="btn btn-info">Edit</button>
              <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
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

      $("#btnDelete").click(function(){
         collectDataGUI();
         sendData('delete',form);
      });

      $("#btnEdit").click(function(){
         collectDataGUI();
         sendData('editForm',form);
      });




      function collectDataGUI(){
        form.append("id_user", $("#id_user").val());
        form.append("id", $("#txtID").val());
        form.append("title", $("#txtTitle").val());
        form.append("description", $("#txtDescription").val());
        form.append("color", pickr.getColor().toHEXA().toString());
        form.append("textColor", "#FFFFFF");
        form.append("start", $("#txtDate").val() + " " + $("#txtTime").val());
        form.append("end", $("#txtDate").val() + " " + $("#txtTime").val());

      }

      function sendData(action,objEvent,modal){
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
            if (!modal) {
               $("#modalEvent").modal('toggle');
            }
            
          });
      }

      $('.clockpicker').clockpicker();
      function cleanForm(){
        $('#txtID').val('');
        $('#txtTitle').val('');
        $('#txtColor').val('');
        $('#txtDescription').val('');
      }


      // COLOR PICKR
    const pickr = Pickr.create({
    el: '.color-picker',
    theme: 'nano',

    swatches: [
        'rgba(244, 67, 54, 1)',
        'rgba(233, 30, 99, 0.95)',
        'rgba(156, 39, 176, 0.9)',
        'rgba(103, 58, 183, 0.85)',
        'rgba(63, 81, 181, 0.8)',
        'rgba(33, 150, 243, 0.75)',
        'rgba(3, 169, 244, 0.7)',
        'rgba(0, 188, 212, 0.7)',
        'rgba(0, 150, 136, 0.75)',
        'rgba(76, 175, 80, 0.8)',
        'rgba(139, 195, 74, 0.85)',
        'rgba(205, 220, 57, 0.9)',
        'rgba(255, 235, 59, 0.95)',
        'rgba(255, 193, 7, 1)'
    ],

    components: {

        // Main components
        preview: true,
        opacity: false,
        hue: true,

        // Input / output Options
        interaction: {
            hex: true,            
            input: true,
            clear: true,
            save: true
        }
    }
});




      </script>

      


</body>
</html>
