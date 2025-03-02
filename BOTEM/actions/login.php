<?php
session_start();
include('connect.php');

$username = $_POST['username'];
$lrn = $_POST['lrn'];
$password = $_POST['password'];
$std = $_POST['std'];

// Check if the account exists (either username or LRN)
$sql = "SELECT * FROM `userdata` WHERE username=? OR lrn=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $lrn);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo '<script>
        alert("This account does not exist. Please check your details or register.");
        window.location="../";
    </script>';
    exit;
}

// Check if username is correct
$sql = "SELECT * FROM `userdata` WHERE username=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo '<script>
        alert("Invalid username. Please check your username.");
        window.location="../";
    </script>';
    exit;
}

// Check if LRN matches the username
$sql = "SELECT * FROM `userdata` WHERE username=? AND lrn=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $lrn);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo '<script>
        alert("Invalid LRN. Please check your LRN.");
        window.location="../";
    </script>';
    exit;
}

// Check if password matches
$sql = "SELECT * FROM `userdata` WHERE username=? AND lrn=? AND password=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sss", $username, $lrn, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo '<script>
        alert("Invalid password. Please check your password.");
        window.location="../";
    </script>';
    exit;
}

// Check if standard matches
$sql = "SELECT * FROM `userdata` WHERE username=? AND lrn=? AND password=? AND standard=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $username, $lrn, $password, $std);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo '<script>
        alert("Invalid standard selection. Please check your standard.");
        window.location="../";
    </script>';
    exit;
}

// If all credentials are correct, log in the user
$data = mysqli_fetch_array($result);

// Fetch group data
$sql_group = "SELECT username, photo, votes, id FROM `userdata` WHERE standard='group'";
$resultgroup = mysqli_query($con, $sql_group);

if(mysqli_num_rows($resultgroup) > 0){
    $groups = mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
    $_SESSION['groups'] = $groups;
}

$_SESSION['id'] = $data['id'];
$_SESSION['status'] = $data['status'];
$_SESSION['data'] = $data;    

// Show login success message and redirect to dashboard
echo '<script>
    alert("Login Successful! Redirecting to dashboard...");
    window.location="../partials/dashboard.php";   
</script>';
?>
