<?php include 'includes/header.php'; ?> 

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
    <div class="col-xs-12">

        <form class="form-horizontal" role="form">

            <!-- Username -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="username">Text Field</label>
                <div class="col-sm-9">
                    <input type="text" id="username" placeholder="Username" class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <!-- Full Length -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="fullname">Full Length</label>
                <div class="col-sm-3">
                    <input type="text" id="fullname" placeholder="Text Field" class="form-control" />
                </div>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="phone">
                    Phone 
                    <small class="text-warning">(999) 999-9999</small>
                </label>

                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="ace-icon fa fa-phone"></i>
                        </span>
                        <input type="text" id="phone" placeholder="Phone Number" class="form-control" />
                    </div>
                </div>
            </div>

            <!-- Submit + Reset -->
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="button">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>

                    &nbsp; &nbsp; &nbsp;

                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>

<?php include 'includes/footer.php'; ?>