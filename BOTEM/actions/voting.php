<?php
session_start();
include('connect.php');

$votes = $_POST['groupvotes'];
$totalvotes = $votes + 1;
$gid = $_POST['groupid'];
$uid = $_SESSION['id'];

// Check if the user has already voted
$checkStatus = mysqli_query($con, "SELECT status FROM `userdata` WHERE id='$uid'");
$userStatus = mysqli_fetch_assoc($checkStatus);

if ($userStatus['status'] == 1) {
    echo '<script> alert("You have already voted!"); window.location="../partials/dashboard.php"; </script>';
    exit();
}

// Update the votes for the selected candidate
$updatevotes = mysqli_query($con, "UPDATE `userdata` SET votes='$totalvotes' WHERE id='$gid'");
$updatestatus = mysqli_query($con, "UPDATE `userdata` SET status=1 WHERE id='$uid'");

if ($updatevotes && $updatestatus) {
    // Update session data
    $_SESSION['status'] = 1;
    $_SESSION['voted_groups'][] = $gid;
    // Add the voted candidate ID to the session

    // Refresh the group data in the session
    $groupResult = mysqli_query($con, "SELECT * FROM `userdata` WHERE id='$gid'");
    $groupData = mysqli_fetch_assoc($groupResult);
    $updatedGroup = array(
        'id' => $groupData['id'],
        'username' => $groupData['username'],
        'votes' => $groupData['votes'],
        'photo' => $groupData['photo']
    );
    $groups = $_SESSION['groups'];
    $index = array_search($gid, array_column($groups, 'id'));
    if ($index !== false) {
        $groups[$index] = $updatedGroup;
        $_SESSION['groups'] = $groups;
    }

    echo '<script> alert("Voting successful"); window.location="../partials/dashboard.php"; </script>';
} else {
    echo '<script> alert("Technical error! Vote after sometime"); window.location="../partials/dashboard.php"; </script>';
}
?>