<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<div class="btn-group pull-right m-t-15">
						<button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
						<ul class="dropdown-menu drop-menu-right" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>
					<h4 class="page-title">Payment</h4>
					<ol class="breadcrumb">
						<li>
							<a href="#">Form Payment</a>
						</li>
					</ol>
				</div>
			</div>
			<!-- Wizard with Validation -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<h4 class="m-t-0 header-title"><b>Pembayaran</b></h4>
						<p class="text-muted m-b-30 font-13">
							Use the button classes on an element.
						</p>
						<form id="wizard-validation-form" action="#">
							<div>
								<h3>Step 1</h3>
								<section>
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table m-t-30">
													<thead>
														<tr>
															<th>#</th>
															<th>Item</th>
															<th>Quantity</th>
															<th>Date</th>
															<th>Time</th>
															<th>Unit Cost</th>
															<th style="text-align: right;">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td>
															<td>Lapangan A</td>
															<td>1 jam</td>
															<td>12/12/2012</td>
															<td>15.00</td>
															<td>IDR 120.000</td>
															<td style="text-align: right;">IDR 120.000</td>
														</tr>
														<tr>
															<td><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td>
															<td>Lapangan B</td>
															<td>3 jam</td>
															<td>12/12/2012</td>
															<td>15.00</td>
															<td>IDR 120.000</td>
															<td style="text-align: right;">IDR 120.000</td>
														</tr>
														<tr>
															<td><button class="demo-delete-row btn btn-danger btn-xs btn-icon fa fa-times"></button></td>
															<td>Lapangan D</td>
															<td>1 jam</td>
															<td>12/12/2012</td>
															<td>15.00</td>
															<td>IDR 120.000</td>
															<td style="text-align: right;">IDR 120.000</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="row" style="border-radius: 0px;">
										<div class="col-md-3 col-md-offset-9">
											<p class="text-right"><b>DP amount:</b> 2930.00</p>
											<p class="text-right">Discout: 12.9%</p>
											<hr>
											<h3 class="text-right"><b>Grand Total</b><br>IDR 1.000.000</h3>
										</div>
									</div>
								</section>
								<h3>Step 2</h3>
								<section>
									<div class="row">
										<div class="col-md-6">
											<h4 class="m-t-0 header-title"><b>Data Pemesan</b></h4>
											<p class="text-muted m-b-30 font-13">
												Inputkan data diri pemesan lapangan dengan benar
											</p>
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Pemesan</label>
												<input type="text" name="c_name" class="form-control" id="exampleInputEmail1" placeholder="Nama pemesan">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Email address</label>
												<input type="email" name="c_email" class="form-control" id="exampleInputEmail1" placeholder="Email pemesan">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Nomor Telepon</label>
												<input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
											</div>
											<h4 class="m-t-0 header-title"><b>Pembayaran via Transfer</b></h4>
											<p class="text-muted m-b-30 font-13">
												Untuk pembayaran via transfer dapat menggunakan rekening dibawah
											</p>
											<div class="row" style="border-radius: 0px;">
												<div class="col-md-12">
													<h3 class="text-left"><b>Bank BCA</b><br> 1880456373</h3>
													<p class="text-left">a/n Rysma Aditya W</p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="m-t-0 header-title"><b>Data Pembayaran</b></h4>
											<p class="text-muted m-b-30 font-13">
												Inputkan data diri pemesan lapangan dengan benar
											</p>
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Bank</label>
												<input type="text" name="c_name" class="form-control" id="exampleInputEmail1" placeholder="Nama bank">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Rekening</label>
												<input type="namarekening" name="c_email" class="form-control" id="exampleInputEmail1" placeholder="Nama rekening">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Jumlah Bayar DP</label>
												<input type="number" name="c_price" class="form-control" id="exampleInputEmail1" placeholder="Jumlah DP">
											</div>
											<div class="row" style="border-radius: 0px;">
												<div class="col-md-12">
													<p class="text-right"><b>DP amount:</b> 2930.00</p>
													<p class="text-right">Discout: 12.9%</p>
													<hr>
													<h3 class="text-right"><b>Grand Total</b><br>IDR 1.000.000</h3>
												</div>
											</div>
										</div>
									</div>
								</section>
								<h3>Step 3</h3>
								<section>
									<div class="row">
										<div class="col-md-12">
											<h4 class="m-t-0 header-title"><b>Rekap Pembayaran</b></h4>
											<p class="text-muted m-b-30 font-13">
												Berikut adalah rekap pembayaran persewaan lapangan
											</p>
											<div class="table-responsive">
												<table class="table m-t-30">
													<thead>
														<tr>
															<th>#</th>
															<th>Item</th>
															<th>Invoice No</th>
															<th style="text-align: right;">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>Pembayaran DP</td>
															<td><a href="#">73463274</a></td>
															<td style="text-align: right;">IDR 120.000</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="row" style="border-radius: 0px;">
												<div class="col-md-12">
													<p class="text-right"><b>DP amount:</b> 2930.00</p>
													<p class="text-right">Discout: 12.9%</p>
													<hr>
													<h3 class="text-right"><b>Biaya Sisa </b><br>IDR 1.000.000</h3>
												</div>
											</div>
										</div>
									</div>
								</section>
								<h3>Step Final</h3>
								<section>
									<div class="form-group clearfix">
										<div class="col-lg-12">
											<input id="acceptTerms-2" name="acceptTerms2" type="checkbox" class="required">
											<label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
										</div>
									</div>
								</section>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End row -->
		</div>
		<!-- container -->
	</div>

	<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modal Content is Responsive</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Name</label>
                                <input type="text" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Surname</label>
                                <input type="text" class="form-control" id="field-2" placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Address</label>
                                <input type="text" class="form-control" id="field-3" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">City</label>
                                <input type="text" class="form-control" id="field-4" placeholder="Boston">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Country</label>
                                <input type="text" class="form-control" id="field-5" placeholder="United States">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Zip</label>
                                <input type="text" class="form-control" id="field-6" placeholder="123456">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="field-7" class="control-label">Personal Info</label>
                                <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
	<!-- content -->
	<footer class="footer">
		© 2016. All rights reserved.
	</footer>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
