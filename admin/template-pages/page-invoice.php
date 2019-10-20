
<style>
.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>


<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Invoice</h1>
            <ol class="breadcrumb float-right">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item active">Invoice</li>
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
								<h3><i class="fa fa-table"></i> Invoice example</h3>
							</div>
								
							<div class="card-body">
								
								<div class="container">
									
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-title text-center mb-3">
												<h2>Invoice #123456</h2>
												<strong>Date:</strong> March 7, 2014												
											</div>
											<hr>
											<div class="row">
												<div class="col-md-6">
													<address>
													<h5>Billed To:</h5>
														John Smith<br>
														1234 Main<br>
														Apt. 4B<br>
														Springfield, ST 54321
													</address>
												</div>
												<div class="col-md-6 float-right text-right">
													<address>
													<h5>Shipped To:</h5><br>
														Jane Smith<br>
														1234 Main<br>
														Apt. 4B<br>
														Springfield, ST 54321
													</address>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<address>
														<h5>Payment Method:</h5>
														Visa ending **** 4242<br>
														jsmith@email.com
													</address>
												</div>
												<div class="col-md-6 float-right text-right">
													<address>
														<h5>Order Date:</h5>
														March 7, 2014<br><br>
													</address>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><strong>Order summary</strong></h3>
												</div>
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-condensed">
															<thead>
																<tr>
																	<td><strong>Item</strong></td>
																	<td class="text-center"><strong>Price</strong></td>
																	<td class="text-center"><strong>Quantity</strong></td>
																	<td class="text-right"><strong>Totals</strong></td>
																</tr>
															</thead>
															<tbody>
																<!-- foreach ($order->lineItems as $line) or some such thing here -->
																<tr>
																	<td>BS-200</td>
																	<td class="text-center">$10.99</td>
																	<td class="text-center">1</td>
																	<td class="text-right">$10.99</td>
																</tr>
																<tr>
																	<td>BS-400</td>
																	<td class="text-center">$20.00</td>
																	<td class="text-center">3</td>
																	<td class="text-right">$60.00</td>
																</tr>
																<tr>
																	<td>BS-1000</td>
																	<td class="text-center">$600.00</td>
																	<td class="text-center">1</td>
																	<td class="text-right">$600.00</td>
																</tr>
																<tr>
																	<td class="thick-line"></td>
																	<td class="thick-line"></td>
																	<td class="thick-line text-center"><strong>Subtotal</strong></td>
																	<td class="thick-line text-right">$670.99</td>
																</tr>
																<tr>
																	<td class="no-line"></td>
																	<td class="no-line"></td>
																	<td class="no-line text-center"><strong>Shipping</strong></td>
																	<td class="no-line text-right">$15</td>
																</tr>
																<tr>
																	<td class="no-line"></td>
																	<td class="no-line"></td>
																	<td class="no-line text-center"><strong>Total</strong></td>
																	<td class="no-line text-right">$685.99</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
									  
								
							</div><!-- end card body -->															
							
						</div><!-- end card-->					
						
                    </div><!-- end col-->			

</div><!-- end row--