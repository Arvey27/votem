<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoTem</title>
    <link rel="icon" href="uploads/ictlogo.png">

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://th.bing.com/th/id/R.ff4fe375cbc19278275fec7cec824f76?rik=xBXL%2bdFNrjtLSA&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fCy7YPNg.jpg&ehk=QtoG1zotzCDq%2beIQ7SHA6xKvIQZaZGm13fK7HoOLxXA%3d&risl=&pid=ImgRaw&r=0');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        .card{
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-color: red;
            
        }
        .card-header {
            background-color: #800000;
            color: white;
            position: relative;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #800000;
        }
        .btn-dark {
            background-color:#800000;
            border: none;
        }
        .btn-dark:hover {
            background-color: #23272b;
        }
        a {
            color: #800000;
        }
        a:hover {
            color: #0d6efd;
            text-decoration: underline;
        }
        .logo-img {
            max-width: 50px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
        }
         .form-select {
            display: none;
        }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="mb-0">VoTem</h1>
                        <img src="uploads/au.png" alt="Logo" class="img-fluid logo-img">
                    </div>
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <form action="./actions/login.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Enter your username" required="required">
                            </div>      
                            <div class="mb-3">
                            <input type="text" class="form-control" name="lrn" placeholder="Enter your LRN" required="required" maxlength="12" minlength="12" title="Please enter exactly 12 digits" pattern="[0-9]*">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required="required" maxlength="25" minlength="15"> 
                                
                            </div> 
                            <div class="mb-3">
                                <select name="std" class="form-select">                                   
                                    <option value="voter">Voter</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Don't have an account? <a href="./partials/registration.php">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+M/zl5rVvvJMFj8dTuyEL1B+wFK3I" crossorigin="anonymous"></script>
</body>
</html>

<script>
    document.getElementById("passwordView").addEventListener("click", function() {
        var passwordInput = document.querySelector("input[name='password']");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
</script>