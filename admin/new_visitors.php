<?php
// initial setup before any HTML output
require_once 'includes/config.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
}

$success = '';
$errors = array();

// show success message if redirected
if (isset($_GET['added'])) {
    $success = 'Visitor added successfully.';
}

// Load categories from `visitor_categories` table first, then fallback to distinct visitors.category, then to defaults
$categories = array();
try {
    $stmt = $dbh->query("SELECT category_name FROM visitor_categories ORDER BY category_name");
    $cats = $stmt->fetchAll(PDO::FETCH_COLUMN);
    if ($cats) {
        foreach ($cats as $c) {
            if (strlen(trim($c)) > 0) $categories[] = $c;
        }
    }
} catch (Exception $e) {
    // ignore and try fallback
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = trim($_POST['category'] ?? '');
    $visitor_name = trim($_POST['visitor_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $apartment_no = trim($_POST['apartment_no'] ?? '');
    $floor = trim($_POST['floor'] ?? '');
    $meet_person = trim($_POST['whom_to_meet'] ?? '');
    $reason = trim($_POST['reason'] ?? '');
    $visit_datetime = trim($_POST['visit_datetime'] ?? '');

    if (empty($visitor_name)) {
        $errors[] = 'Visitor name is required.';
    }
    if (empty($apartment_no)) {
        $errors[] = 'Apartment number is required.';
    }
    if (empty($meet_person)) {
        $errors[] = 'Whom to meet is required.';
    }

    // Normalize/convert visit datetime to MySQL DATETIME
    if (empty($visit_datetime)) {
        $visit_datetime = date('Y-m-d H:i:s');
    } else {
        $dt = DateTime::createFromFormat('Y-m-d h:i A', $visit_datetime);
        if ($dt) {
            $visit_datetime = $dt->format('Y-m-d H:i:s');
        } else {
            $dt2 = DateTime::createFromFormat('Y-m-d H:i', $visit_datetime);
            if ($dt2) {
                $visit_datetime = $dt2->format('Y-m-d H:i:s');
            } else {
                // fallback to now
                $visit_datetime = date('Y-m-d H:i:s');
            }
        }
    }

    if (empty($errors)) {
        $stmt = $dbh->prepare("INSERT INTO visitors (visitor_name, category, phone, address, apartment_no, floor, whom_to_meet, reason, entry_time) VALUES (:visitor_name, :category, :phone, :address, :apartment_no, :floor, :whom_to_meet, :reason, :entry_time)");
        $res = $stmt->execute(array(
            ':visitor_name' => $visitor_name,
            ':category' => $category,
            ':phone' => $phone,
            ':address' => $address,
            ':apartment_no' => $apartment_no,
            ':floor' => $floor,
            ':whom_to_meet' => $meet_person,
            ':reason' => $reason,
            ':entry_time' => $visit_datetime
        ));

        if ($res) {
            // redirect to avoid form resubmission and clear inputs
            header('Location: new_visitors.php?added=1');
            exit;
        } else {
            $errors[] = 'Failed to add visitor to database.';
        }
    }
}

// ensure categories populated after POST
if (empty($categories)) {
    try {
        $stmt2 = $dbh->query("SELECT DISTINCT category FROM visitors WHERE category IS NOT NULL AND category <> '' ORDER BY category");
        $cats2 = $stmt2->fetchAll(PDO::FETCH_COLUMN);
        if ($cats2) {
            foreach ($cats2 as $c) {
                if (strlen(trim($c)) > 0) $categories[] = $c;
            }
        }
    } catch (Exception $e) {
        // ignore
    }
}
if (empty($categories)) {
    $categories = array('Maid','Delivery','Guest','Maintenance','Car Cleaner','Cook','Driver','Gardener','Milk Man','Electrician','Newspaper Boy','Other');
}

?>
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


            <div class="col-xs-12">

                <form class="form-horizontal" role="form" method="post" action="">

                    <!-- Category -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Category</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-list"></i>
                                </span>
                                <select class="form-control" id="category" name="category">
                                <option value=""></option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?php echo htmlspecialchars($cat); ?>" <?php if (isset($_POST['category']) && $_POST['category'] === $cat) echo 'selected'; ?>><?php echo htmlspecialchars($cat); ?></option>
                                <?php endforeach; ?>
                                </select>

                                
                            </div>
                        </div>
                    </div>




                    <!-- Visitor  Name -->

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="visitor_name">Visitor Name</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-user"></i>
                                </span>
                                <input type="text" id="visitor_name" name="visitor_name" placeholder="Enter visitor name" class="form-control" value="<?php echo htmlspecialchars($_POST['visitor_name'] ?? ''); ?>" />
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
                                <input type="text" id="phone" name="phone" placeholder="Phone Number" class="form-control" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" />
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
                                <textarea id="address" name="address" rows="3" placeholder="Visitor address" class="form-control"><?php echo htmlspecialchars($_POST['address'] ?? ''); ?></textarea>
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
                                <input type="text" id="apartment_no" name="apartment_no" placeholder="Apartment No" class="form-control" value="<?php echo htmlspecialchars($_POST['apartment_no'] ?? ''); ?>" />
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
                                <input type="text" id="floor_no" name="floor" placeholder="Floor No" class="form-control" value="<?php echo htmlspecialchars($_POST['floor'] ?? ''); ?>" />
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
                                <input type="text" id="meet_person" name="whom_to_meet" placeholder="Name of resident to meet" class="form-control" value="<?php echo htmlspecialchars($_POST['whom_to_meet'] ?? ''); ?>" />
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
                                <input type="text" id="reason" name="reason" placeholder="Reason" class="form-control" value="<?php echo htmlspecialchars($_POST['reason'] ?? ''); ?>" />
                            </div>
                        </div>
                    </div>

                    <!-- Date & Time -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right">Date & Time</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" id="visit_datetime" name="visit_datetime" class="form-control" placeholder="Select date & time" value="<?php echo htmlspecialchars($_POST['visit_datetime'] ?? ''); ?>" />
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
                            <button class="btn" type="reset" id="resetBtn">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                </form>

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

    // clear inputs when reset clicked
    document.getElementById('resetBtn').addEventListener('click', function() {
        const form = this.closest('form');
        if (!form) return;
        form.querySelectorAll('input, select, textarea').forEach(el => {
            if (el.type === 'checkbox' || el.type === 'radio') {
                el.checked = false;
            } else if (el.tagName === 'SELECT') {
                el.selectedIndex = 0;
            } else {
                el.value = '';
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const form = e.target.closest('form');
            if (!form) return;

            if (e.target.tagName === 'BUTTON' || e.target.tagName === 'A') {
                return;
            }

            const inputs = Array.from(form.querySelectorAll('input, select, textarea')).filter(el =>
                !el.disabled && el.type !== 'hidden' && el.tagName !== 'BUTTON'
            );

            const index = inputs.indexOf(e.target);
            if (index === -1) { return; }
            if (index === inputs.length - 1) {
                return; // allow submit
            }
            e.preventDefault();
            inputs[index + 1].focus();
        }
    });
</script>