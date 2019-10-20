<!-- Javascript and CSS for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Charts</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Charts</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            


			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-table"></i> Bar Chart
							</div>
								
							<div class="card-body">
								<canvas id="barChart"></canvas>
							</div>							
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-table"></i> Combo Bar Line Chart
							</div>
								
							<div class="card-body">
								<canvas id="comboBarLineChart"></canvas>
							</div>							
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>

			</div>
			
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-table"></i> Pie Chart
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
								<i class="fa fa-table"></i> Doughnut Chart
							</div>
								
							<div class="card-body">
								<canvas id="doughnutChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-table"></i> Radar Chart
							</div>
								
							<div class="card-body">
								<canvas id="radarChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-table"></i> Polar Area Chart
							</div>
								
							<div class="card-body">
								<canvas id="polarAreaChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->					
                    </div>
					
            </div>
            <!-- end row -->
			
			
				
					
						
<script>
// barChart
var ctx1 = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: 'Amount received',
            data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
				'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'				
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
				'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});



// comboBarLineChart
var ctx2 = document.getElementById("comboBarLineChart").getContext('2d');
var comboBarLineChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
                type: 'line',
                label: 'Dataset 1',
                borderColor: '#484c4f',
                borderWidth: 3,
                fill: false,
                data: [12, 19, 3, 5, 2, 3, 13, 17, 11, 8, 11, 9],
            }, {
                type: 'bar',
                label: 'Dataset 2',
                backgroundColor: '#FF6B8A',
                data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
                borderColor: 'white',
                borderWidth: 0
            }, {
                type: 'bar',
                label: 'Dataset 3',
                backgroundColor: '#059BFF',
                data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
            }], 
            borderWidth: 1
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


		
		
// pieChart
var ctx3 = document.getElementById("pieChart").getContext('2d');
var pieChart = new Chart(ctx3, {
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



// doughnutChart
var ctx4 = document.getElementById("doughnutChart").getContext('2d');
var doughnutChart = new Chart(ctx4, {
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



// radarChart
var ctx5 = document.getElementById("radarChart").getContext('2d');
var doughnutChart = new Chart(ctx5, {
    type: 'radar',
    data: {
            labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Running"],
            datasets: [{
                label: "My First dataset",
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                pointBackgroundColor: 'red',
                data: [12, 19, 13, 11, 19, 17]
            }, {
                label: "My Second dataset",
                backgroundColor: 'rgba(250, 80, 112, 0.3)',
                borderColor: 'rgba(54, 162, 235, 1)',
                pointBackgroundColor: 'blue',
                data: [15, 12, 14, 15, 9, 11]
            },]
        },
        options: {
            responsive: true
        }
 
});



// polarAreaChart
var ctx6 = document.getElementById("polarAreaChart").getContext('2d');
var doughnutChart = new Chart(ctx6, {
    type: 'polarArea',
	data: {
		labels: ["Red","Green","Yellow","Grey","Blue"],
		datasets: [{
			label: "My First Dataset",
			data: [11,16,7,3,14],
			backgroundColor: ["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)"]
			}]
	}
 
});


</script>
						