<?php include 'includes/header.php';?>


<style>

    .stat-card {
    border-radius: 12px;
    padding: 25px;
    color: #fff;
    height: 150px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    transition: 0.25s;
        }

    .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.22);
    }

    .stat-card .icon {
    font-size: 38px;
    margin-bottom: 5px;
    }

    .stat-card .value {
    font-size: 42px;
    font-weight: 600;
    line-height: 1;
    }

    .stat-card .label {
    font-size: 16px;
    margin-top: 6px;
    }

    /* Gradients */
    .gradient-1 { background: linear-gradient(135deg, #d84b97, #4d53ff); }
    .gradient-2 { background: linear-gradient(135deg, #19d77a, #00bca4); }
    .gradient-3 { background: linear-gradient(135deg, #ff7b00, #ff006a); }
    .gradient-4 { background: linear-gradient(135deg, #e2f36f, #3bc548); }
    .gradient-5 { background: linear-gradient(135deg, #ff7011, #ff1361); }
    .gradient-6 { background: linear-gradient(135deg, #ff7011, #ff1361); }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Apartment Management System</h2>
        </div>



        <!-- For blocks
    <div class="row"> -->

        <!-- Card -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="stat-card gradient-1">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="value"><?php
                    $stmt = $dbh->query("SELECT COUNT(*) FROM visitors WHERE DATE(entry_time) = CURDATE()");
                    echo $stmt->fetchColumn();
                ?></div>
                <div class="label">Todays Visitors</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="stat-card gradient-2">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="value"><?php
                    $stmt = $dbh->query("SELECT COUNT(*) FROM visitors WHERE DATE(entry_time) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
                    echo $stmt->fetchColumn();
                ?></div>
                <div class="label">Yesterday Visitors</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="stat-card gradient-3">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="value"><?php
                    $stmt = $dbh->query("SELECT COUNT(*) FROM visitors WHERE DATE(entry_time) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()");
                    echo $stmt->fetchColumn();
                ?></div>
                <div class="label">Last 7 Days Visitors</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="stat-card gradient-4">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="value"><?php
                    $stmt = $dbh->query("SELECT COUNT(*) FROM visitors");
                    echo $stmt->fetchColumn();
                ?></div>
                <div class="label">Total Visitors Till Date</div>
            </div>
        </div>

</div>

<div class="row" style="margin-top:20px; margin-bottom:20px;">

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="stat-card gradient-5">
            <div class="icon"><i class="fa fa-file"></i></div>
            <div class="value"><?php
                $stmt = $dbh->query("SELECT COUNT(DISTINCT category) AS total_categories FROM visitors");
                echo $stmt->fetchColumn();
            ?></div>
            <div class="label">Listed Categories</div>
        </div>
    </div>

					                                                
</div>
<?php include 'includes/footer.php'; ?>    



