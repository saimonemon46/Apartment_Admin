<?php include 'includes/header.php'; ?> 
<div class="page-content">
    <div class="page-header">
        <h1>
            Add Visitors
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Add new visitors to the system
            </small>
        </h1>
    </div>
    <div class="row">

        <div class="row">
            <div class="col-xs-12">

                <form class="form-horizontal" role="form">

                    <!-- Category -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Category</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-list"></i>
                                </span>
                                <select class="form-control" id="category">
                                <option value=""></option>
                                <option>Car Cleaner</option>
                                <option>Cook</option>
                                <option>Driver</option>
                                <option>Gardener</option>
                                <option>Guest</option>
                                <option>Maid</option>
                                <option>Milk Man</option>
                                <option>Newspaper Boy</option>
                                <option>Electrician</option>
                                <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Visitor Name -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="visitor_name">Visitor Name</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-user"></i>
                                </span>
                                <input type="text" id="visitor_name" placeholder="Enter visitor name" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="phone">
                            Phone 
                            <small class="text-warning">(999) 999-9999</small>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-phone"></i>
                                </span>
                                <input type="text" id="phone" placeholder="Phone Number" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="address">Address</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-map-marker"></i>
                                </span>
                                <textarea id="address" rows="3" placeholder="Visitor address" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Apartment No -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="apartment_no">Apartment No</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-building"></i>
                                </span>
                                <input type="text" id="apartment_no" placeholder="Apartment No" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- Floor No -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="floor_no">Floor No</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-sort-numeric-up"></i>
                                </span>
                                <input type="text" id="floor_no" placeholder="Floor No" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- Whom to meet -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="meet_person">Whom to Meet</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-handshake-o"></i>
                                </span>
                                <input type="text" id="meet_person" placeholder="Name of resident to meet" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- Reason -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="reason">Reason to Meet</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-comment-o"></i>
                                </span>
                                <input type="text" id="reason" placeholder="Reason" class="form-control" />
                            </div>
                        </div>
                    </div>



                    <!-- Date & Time -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Date & Time</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" id="visit_datetime" class="form-control" placeholder="Select date & time" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit + Reset -->
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>
                            &nbsp;&nbsp;&nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>


<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script>
    $('#visit_datetime').datetimepicker({
        format: 'YYYY-MM-DD hh:mm A',
        defaultDate: moment(),
        useCurrent: true,
        showClose: true,
        showClear: true,
        showTodayButton: true
    });
    
    // Set current local date and time on page load
    $('#visit_datetime').data("DateTimePicker").date(moment());
</script>