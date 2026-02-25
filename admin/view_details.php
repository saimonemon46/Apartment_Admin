<?php include 'includes/header.php'; ?>

<div class="page-header">
    <h1>
        Visitor Details
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Complete visitor information
        </small>
    </h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Category</strong></td>
                        <td>Guest</td>
                    </tr>
                    <tr>
                        <td><strong>Visitor Name</strong></td>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>+1 555-123-4567</td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>221B Baker Street, London</td>
                    </tr>
                    <tr>
                        <td><strong>Apartment No</strong></td>
                        <td>A-12</td>
                    </tr>
                    <tr>
                        <td><strong>Floor No</strong></td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td><strong>Whom to Meet</strong></td>
                        <td>Mr. Rahman</td>
                    </tr>
                    <tr>
                        <td><strong>Reason</strong></td>
                        <td>General Visit</td>
                    </tr>
                    <tr>
                        <td><strong>In Time</strong></td>
                        <td>2026-02-25 10:15:34</td>
                    </tr>
                    <tr>
                        <td><strong>Out Time</strong></td>
                        <td>
                            <div class="input-group">
                                <input type="text" id="out_time" class="form-control" readonly>
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- OUT Button -->
        <div class="clearfix form-actions">
            <button class="btn btn-danger" type="button">
                <i class="ace-icon fa fa-sign-out bigger-110"></i>
                OUT
            </button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const outField = document.getElementById("out_time");
        const now = new Date();

        const formatted =
            now.getFullYear() + "-" +
            String(now.getMonth() + 1).padStart(2,'0') + "-" +
            String(now.getDate()).padStart(2,'0') + " " +
            String(now.getHours()).padStart(2,'0') + ":" +
            String(now.getMinutes()).padStart(2,'0') + ":" +
            String(now.getSeconds()).padStart(2,'0');

        outField.value = formatted;
    });
</script>