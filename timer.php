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
              <li><a class="" href="#">Tasks</a></li>
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


    <!-- TIMER -->
    <section class="animated fadeInDown">
      
      <div class="row p-5 panel">
        <div class="col-3">
           <div class="field-border row align-items-center">
             <i class="fas fa-calendar-alt"></i>
             <div class="datetime-calendar">Lunes, 03 de Abril de 2020</div> <!-- Aqui cambiara la fecha a la fecha de hoy DATETIME CURRENT -->
           </div>
        </div>

          <!-- Timer Panel -->
          <div class="col-9 pl-5">
             <form action="">
              <div class="field-border row align-items-center">
                      <!-- Title -->
                      <div class="col-7 p-3">
                        <input type="text" class="form-control timer-title" id="description" placeholder="¿En que estas trabajando?">
                      </div>

                      <!-- Categories -->
                      <div class="col-2 p-0">
                      <select id="categories" class="form-control">
                        <option disabled selected>Categories</option>
                        <option>Sports</option>
                        <option>Study</option>
                        <option>Languages</option>
                        <option>Office</option>
                      </select>
                      </div>

                      <!-- Timer -->
                      <div class="col-2 timer">
                        00:00:00
                      </div>
                      
                      <!-- Button Play -->
                      <div class="col-1">
                        <a class="" href=""><i class="fas fa-play-circle"></i></a>
                                <!--  El boton Play al dar click se cambiara mediante JQuery al de Stop
                                             <i class="fas fa-stop-circle"></i>     -->
                      </div>

                  </div>
              </form>  
            </div>
         </div>
     </section>


    <section class="animated fadeInUp">

          <div class="row px-5 justify-content-center aceituna" id="block">
              <div class="col-10 field-border-data px-5" id="element">
                <div class="row py-5">
                  <div class="col-5 py-2">Lorem ipsum dolor sit amet, consectetur</div>
                  <div class="col-1 px-1 py-2 btn">Delete</div>
                  <div class="col-1 px-1 py-2 btn">Edit</div>
                  <div class="col-2"></div>
                  <div class="col-2"></div>
                  <div class="col-1"></div>
                </div>
              </div>
          </div>

          <div class="row px-5 justify-content-center aceituna">
              <div class="col-10 field-border-data px-5">
                <div class="row py-5">
                  <div class="col-5 py-2">Lorem ipsum dolor sit amet, consectetur</div>
                  <div class="col-1 px-1 py-2 btn">Delete</div>
                  <div class="col-1 px-1 py-2 btn">Edit</div>
                  <div class="col-2"></div>
                  <div class="col-2"></div>
                  <div class="col-1"></div>
                </div>
              </div>
          </div>

          <div class="row px-5 justify-content-center aceituna">
              <div class="col-10 field-border-data px-5">
                <div class="row py-5">
                  <div class="col-5 py-2">Lorem ipsum dolor sit amet, consectetur</div>
                  <div class="col-1 px-1 py-2 btn">Delete</div>
                  <div class="col-1 px-1 py-2 btn">Edit</div>
                  <div class="col-2"></div>
                  <div class="col-2"></div>
                  <div class="col-1"></div>
                </div>
              </div>
          </div>

          



          <!-- Show More Content button -->
          <div class="row justify-content-center pt-4">
            <button class="btn btn-secondary p-2 px-4">Show More</button>
          </div>
   
    </section> 
    
    <!-- TIMER END-->

</body>

<!-- Scripts & final html -->
<?php include 'includes/script.php' ?>