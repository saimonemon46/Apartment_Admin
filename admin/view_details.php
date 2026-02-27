<?php 

// ensure out_time column exists (silent if already present)
try {
    include 'includes/config.php';
    // $dbh->exec("ALTER TABLE visitors ADD COLUMN exit_time DATETIME NULL");
} catch (PDOException $e) {
    // ignore errors (likely column already exists)
}

// make sure we have a valid id parameter
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: manage_visitors.php');
    exit;
}

// handle marking out time
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_out'])) {
    $upd = $dbh->prepare("UPDATE visitors SET exit_time = NOW() WHERE id = :id");
    $upd->execute([':id' => $id]);
    header('Location: view_details.php?id=' . $id);
    exit;
}

$stmt = $dbh->prepare("SELECT * FROM visitors WHERE id = :id");
$stmt->execute([':id' => $id]);
$visitor = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$visitor) {
    // Will display error in HTML below after header
    $visitor_error = true;
}

// Now include header (after all logic and header calls)
include 'includes/header.php';
?>

<div class="page-header">
    <h1>
        Visitor Details
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Complete visitor information
        </small>
    </h1>
</div>

<?php if (isset($visitor_error) && $visitor_error): ?>
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> Visitor not found.
    </div>
    <?php include 'includes/footer.php'; include 'includes/sidebar.php'; ?>
    </body></html>
    <?php exit; ?>
<?php endif; ?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Category</strong></td>
                        <td><?php echo htmlspecialchars($visitor['category']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Visitor Name</strong></td>
                        <td><?php echo htmlspecialchars($visitor['visitor_name']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td><?php echo htmlspecialchars($visitor['phone']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Apartment No</strong></td>
                        <td><?php echo htmlspecialchars($visitor['apartment_no']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Floor No</strong></td>
                        <td><?php echo htmlspecialchars($visitor['floor']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Whom to Meet</strong></td>
                        <td><?php echo htmlspecialchars($visitor['whom_to_meet']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Address</strong></td>
                        <td><?php echo htmlspecialchars($visitor['address']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Reason for Visit</strong></td>
                        <td><?php echo htmlspecialchars($visitor['reason']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Entry Date</strong></td>
                        <td><?php echo htmlspecialchars($visitor['entry_time']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Exit Time</strong></td>
                        <td>
                            <?php if (!empty($visitor['exit_time'])): ?>
                                <?php echo htmlspecialchars($visitor['exit_time']); ?>
                            <?php else: ?>
                                <form method="post" class="form-inline" style="display:inline;">
                                    <input type="hidden" name="mark_out" value="1">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="ace-icon fa fa-sign-out bigger-110"></i> Mark Exit
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>