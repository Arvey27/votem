<?php
include('connect.php');

$username = $_POST['username'];
$lrn = $_POST['lrn'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$std = $_POST['std'];

// Check if the LRN already exists
$check_lrn_sql = "SELECT * FROM userdata WHERE lrn = '$lrn'";
$check_lrn_result = mysqli_query($con, $check_lrn_sql);

if (mysqli_num_rows($check_lrn_result) > 0) {
    echo '<script>
    alert("The LRN you entered already exists. Please use a different LRN.");
    window.location="../partials/registration.php";
    </script>';
    exit;
}

if ($password != $cpassword) {
    echo '<script>
    alert("Password do not match");
    window.location="../partials/registration.php";
    </script>';
} else {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $sql = "INSERT INTO `userdata` (username, lrn, password, photo, standard, status, votes)
            VALUES ('$username', '$lrn', '$password', '$image', '$std', 0, 0)";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<script>
        alert("Registration successful");
        window.location="../";
        </script>';
    } else {
        die(mysqli_error($con));
    }
}
?>