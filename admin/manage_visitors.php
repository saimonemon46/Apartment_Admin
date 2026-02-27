<?php 
	include 'includes/header.php';
	$stmt = $dbh->query("SELECT * FROM visitors ORDER BY id DESC");
	$visitors = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?> 
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

													<th class="detail-col">Sl</th>
													<th>Visitor Name</th>
													<th>Category</th>
													<th class="hidden-480">Apartment No</th>

													<th>
														<!-- <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i> -->
														Whom to Meet
													</th>


													<th>Actions</th>
												</tr>
											</thead>
										<div class="table-header">
											Results for "Latest Visitors"
										</div>
											<tbody>
												<?php
												$sl = 1; // Counter for serial column
												foreach ($visitors as $visitor): ?>
												<tr class="center">


													<td>
														<?php echo $sl++; ?>
													</td>

													<td>
														<?php echo htmlspecialchars($visitor['name']); ?>
													</td>
													<td><?php echo htmlspecialchars($visitor['category']); ?></td>
													<td class="hidden-480"><?php echo htmlspecialchars($visitor['apartment_no']); ?></td>
													<td><?php echo htmlspecialchars($visitor['whom_to_meet']); ?></td>


													<td>
														<div class="hidden-sm hidden-xs btn-group">

														<a href="view_details.php?id=<?php echo $visitor['id']; ?>" class="btn btn-xs btn-primary" title="Details">
															<i class="ace-icon fa fa-info-circle bigger-120"></i>
														</a>

														<a href="update_visitors.php?id=<?php echo $visitor['id']; ?>" class="btn btn-xs btn-warning" title="Update">
															<i class="ace-icon fa fa-pencil bigger-120"></i>
														</a>

														<a href="delete_visitors.php?id=<?php echo $visitor['id']; ?>" class="btn btn-xs btn-danger" title="Delete">
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
																		<a href="view_details.php?id=<?php echo $visitor['id']; ?>" class="tooltip-info" data-rel="tooltip" title="Details">
																			<span class="blue">
																				<i class="ace-icon fa fa-info-circle bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="update_visitors.php?id=<?php echo $visitor['id']; ?>" class="tooltip-success" data-rel="tooltip" title="Update">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="delete_visitors.php?id=<?php echo $visitor['id']; ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
</div>

</div>


<?php include 'includes/footer.php'; ?>