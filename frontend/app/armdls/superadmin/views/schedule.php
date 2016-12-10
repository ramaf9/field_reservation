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
				<h4 class="page-title">Field Reservation</h4>
				<ol class="breadcrumb">
					<li>
						<a href="">Reservasi lapangan</a>
					</li>
				</ol>
			</div>
		</div>
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="m-t-0 header-title"><b>Reservasi</b></h4>
						<p class="text-muted font-13 m-b-30">Pilih tanggal untuk mencari lapangan kosong</p>
						<form action="" method="GET" data-parsley-validate novalidate>
							<div class="form-group">
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" name="date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
										<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
									</div>
									<!-- input-group -->
								</div>
							</div>
							<div class="form-group m-b-0">
									<button class="btn btn-primary waves-effect waves-light" type="submit">
									Show
									</button>
									<a class="btn btn-primary waves-effect waves-light" href="<?php echo base_url(); ?>home/checkout">
									Check out
								</a>
							</div>
						</form>
					</div>
					<div class="row">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Tempat</th>
									<th>Lapangan</th>
									<th>Available time</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($schedule['status'])) {
									echo '<tr><td>

									'.$schedule['error'].'</td></tr>';
									// echo json_encode($schedule);
								}
								else{
									// echo json_encode($schedule);
									foreach ($schedule as $key) {
										// echo json_encode($key);

										echo '<tr>';
										echo '<td>'.$key['f_location'].'</td>';
										echo '<td>'.$key['f_name'].'</td><td>';
										$count = 0;
										foreach($key['available_time'] as $av){
											$booked = false;
											// echo json_encode($book);
											if (isset($book)) {

												foreach ($book as $row ) {
													if ($row['date'] == $date && $row['id'] == $key['f_id'] && $row['time'] == $av['start_time']) {
														$booked = true;
														break;
													}
												}
											}
											if (!$booked) {
												echo '<a href="'.base_url().'home/landing?date='.$date.'&time='.$av['start_time'].'&id='.$key['f_id'].'&name='.$key['f_name'].'&location='.$key['f_location'].'"
												data-target="#ava-field" class="btn btn-primary dropdown-toggle waves-effect waves-light">
												'.$av['start_time'].'</a>';
											}
											else{
												echo '<a href="#"
												data-target="#ava-field" class="disabled btn btn-warning dropdown-toggle waves-effect waves-light" disabled>
												'.$av['start_time'].'</a>';
											}

											$count = $count +1;
											if ($count%4 == 0) {
												echo '<br />';
											}
										}
										echo '</td></tr>';
									}
								}
								?>
							</tbody>
						</table>

						<!-- <table class="table table-striped" id="datatable-editable">
							<thead>
								<tr>
									<th>Time</th>
									<th>A</th>
									<th>B</th>
									<th>C</th>
									<th>D</th>
									<th>E</th>
								</tr>
							</thead>
							<tbody>
								<tr class="gradeX">
									<td>01.00 - 02.00</td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-warning dropdown-toggle waves-effect waves-light">booked</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-danger dropdown-toggle waves-effect waves-light">bayar dp</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
								</tr>
								<tr class="gradeX">
									<td>02.00 - 03.00</td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
								</tr>
								<tr class="gradeX">
									<td>03.00 - 04.00</td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
								</tr>
								<tr class="gradeX">
									<td>04.00 - 05.00</td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" data-toggle="modal" data-target="#ava-field" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
								</tr>
								<tr class="gradeX">
									<td>05.00 - 06.00</td>
									<td><button button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
									<td><button button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light">available</button></td>
								</tr>
							</tbody>
						</table> -->
					</div>
				</div>
				<!-- end: page -->
			</div>
			<!-- end Panel -->
		</div>
		<!-- container -->
	</div>
	<!-- content -->
	<!--modal-->
	<div id="ava-field" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Booking details</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="field-1" class="control-label">Nama</label>
								<input type="text" class="form-control" id="field-1" placeholder="Nama pemesan">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="field-2" class="control-label">Email</label>
								<input type="text" class="form-control" id="field-2" placeholder="Email pemesan">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-3" class="control-label">Telepon</label>
								<input type="text" class="form-control" id="field-3" placeholder="Nomor telepon aktif">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Tanggal Akan Bayar</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
									<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Waktu Akan Bayar</label>
								<div class="input-group m-b-0">
									<div class="bootstrap-timepicker">
										<input id="timepicker3" type="text" class="form-control">
									</div>
									<span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group no-margin">
								<label for="field-7" class="control-label">Keterangan Tambahan</label>
								<textarea class="form-control autogrow" id="field-7" placeholder="Keterangan tambahan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" style="float: left;" class="btn btn-danger waves-effect" data-dismiss="modal">Delete Reservasi</button>
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<div id="ava-field" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Booking details</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="field-1" class="control-label">Nama</label>
								<input type="text" class="form-control" id="field-1" placeholder="Nama pemesan">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="field-2" class="control-label">Email</label>
								<input type="text" class="form-control" id="field-2" placeholder="Email pemesan">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="field-3" class="control-label">Telepon</label>
								<input type="text" class="form-control" id="field-3" placeholder="Nomor telepon aktif">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Tanggal Akan Bayar</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
									<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Waktu Akan Bayar</label>
								<div class="input-group m-b-0">
									<div class="bootstrap-timepicker">
										<input id="timepicker3" type="text" class="form-control">
									</div>
									<span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group no-margin">
								<label for="field-7" class="control-label">Keterangan Tambahan</label>
								<textarea class="form-control autogrow" id="field-7" placeholder="Keterangan tambahan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" style="float: left;" class="btn btn-danger waves-effect" data-dismiss="modal">Delete Reservasi</button>
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		© 2016. All rights reserved.
	</footer>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
