<link href="<?php echo ADMIN_URL;?>/assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_URL;?>/assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>

<script>
$(function () {
    $("#range_slider_1").ionRangeSlider();
    
    $("#range_slider_2").ionRangeSlider({
        min: 10,
        max: 100,
        from: 45
    });
    
    $("#range_slider_3").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 100,
        from: 25,
        to: 70,
        prefix: "USD "
    });
   
    $("#range_slider_4").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500
    });
    
    $("#range_slider_5").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500,
        step: 250
    });
    
    $("#range_slider_6").ionRangeSlider({
        grid: true,
        from: 3,
        values: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
    });
    
    $("#range_slider_7").ionRangeSlider({
        grid: true,
        min: 1000,
        max: 1000000,
        from: 200000,
        step: 1000,
        prettify_enabled: true
    });
    
    $("#range_slider_8").ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550,
        disable: true
    });
    $("#range_slider_9").ionRangeSlider({
        grid: true,
        min: 16,
        max: 60,
        from: 25,
        prefix: "Age ",
        max_postfix: "+"
    });
    $("#range_slider_10").ionRangeSlider({
        type: "double",
        min: 10,
        max: 250,
        from: 100,
        to: 175,
        prefix: "Population: ",
        postfix: " million",
        decorate_both: true
    });
    $("#range_slider_11").ionRangeSlider({
        type: "single",
        grid: true,
        min: -90,
        max: 90,
        from: 0,
        postfix: "°"
    });
    $("#range_slider_12").ionRangeSlider({
        type: "double",
        min: 100,
        max: 200,
        from: 140,
        to: 175,
        hide_min_max: true,
        hide_from_to: true,
        grid: true
    });
});
</script>		

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Range Sliders</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Range Sliders</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Ion RangeSlider examples</h3>
								You can find examples and documentation about Ion RangeSlider: <a target="_blank" href="https://github.com/IonDen/ion.rangeSlider">Ion RangeSlider</a>
							</div>
								
							<div class="card-body">
																
								
								
								<form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="range_01" class="col-sm-2 col-xs-12 control-label"><b>Slider without paramenets</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_02" class="col-sm-2 col-xs-12 control-label"><b>Min, Max and Start value</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_03" class="col-sm-2 col-xs-12 control-label"><b>Prefix</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_04" class="col-sm-2 col-xs-12 control-label"><b>Range with negative values</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_4">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_05" class="col-sm-2 col-xs-12 control-label"><b>Steps</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_5">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_06" class="col-sm-2 col-xs-12 control-label"><b>Custom Values</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_6">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_07" class="col-sm-2 col-xs-12 control-label"><b>Prettify enabled</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_7">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_08" class="col-sm-2 col-xs-12 control-label"><b>Disabled (lock slider)</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_8">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_09" class="col-sm-2 col-xs-12 control-label"><b>Age Example</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_9">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_10" class="col-sm-2 col-xs-12 control-label"><b>Use decorate_both option</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_11" class="col-sm-2 col-xs-12 control-label"><b>Postfixes</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_11">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="range_12" class="col-sm-2 col-xs-12 control-label"><b>Hide labels</b></label>
                                            <div class="col-sm-10 col-xs-12">
                                                <input type="text" id="range_slider_12">
                                            </div>
                                        </div>
                                    </form>
								
								
							</div>														
						</div><!-- end card-->					
                    </div>

			</div>


			