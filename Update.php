<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Enquiry Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="a.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="image-container">
            <img src="sss.png" alt="College Image">
        </div>
        <div class="form-container">
            <?php
            include 'connection.php';
            
            $uid = isset($_GET['id']) ? $_GET['id'] : null;
            if ($uid) {
                $showquery = "SELECT * FROM collegedb WHERE id = {$uid}";
                $showdata = mysqli_query($connect, $showquery);
                $arydata = mysqli_fetch_array($showdata);
            } else {
                $arydata = [
                    'sname' => '',
                    'course' => '',
                    'email' => '',
                    'contact' => ''
                ];
            }
            ?>
            <form class="well form-horizontal" action="" method="POST" id="contact_form">
                <fieldset>
                    <!-- Form Name -->
                    <legend><h1>College Admission Enquiry Form</h1></legend>

                    <!-- Text input-->
                    <input name="sname" placeholder="Enter your full name" class="form-control" type="text" required value="<?php echo $arydata['sname']; ?>">

                    <!-- Text input-->
                    <input name="course" placeholder="Enter Course" class="form-control" type="text" required value="<?php echo $arydata['course']; ?>">

                    <!-- Email input-->
                    <input name="email" placeholder="Enter your Email" class="form-control" type="email" required value="<?php echo $arydata['email']; ?>">

                    <!-- Text input-->
                    <input name="contact" placeholder="Enter your Contact" class="form-control" type="text" required value="<?php echo $arydata['contact']; ?>">

                    <!-- Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Update <span class="glyphicon glyphicon-send"></span></button>
                        <a href="display.php" class="btn btn-primary btn-block">Display Data</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $sname = $_POST['sname'];
        $course = $_POST['course'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        // Check if any field is empty
        if (empty($sname) || empty($course) || empty($email) || empty($contact)) {
            echo "<script>alert('Please fill in all fields');</script>";
        } else {
            if ($uid) {
                $updatequery = "UPDATE collegedb SET sname='$sname', course='$course', email='$email', contact='$contact' WHERE id={$uid}";
                $result = mysqli_query($connect, $updatequery);

                if ($result) {
                    echo "<script>alert('Data Updated');</script>";
                } else {
                    echo "<script>alert('Error updating data');</script>";
                }
            } else {
                $insertquery = "INSERT INTO collegedb(sname, course, email, contact) VALUES ('$sname', '$course', '$email', '$contact')";
                $result = mysqli_query($connect, $insertquery);

                if ($result) {
                    echo "<script>alert('Data Saved');</script>";
                } else {
                    echo "<script>alert('Error saving data');</script>";
                }
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
