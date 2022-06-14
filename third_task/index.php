<!DOCTYPE html>
<html>
    <head>
        <title>Third Task</title>
        <link href="assets/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                <h3 class="text-center text-secondary">Hello, who`s this ? </h3>
                    <form class="mb-5" method="post" action="insert_data.php">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="mobile" class="col-form-label">Mobile Number</label>
                                <input type="tel" pattern="07([7-9]{1}[0-9]{7})" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-dark rounded-0 w-100 py-2 px-4">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <?php
session_start();

$errors = $_SESSION['errors'] ?? [];
if (is_array($errors)) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    }
    unset($_SESSION["errors"]);

}
?>
<?php
$success = $_SESSION['success'] ?? null;
if (isset($success)) {
    echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
    unset($_SESSION["success"]);
}
?>
                </div>
            </div>
        </div>
    </body>
</html>
