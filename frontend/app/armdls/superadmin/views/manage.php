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
					<h4 class="page-title">Assets Managerial</h4>
					<ol class="breadcrumb">
						<li>
							<a href="">Kelola karyawan, tambah diskon</a>
						</li>
					</ol>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
					<div class="card-box">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="m-t-0 header-title"><b>Tambah, Edit, Voucher</b></h4>
								<!-- <form action="<?php echo base_url(''); ?>superadmin/showUser"> -->
								</form>
								<p class="text-muted font-13">
									Untuk menambahkan voucher
								</p>
								<!-- Full width modal -->
	              <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add-voucher">Tambah Voucher</button>

								<div class="p-20">
									<div class="table-responsive">
										<table class="table m-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Voucher Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!isset($voucher)||empty($voucher)) {
													echo 'test';
												} else {
													foreach ($voucher as $key) {
														echo '<tr>';
														echo '<td>'.$key['v_id'].'</td>';
														echo '<td>'.$key['v_amount'].'</td>';
														echo '</tr>';
													}
												}
												?>
											</tbody>
										</table>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>

				<div class="col-sm-9">
					<div class="card-box">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="m-t-0 header-title"><b>Tambah, Edit, Pegawai</b></h4>
								<p class="text-muted font-13">
									Untuk menambahkan voucher
								</p>
								<!-- Full width modal -->
	              <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add-pegawai">Tambah Pegawai</button>

								<div class="p-20">
									<div class="table-responsive">
										<table class="table m-0">
											<thead>
												<tr>
													<th>Nama Pegawai</th>
													<th>Email Pegawai</th>
													<th>Role</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!isset($user)||empty($user)) {
													echo 'test';
												} else {
													foreach ($user as $key) {
														echo '<tr>';
														echo '<td>'.$key['u_name'].'</td>';
														echo '<td>'.$key['u_email'].'</td>';
														echo '<td>'.$key['u_role'].'</td>';
														echo '</tr>';
													}
												}

												?>
											</tbody>
										</table>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- end Panel -->
      </div>
		<!-- container -->
	</div>
	<!-- content -->

	<div id="add-voucher" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Tambah Voucher</h4>
              </div>
							<form method="post" action="<?php echo base_url(''); ?>superadmin/addVoucher">
              <div class="modal-body">
                  <div class="row">
											<div class="col-md-12">
                          <div class="form-group">
                              <label for="field-1" class="control-label">Price</label>
                              <input type="number" required="" name="input[v_amount]" class="form-control" id="field-1" placeholder="Voucher Price">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
              </div>
							</form>
          </div>
      </div>
  </div><!-- /.modal -->

	<div id="add-pegawai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Tambah Pegawai</h4>
              </div>
							<form method="post" action="<?php echo base_url(''); ?>superadmin/addUser">
              <div class="modal-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
													<label for="field-2" class="control-label">Nama Pegawai</label>
													<input type="text" name="input[name]" class="form-control" id="field-2" placeholder="Nama pegawai">
											</div>
										</div>
									</div>
									<div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="field-2" class="control-label">Email</label>
                              <input type="text" name="input[email]" class="form-control" id="field-2" placeholder="Email">
                          </div>
                      </div>
											<div class="col-md-6">
                          <div class="form-group">
                              <label for="field-2" class="control-label">Password</label>
                              <input type="text" name="input[password]" class="form-control" id="field-2" placeholder="Password">
                          </div>
                      </div>
                  </div>
									<div class="row">
                      <div class="col-md-12">
												<div class="form-group">
	                      	<label class="control-label">Role</label>
	                            <div class="col-sm-12">
	                                <select name="input[role]" class="form-control">
	                                    <option value="adm">Superadmin</option>
	                                    <option value="sadm">Admin</option>
	                                    <option value="usr">User</option>
	                                </select>
	                            </div>
	                        </div>
                      </div>
									</div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
              </div>
						</form>
          </div>
      </div>
  </div><!-- /.modal -->


	<footer class="footer">
		© 2016. All rights reserved.
	</footer>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
