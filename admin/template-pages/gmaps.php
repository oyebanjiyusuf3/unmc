<!-- Javascript and CSS for this page -->
<script type="text/javascript" src="//maps.google.com/maps/api/js?key=<?php echo $cfg_google_maps_api_key;?>"></script>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/gmapsjs/gmaps.js"></script>

<script type="text/javascript">
var map;
$(document).ready(function(){
	// MAP 1 Example
	map1 = new GMaps({
        div: '#map1',
        lat: -12.043333,
        lng: -77.028333
    });
	

	// MAP 2 Example	
	map2 = new GMaps({
        div: '#map2',
        lat: -12.043333,
        lng: -77.028333
    });  
	map2.addMarker({
		  lat: -12.043333,
		  lng: -77.028333,
		  title: 'Lima',
		  click: function(e) {
			alert('You clicked in this marker');
		  }
	});	
	map2.addMarker({
        lat: -12.042,
        lng: -77.038333,
        title: 'Marker with InfoWindow',
        infoWindow: {
          content: '<p>HTML Content</p>'
        }
    });
	
	// MAP 3 Eample
	map3 = new GMaps({
        div: '#map3',
        lat: -12.043333,
        lng: -77.028333,
		zoom: 12
    });
    map3.drawRoute({
        origin: [-12.044012922866312, -77.02470665341184],
        destination: [-12.090814532191756, -77.02271108990476],
        travelMode: 'driving',
        strokeColor: '#131540',
        strokeOpacity: 0.6,
        strokeWeight: 6
    });
	
	// MAP 4 Example
	map4 = new GMaps({
        div: '#map4',
        lat: -12.043333,
        lng: -77.028333, 
		zoom: 16
     });
     map4.drawOverlay({
        lat: map4.getCenter().lat(),
        lng: map4.getCenter().lng(),
        content: '<div class="overlay">Our Location<div class="overlay_arrow above"></div></div>',
        verticalAlign: 'top',
        horizontalAlign: 'center'
     });
});
</script>			

<style type="text/css">
.maparea {
	display: block;
	width: 100%;
    height: 300px;
    background: #58B;
}

.overlay{
  display:block;
  text-align:center;
  color:#fff;
  font-size:60px;
  line-height:80px;
  opacity:0.8;
  background:#4477aa;
  border:solid 3px #336699;
  border-radius:4px;
  box-shadow:2px 2px 10px #333;
  text-shadow:1px 1px 1px #666;
  padding:0 4px;
}

.overlay_arrow{
  left:50%;
  margin-left:-16px;
  width:0;
  height:0;
  position:absolute;
}
.overlay_arrow.above{
  bottom:-15px;
  border-left:16px solid transparent;
  border-right:16px solid transparent;
  border-top:16px solid #336699;
}
.overlay_arrow.below{
  top:-15px;
  border-left:16px solid transparent;
  border-right:16px solid transparent;
  border-bottom:16px solid #336699;
}

</style>
  
			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Google Maps</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Google Maps</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Documentation</h4>
				  <p>gmaps.js allows you to use the potential of Google Maps in a simple way. No more extensive documentation or large amount of code. You can find examples and documentation about GMaps.js here: <a target="_blank" href="http://hpneo.github.io/gmaps/">GMaps.js documentation</a>. Note that you need an <a target="_blank" href="https://developers.google.com/maps/">api key</a> from Google Maps</p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-map"></i> Simple Map
							</div>
								
							<div class="card-body">
								<div class="maparea" id="map1"></div>
							</div>							
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-map"></i> Markers
							</div>
								
							<div class="card-body">
								<div class="maparea" id="map2"></div>
							</div>							
						</div><!-- end card-->					
                    </div>

			</div>
			
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-map"></i> Routes
							</div>
								
							<div class="card-body">
								<div class="maparea" id="map3"></div>
							</div>							
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-map"></i> Overlays
							</div>
								
							<div class="card-body">
								<div class="maparea" id="map4"></div>
							</div>							
						</div><!-- end card-->					
                    </div>
					
            </div>
            <!-- end row -->
			