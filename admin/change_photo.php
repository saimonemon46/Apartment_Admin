<?php include 'includes/header.php'; ?>

<script>
    #dropzone .dz-message .fa {
    font-size: 90px;
    color: #6fb3e0;
}

#dropzone .dz-message {
    font-size: 20px;
    padding: 40px 0;
    text-align: center;
}
</script>


				<div class="main-content-inner">


					<div class="page-content">







						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-info">
									<i class="ace-icon fa fa-hand-o-right"></i>

									Please drop your profile picture here or click to upload.
									<button class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
								</div>

								<div>
                                    <form action="./dummy.html" class="dropzone well dz-clickable" id="dropzone">
                                        <div class="dz-message">
                                            <i class="ace-icon fa fa-cloud-upload" style="font-size: 80px; color:#6fb3e0;"></i>
                                            <br><br>
                                            <span class="bigger-110">Drop files here or click to upload.</span>
                                        </div>

                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </form>
								</div>

								<div id="preview-template" class="hide">
									<div class="dz-preview dz-file-preview">
										<div class="dz-image">
											<img data-dz-thumbnail="" />
										</div>

										<div class="dz-details">
											<div class="dz-size">
												<span data-dz-size=""></span>
											</div>

											<div class="dz-filename">
												<span data-dz-name=""></span>
											</div>
										</div>

										<div class="dz-progress">
											<span class="dz-upload" data-dz-uploadprogress=""></span>
										</div>

										<div class="dz-error-message">
											<span data-dz-errormessage=""></span>
										</div>

										<div class="dz-success-mark">
											<span class="fa-stack fa-lg bigger-150">
												<i class="fa fa-circle fa-stack-2x white"></i>

												<i class="fa fa-check fa-stack-1x fa-inverse green"></i>
											</span>
										</div>

										<div class="dz-error-mark">
											<span class="fa-stack fa-lg bigger-150">
												<i class="fa fa-circle fa-stack-2x white"></i>

												<i class="fa fa-remove fa-stack-1x fa-inverse red"></i>
											</span>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
<?php include 'includes/footer.php'; ?>