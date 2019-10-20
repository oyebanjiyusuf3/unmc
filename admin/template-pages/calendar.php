<!-- Javascript and CSS for this page -->
<script src="<?php echo ADMIN_URL;?>/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<link href="<?php echo ADMIN_URL;?>/assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" /> 

<script>

	$(document).ready(function() {
	
		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});

		/* initialize the calendar
		-----------------------------------------------------------------*/
		var date = new Date();
		var d    = date.getDate();
        m    = date.getMonth();
        y    = date.getFullYear();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
					{
					  title          : 'All Day Event',
					  start          : new Date(y, m, 2),
					  className: 'bg-primary',
					},
					{
					  title          : 'Long Event',
					  start          : new Date(y, m, d - 4),
					  end            : new Date(y, m, d - 2),
					  className: 'bg-info',
					},
					{
					  title          : 'Meeting John',
					  start          : new Date(y, m, d, 15, 20),
					  allDay         : false,
					  className: 'bg-primary',
					},
					{
					  title          : 'New Task',
					  start          : new Date(y, m, d, 12, 0),
					  end            : new Date(y, m, d, 16, 0),
					  allDay         : false,
					  className: 'bg-danger',
					},
					{
					  title          : 'Birthday Party',
					  start          : new Date(y, m, d + 2, 15, 0),
					  end            : new Date(y, m, d + 2, 20, 40),
					  allDay         : false,
					  className: 'bg-warning',
					},
					{
					  title          : 'Alice Birthday',
					  start          : new Date(y, m, d + 4, 15, 0),
					  end            : new Date(y, m, d + 4, 18, 30),
					  allDay         : false,
					  className: 'bg-info',
					},
					{
					  title          : 'Click for Google',
					  start          : new Date(y, m, 27),
					  end            : new Date(y, m, 28),
					  url            : 'http://google.com/',
					  className: 'bg-danger', 
					}
				
			],
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function() {
		
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			}
		});


	});

</script>
						
<style>	
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
			
	#calendar {
		width: 100%;
	}

	.fc-event {
    font-size: 1em;
    border-radius: 2px;
    border: none;
    padding: 5px;
	}
	
	.fc-day-grid-event .fc-content {
    color: #fff;
	}	
	
	.fc-button {
    background: #eaeaea;
    border: none;
    color: #666b6f;
	margin: 0 3px !important;
    padding: 5px 12px !important;    
    text-transform: capitalize;
	height: auto !important;
    box-shadow: none !important;
    border-radius: 3px !important;    
	}
	
	.fc-state-down, .fc-state-active, .fc-state-disabled {
    background-color: #009ffc !important;
    color: #ffffff !important;
    text-shadow: none !important;
	}
	
	.fc-toolbar h2 {
    font-size: 20px;
    font-weight: 600;
    line-height: 28px;
    text-transform: uppercase;
	}
	
	.fc th.fc-widget-header {
    background: #e6e6e6;
    font-size: 13px;
	text-transform: uppercase;
    line-height: 18px;
    padding: 10px 0px;
	}
	
	.fc-unthemed th, .fc-unthemed td, .fc-unthemed thead, .fc-unthemed tbody, .fc-unthemed .fc-divider, .fc-unthemed .fc-row, .fc-unthemed .fc-popover {
    border-color: #eff1f3;
	}
</style>



                        <div class="row">
							<div class="col-xl-12">
								<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Calendar</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Calendar</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
							<div class="col-xs-12 col-md-4 col-lg-4 col-xl-3">
								<div class="card-box tilebox-one noradius">
									<div id='external-events'>
									<h4>Draggable Events</h4>
									<p>Drag and drop your event in the calendar</p>
									<div class='fc-event bg-primary'>New meeting</div>
									<div class='fc-event bg-warning'>My Event 2</div>
									<div class='fc-event bg-danger'>My Event 3</div>
									<div class='fc-event bg-primary'>Meeting 2</div>
									<div class='fc-event bg-info'>Task number 2</div>
									<p>
										<input type='checkbox' id='drop-remove' />
										<label for='drop-remove'>remove after drop</label>
									</p>
									<div class="clearfix"></div>
									</div>
								</div>
							</div>	
		
                            <div class="col-xs-12 col-md-8 col-lg-8 col-xl-9">
                                <div class="card-box tilebox-one noradius">
                                    <div id="calendar"></div>
									<div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->

