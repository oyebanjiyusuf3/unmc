<!-- Javascript and CSS for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Counter-Up-->
<script src="<?php echo ADMIN_URL;?>/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/counterup/jquery.counterup.min.js"></script>			

<script>
	// START CODE FOR BASIC DATA TABLE 
	$(document).ready(function() {
		// data-tables
		$('#example1').DataTable();
		
		// counter-up
		$('.counter').counterUp({
            delay: 10,
            time: 600
        });
	} );
	// END CODE FOR BASIC DATA TABLE 
</script>
		

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Dashboard</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

			<?php		
			if ($msg =='demo_mode')
				echo '<div class="alert alert-danger" role="alert">This action is disabled in DEMO MODE!</div>';	
			?>
	
            <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
							<div class="card-box noradius noborder bg-default">
                                    <i class="fa fa-file-text-o float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                                    <h1 class="m-b-20 text-white counter">1,587</h1>
                                    <span class="text-white">15 New Orders</span>
                            </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-warning">
                                    <i class="fa fa-bar-chart float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Visitors</h6>
                                    <h1 class="m-b-20 text-white counter">250</h1>
                                    <span class="text-white">Bounce rate: 25%</span>
                            </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-info">
                                    <i class="fa fa-user-o float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Users</h6>
                                    <h1 class="m-b-20 text-white counter">120</h1>
                                    <span class="text-white">25 New Users</span>
                            </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                                    <i class="fa fa-bell-o float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Alerts</h6>
                                    <h1 class="m-b-20 text-white counter">58</h1>
                                    <span class="text-white">5 New Alerts</span>
                            </div>
                    </div>
            </div>
            <!-- end row -->


			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-line-chart"></i> Items Sold Amount</h3>
								Items sold in latest 12 months.
							</div>
								
							<div class="card-body">
								<canvas id="lineChart"></canvas>
							</div>							
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-bar-chart-o"></i> Colour Analytics</h3>								
							</div>
								
							<div class="card-body">
								<canvas id="pieChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-bar-chart-o"></i> Colour Analytics 2</h3>
							</div>
								
							<div class="card-body">
								<canvas id="doughnutChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
            </div>
            <!-- end row -->
			
			
			<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-users"></i> Staff details</h3>
								Company staff and employers details
							</div>
								
							<div class="card-body">
								
								<table id="example1" class="table table-bordered table-responsive-xl table-hover display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Name</th>
											<th>Position</th>
											<th>Office</th>
											<th>Age</th>
											<th>Start date</th>
											<th>Salary</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Name</th>
											<th>Position</th>
											<th>Office</th>
											<th>Age</th>
											<th>Start date</th>
											<th>Salary</th>
										</tr>
									</tfoot>
									<tbody>
										<tr>
											<td>Tiger Nixon</td>
											<td>System Architect</td>
											<td>Edinburgh</td>
											<td>61</td>
											<td>2011/04/25</td>
											<td>$320,800</td>
										</tr>
										<tr>
											<td>Garrett Winters</td>
											<td>Accountant</td>
											<td>Tokyo</td>
											<td>63</td>
											<td>2011/07/25</td>
											<td>$170,750</td>
										</tr>
										<tr>
											<td>Ashton Cox</td>
											<td>Junior Technical Author</td>
											<td>San Francisco</td>
											<td>66</td>
											<td>2009/01/12</td>
											<td>$86,000</td>
										</tr>
										<tr>
											<td>Cedric Kelly</td>
											<td>Senior Javascript Developer</td>
											<td>Edinburgh</td>
											<td>22</td>
											<td>2012/03/29</td>
											<td>$433,060</td>
										</tr>
										<tr>
											<td>Airi Satou</td>
											<td>Accountant</td>
											<td>Tokyo</td>
											<td>33</td>
											<td>2008/11/28</td>
											<td>$162,700</td>
										</tr>
										<tr>
											<td>Brielle Williamson</td>
											<td>Integration Specialist</td>
											<td>New York</td>
											<td>61</td>
											<td>2012/12/02</td>
											<td>$372,000</td>
										</tr>
										<tr>
											<td>Herrod Chandler</td>
											<td>Sales Assistant</td>
											<td>San Francisco</td>
											<td>59</td>
											<td>2012/08/06</td>
											<td>$137,500</td>
										</tr>
										<tr>
											<td>Rhona Davidson</td>
											<td>Integration Specialist</td>
											<td>Tokyo</td>
											<td>55</td>
											<td>2010/10/14</td>
											<td>$327,900</td>
										</tr>
										<tr>
											<td>Colleen Hurst</td>
											<td>Javascript Developer</td>
											<td>San Francisco</td>
											<td>39</td>
											<td>2009/09/15</td>
											<td>$205,500</td>
										</tr>
										<tr>
											<td>Sonya Frost</td>
											<td>Software Engineer</td>
											<td>Edinburgh</td>
											<td>23</td>
											<td>2008/12/13</td>
											<td>$103,600</td>
										</tr>
										<tr>
											<td>Jena Gaines</td>
											<td>Office Manager</td>
											<td>London</td>
											<td>30</td>
											<td>2008/12/19</td>
											<td>$90,560</td>
										</tr>
										<tr>
											<td>Quinn Flynn</td>
											<td>Support Lead</td>
											<td>Edinburgh</td>
											<td>22</td>
											<td>2013/03/03</td>
											<td>$342,000</td>
										</tr>										
										<tr>
											<td>Fiona Green</td>
											<td>Chief Operating Officer (COO)</td>
											<td>San Francisco</td>
											<td>48</td>
											<td>2010/03/11</td>
											<td>$850,000</td>
										</tr>
										<tr>
											<td>Shou Itou</td>
											<td>Regional Marketing</td>
											<td>Tokyo</td>
											<td>20</td>
											<td>2011/08/14</td>
											<td>$163,000</td>
										</tr>
										<tr>
											<td>Jonas Alexander</td>
											<td>Developer</td>
											<td>San Francisco</td>
											<td>30</td>
											<td>2010/07/14</td>
											<td>$86,500</td>
										</tr>
										<tr>
											<td>Shad Decker</td>
											<td>Regional Director</td>
											<td>Edinburgh</td>
											<td>51</td>
											<td>2008/11/13</td>
											<td>$183,000</td>
										</tr>
										<tr>
											<td>Michael Bruce</td>
											<td>Javascript Developer</td>
											<td>Singapore</td>
											<td>29</td>
											<td>2011/06/27</td>
											<td>$183,000</td>
										</tr>
										<tr>
											<td>Donna Snider</td>
											<td>Customer Support</td>
											<td>New York</td>
											<td>27</td>
											<td>2011/01/25</td>
											<td>$112,000</td>
										</tr>
									</tbody>
								</table>
								
							</div>														
						</div><!-- end card-->					
                    </div>

					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-star-o"></i> Tasks progress</h3>
							</div>
								
							<div class="card-body">
								<p class="font-600 m-b-5">Task 1 <span class="text-primary pull-right"><b>95%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95"></div>
                                </div>
								
								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 2 <span class="text-primary pull-right"><b>88%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="88"></div>
                                </div>
								
								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 3 <span class="text-info pull-right"><b>75%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-info" role="progressbar" style="width: 78%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75"></div>
                                </div>

								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 4 <span class="text-info pull-right"><b>70%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70"></div>
                                </div>

								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 5 <span class="text-warning pull-right"><b>68%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="68"></div>
                                </div>

								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 6 <span class="text-warning pull-right"><b>65%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
                                </div>	

								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 7 <span class="text-danger pull-right"><b>55%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55"></div>
                                </div>	

								<div class="m-b-20"></div>
								
								<p class="font-600 m-b-5">Task 8 <span class="text-danger pull-right"><b>40%</b></span></p>
                                <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-xs bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                </div>									
							</div>
							<div class="card-footer small text-muted">Updated today at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
			
			
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-envelope-o"></i> Latest messages</h3>
							</div>
								
							<div class="card-body">
								
								<div class="widget-messages nicescroll" style="height: 400px;">
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar1.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">John Doe</p>
                                                        <p class="message-item-msg">Hello. I want to buy your product</p>
                                                        <p class="message-item-date">11:50 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Ashton Cox</p>
                                                        <p class="message-item-msg">Great job for this task</p>
                                                        <p class="message-item-date">14:25 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar3.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Colleen Hurst</p>
                                                        <p class="message-item-msg">I have a new project for you</p>
                                                        <p class="message-item-date">13:20 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar4.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Fiona Green</p>
                                                        <p class="message-item-msg">Nice to meet you</p>
                                                        <p class="message-item-date">15:45 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar5.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Donna Snider</p>
                                                        <p class="message-item-msg">I have a new project for you</p>
                                                        <p class="message-item-date">15:45 AM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar6.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Garrett Winters</p>
                                                        <p class="message-item-msg">I have a new project for you</p>
                                                        <p class="message-item-date">15:45 AM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar7.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Herrod Chandler</p>
                                                        <p class="message-item-msg">Hello! I'm available for this job</p>
                                                        <p class="message-item-date">15:45 AM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar8.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Jena Gaines</p>
                                                        <p class="message-item-msg">I have a new project for you</p>
                                                        <p class="message-item-date">15:45 AM</p>
                                                    </div>
                                                </a>
												<a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar9.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Airi Satou</p>
                                                        <p class="message-item-msg">I have a new project for you</p>
                                                        <p class="message-item-date">15:45 AM</p>
                                                    </div>
                                                </a>
												<a href="#">
                                                    <div class="message-item">
                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
                                                        <p class="message-item-user">Brielle Williamson</p>
                                                        <p class="message-item-msg">I have a new project for you</p>
                                                        <p class="message-item-date">15:45 AM</p>
                                                    </div>
                                                </a>
                                            </div>
								
							</div>
							<div class="card-footer small text-muted">Updated today at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
			</div>			


						
<script>
var ctx1 = document.getElementById("lineChart").getContext('2d');
var lineChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [{
                label: 'Dataset 1',
                backgroundColor: '#3EB9DC',
                data: [10, 14, 6, 7, 13, 9, 13, 16, 11, 8, 12, 9] 
            }, {
                label: 'Dataset 2',
                backgroundColor: '#EBEFF3',
                data: [12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]
            }]
			
    },
    options: {
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
});


var ctx2 = document.getElementById("pieChart").getContext('2d');
var pieChart = new Chart(ctx2, {
    type: 'pie',
    data: {
            datasets: [{
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow",
                "Green",
                "Blue"
            ]
        },
        options: {
            responsive: true
        }
 
});


var ctx3 = document.getElementById("doughnutChart").getContext('2d');
var doughnutChart = new Chart(ctx3, {
    type: 'doughnut',
    data: {
            datasets: [{
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow",
                "Green",
                "Blue"
            ]
        },
        options: {
            responsive: true
        }
 
});
</script>
						