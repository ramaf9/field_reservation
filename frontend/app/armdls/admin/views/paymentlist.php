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

		        <h4 class="page-title">Data Order</h4>
		        <ol class="breadcrumb">
		            <li>
		                <a href="">List Pemesan Lapangan</a>
		            </li>
		        </ol>
		    </div>
		</div>

		<div class="row">
		    <div class="col-sm-12">
		        <div class="card-box table-responsive">
		            <table id="datatable-buttons" class="table table-striped table-bordered">
		                <thead>
		                <tr>
		                    <th>Order No</th>
		                    <th>Nama Pemesan</th>
		                    <th>No Telp</th>
		                    <th>Tanggal Order</th>
		                    <th>Detail</th>
		                </tr>
		                </thead>
		                <tbody>
										<?php
										// echo json_encode($invoice);
										foreach ($invoice as $key) {
											echo "<tr><td>
											".$key['i_id']."
											</td>";
											echo "<td>
											".$key['i_nama_pemesan']."
											</td>";
											echo "<td>
											".$key['i_telp_pemesan']."
											</td>";
											echo "<td>
											".$key['i_date']."
											</td>";
											echo "<td>
											<a href='".base_url()."admin/invoice?id=".$key['i_id']."' class='btn btn-default waves-effect waves-light'>".$key['i_status']."</a>
											</td></tr>";
										}
										?>
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>

		</div> <!-- container -->

	</div> <!-- content -->

<footer class="footer">
© 2016. All rights reserved.
</footer>

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
