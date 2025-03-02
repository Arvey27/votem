<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../');
}

$data = $_SESSION['data'];
$status = $_SESSION['status'] == 1 ? '<b class="text-success">Voted</b>' : '<b class="text-danger">Not Voted</b>';

$groups = isset($_SESSION['groups']) ? $_SESSION['groups'] : [];
$votedGroups = isset($_SESSION['voted_groups']) ? $_SESSION['voted_groups'] : []; // IDs of voted candidates

// Initialize search query
$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    // Filter groups based on the search query
    $groups = array_filter($groups, function($group) use ($searchQuery) {
        return stripos($group['username'], $searchQuery) !== false; // Case-insensitive search
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoTem - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="uploads/ictlogo.png">
    <style>
        body {
            background-image: url('https://th.bing.com/th/id/R.ff4fe375cbc19278275fec7cec824f76?rik=xBXL%2bdFNrjtLSA&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fCy7YPNg.jpg&ehk=QtoG1zotzCDq%2beIQ7SHA6xKvIQZaZGm13fK7HoOLxXA%3d&risl=&pid=ImgRaw&r=0');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        .sidebar {
            background-color: rgb(137, 0, 0);
            height: 8000px; /* Set a fixed height */
            padding: 10px;
            border-color: black;
            @media (max-width: 767px)
        }
        .sidebar {
            height: auto; /* Set height to auto on smaller screens */    
        }
        .sidebar a {
            color: black;
            text-decoration: none;
        }
        .sidebar a:hover {
            color:rgb(237, 0, 0); 
        }
        .card-body1{
            background-color: rgb(255, 255, 255);
            border-style: solid;
            border-color: black;
        }
        .col-md-8{
            text-align: center;
            display: flex;
            justify-content: center;
            position: relative;
            border-color: black;       
        }
        .card-body2{
            background-color: rgb(255, 255, 255);
            border-color: black;
        }
        .btn-success {
            background-color:rgb(0, 0, 0);
            border: none;
        }
        .text-danger {
            color:rgb(0, 0, 0);
        }
        .text-success {
            color:rgb(0, 120, 28);
            
        }
        h1, h2 {
            color:rgb(255, 255, 255);
        }
        .btn-primary, .btn-danger {
            background-color:rgb(0, 0, 0);
            border: none;
        }
        .voted-indicator {
            color: rgb(0, 71, 17); /* Green color */
            font-weight: bold;
            margin-left: 10px; /* Space between name and indicator */
        }     
        .card-img-top{           
            width: 2in;
            height: 2in;
        }
        .img-fluid{
            width: auto;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h2 class="text-center">VoTem</h2>
            <form class="mb-4" method="POST" action="">
                <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search" value="<?php echo htmlspecialchars($searchQuery); ?>">
            </form>
            <div class="card text-center mb-4">
                <img src="../uploads/<?php echo $data['photo']; ?>" class="card-img-top" alt="User  image">
                <div class="card-body1">
                    <h5 class="card-title">Name: <?php echo $data['username']; ?></h5>
                    <p class="card-text">LRN: <?php echo $data['lrn']; ?></p>
                    <p class="card-text">Status: <?php echo $status; ?></p>
                </div>
            </div>
            <div class="mb-4">
                <a href="logout.php" class="btn btn-light w-100">Logout</a>
            </div>
        </div>
        <div class="container my-5">
    <h1 class="text-center mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php
                if (!empty($groups)) {
                    foreach ($groups as $group) {
                        $voted = in_array($group['id'], $votedGroups) ? '<span class="voted-indicator">✔️</span>' : '';
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../uploads/<?php echo !empty($group['photo']) ? $group['photo'] : 'default.jpg'; ?>" class="img-fluid rounded-start" alt="Group image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Candidate Name: <?php echo $group['username'] . $voted; ?>
                                    </h5>
                                    <p class="card-text">Votes: <?php echo $group['votes']; ?></p>
                                    <form action="../actions/voting.php" method="post">
                                        <input type="hidden" name="groupvotes" value="<?php echo $group['votes']; ?>">
                                        <input type="hidden" name="groupid" value="<?php echo $group['id']; ?>">
                                        <?php
                                        if ($_SESSION['status'] == 1) {
                                            echo '<button class="btn btn-success" disabled>Voted</button>';
                                        } else {
                                            echo '<button class="btn btn-outline-danger" type="submit">Vote</button>';
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No groups to display.
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        </div>
    </div>
</div>
</html>
