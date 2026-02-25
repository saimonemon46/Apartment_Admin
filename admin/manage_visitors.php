<?php include 'includes/header.php'; ?> 
						<div class="page-header">
							<h1>
								Manage Visitors
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									See all visitors and manage them
								</small>
							</h1>
						</div><!-- /.page-header -->

<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														<label class="pos-rel">
															<input type="checkbox" class="ace" />
															<span class="lbl"></span>
														</label>
													</th>
													<th class="detail-col">Details</th>
													<th>Domain</th>
													<th>Price</th>
													<th class="hidden-480">Clicks</th>

													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														Update
													</th>
													<th class="hidden-480">Status</th>

													<th></th>
												</tr>
											</thead>
																					<div class="table-header">
											Results for "Latest Visitors"
										</div>
											<tbody>
												<tr>
													<td class="center">
														<label class="pos-rel">
															<input type="checkbox" class="ace" />
															<span class="lbl"></span>
														</label>
													</td>

													<td class="center">
														<div class="action-buttons">
															<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																<i class="ace-icon fa fa-angle-double-down"></i>
																<span class="sr-only">Details</span>
															</a>
														</div>
													</td>

													<td>
														<a href="#">ace.com</a>
													</td>
													<td>$45</td>
													<td class="hidden-480">3,330</td>
													<td>Feb 12</td>

													<td class="hidden-480">
														<span class="label label-sm label-warning">Expiring</span>
													</td>
<td>
    <div class="hidden-sm hidden-xs btn-group">

	<a href="view_details.php" class="btn btn-xs btn-primary" title="Details">
		<i class="ace-icon fa fa-info-circle bigger-120"></i>
	</a>

	<a href="update_visitors.php" class="btn btn-xs btn-warning" title="Update">
		<i class="ace-icon fa fa-pencil bigger-120"></i>
	</a>

	<a href="delete_visitors.php" class="btn btn-xs btn-danger" title="Delete">
		<i class="ace-icon fa fa-trash bigger-120"></i>
	</a>

    </div>

    <!-- MOBILE DROPDOWN -->
    <div class="hidden-md hidden-lg">
        <div class="inline pos-rel">
            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
            </button>

            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                <li>
                    <a href="view_details.php" class="tooltip-info" data-rel="tooltip" title="Details">
                        <span class="blue">
                            <i class="ace-icon fa fa-info-circle bigger-120"></i>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="update_visitors.php" class="tooltip-success" data-rel="tooltip" title="Update">
                        <span class="green">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="delete_visitors.php" class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                            <i class="ace-icon fa fa-trash bigger-120"></i>
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</td>
												</tr>
											</tbody>
										</table>
									</div>
</div>

</div>


<?php include 'includes/footer.php'; ?>