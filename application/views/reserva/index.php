<link rel="stylesheet" href="<?php echo base_url('resources/plugins/fullcalendar/main.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('resources/plugins/fullcalendar-daygrid/main.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('resources/plugins/fullcalendar-timegrid/main.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('resources/plugins/fullcalendar-bootstrap/main.min.css'); ?>" >
          <!-- Main content -->
<div class="row">
<div class="col-md-6">
  <div class="box-header">
               <h4><b>RESERVAS COLISEO</b></h4>
  </div>
</div>   
<div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('reserva/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a>
        <a href="<?php echo site_url('reserva/lista'); ?>" class="btn bg-warning btn-app"><fa class='fas fa-list'></fa> Ver Lista</a>
        <a href="#" class="btn btn-app" style="background: #A1887F;color: white"><fa class='fas fa-futbol'></fa> Futsal</a> 
        <a href="#" class="btn btn-app" style="background: #E67E22;color: white"><fa class='fas fa-basketball-ball'></fa> Basquet</a> 
        <a href="#" class="btn btn-app" style="background: #283593;color: white"><fa class='fas fa-volleyball-ball'></fa> Volley</a> 
         
    </div>
</div>
<input type="hidden" name="reservas" id="reservas" value='<?php echo json_encode($reserva);  ?>' >
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3" hidden>
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<!-- jQuery -->
<script src="<?php echo base_url('resources/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('resources/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url('resources/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- AdminLTE App -->

<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('resources/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/plugins/fullcalendar/main.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/plugins/fullcalendar-daygrid/main.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/plugins/fullcalendar-timegrid/main.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/plugins/fullcalendar-interaction/main.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/plugins/fullcalendar-bootstrap/main.min.js'); ?>"></script>
<!-- Page specific script -->
<script>
   
  
  /*var evento = new Object();
  for (var i = 1; i < n ; i++){

var reserva_fechaingreso = all_reservas[i]['reserva_fechaingreso'];
var reserva_horaingreso = all_reservas[i]['reserva_horaingreso'];
var reserva_fechasalida = all_reservas[i]['reserva_fechasalida'];
var reserva_horasalida = all_reservas[i]['reserva_horasalida'];
evento =   {  title : all_reservas[i]['reserva_tipo'], 
start : reserva_fechaingreso+" "+reserva_horaingreso,
end : reserva_fechasalida+" "+reserva_horasalida,
backgroundColor : '#f56954',
borderColor    : '#f56954',
} ;

      }*/
      //console.log(evento);

  $(function () {
  var all_reservas = JSON.parse(document.getElementById('reservas').value);
  var n = all_reservas.length; //tamaño del arreglo de la consulta
  var arreglo = new Array();
        for (var i = 0; i < n ; i++){ 
           
  var reserva_fechaingreso = all_reservas[i]['reserva_fechaingreso'];
  var reserva_horaingreso = all_reservas[i]['reserva_horaingreso'];
  var reserva_fechasalida = all_reservas[i]['reserva_fechasalida'];
  var reserva_horasalida = all_reservas[i]['reserva_horasalida'];
  if (all_reservas[i]['reserva_tipo']=='BASQUETBOL') {
    var colore='#E67E22';
  }
  if (all_reservas[i]['reserva_tipo']=='FUTSAL') {
    var colore='#A1887F';
  }
  if (all_reservas[i]['reserva_tipo']=='VOLEIBOL') {
    var colore='#283593';
  }
var evento =   {  
title : all_reservas[i]['cliente_nombre'],
start : reserva_fechaingreso+" "+reserva_horaingreso,
end : reserva_fechasalida+" "+reserva_horasalida,
backgroundColor : colore,
borderColor    : colore
} ; 
  arreglo.push(evento);

    }


console.log(arreglo);
  
      
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      //Random default events
      events    : arreglo,
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }    
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>