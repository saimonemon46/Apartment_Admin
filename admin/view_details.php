<?php 
include 'includes/header.php';

// ensure out_time column exists (silent if already present)
try {
    $dbh->exec("ALTER TABLE visitors ADD COLUMN out_time DATETIME NULL");
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
    $upd = $dbh->prepare("UPDATE visitors SET out_time = NOW() WHERE id = :id");
    $upd->execute([':id' => $id]);
    header('Location: view_details.php?id=' . $id);
    exit;
}

$stmt = $dbh->prepare("SELECT * FROM visitors WHERE id = :id");
$stmt->execute([':id' => $id]);
$visitor = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$visitor) {
    echo '<div class="alert alert-warning">Visitor not found.</div>';
    include 'includes/footer.php';
    exit;
}
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
                        <td><?php echo htmlspecialchars($visitor['phone'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td><?php echo htmlspecialchars($visitor['address'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Apartment No</strong></td>
                        <td><?php echo htmlspecialchars($visitor['apartment_no']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Floor No</strong></td>
                        <td><?php echo htmlspecialchars($visitor['floor_no'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Whom to Meet</strong></td>
                        <td><?php echo htmlspecialchars($visitor['whom_to_meet']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Reason</strong></td>
                        <td><?php echo htmlspecialchars($visitor['reason'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <td><strong>In Time</strong></td>
                        <td><?php echo htmlspecialchars($visitor['entry_date']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Out Time</strong></td>
                        <td>
                            <?php if (!empty($visitor['out_time'])): ?>
                                <?php echo htmlspecialchars($visitor['out_time']); ?>
                            <?php else: ?>
                                <form method="post" class="form-inline" style="display:inline;">
                                    <input type="hidden" name="mark_out" value="1">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="ace-icon fa fa-sign-out bigger-110"></i> OUT
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