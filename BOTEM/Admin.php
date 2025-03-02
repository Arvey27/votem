<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="uploads/ictlogo.png">
    
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-image: url('https://th.bing.com/th/id/R.ff4fe375cbc19278275fec7cec824f76?rik=xBXL%2bdFNrjtLSA&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fCy7YPNg.jpg&ehk=QtoG1zotzCDq%2beIQ7SHA6xKvIQZaZGm13fK7HoOLxXA%3d&risl=&pid=ImgRaw&r=0');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-color: red;
        }
        .card-header {
            background-color: #800000;
            color: white;
            border-radius: 15px 15px 0 0;
            position: relative;
        }
        .card-header img {
            position: absolute;
            top: 10px;
            right: 10px;
            max-width: 50px;
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
        .img-fluid{
            max-width: 100%;
            height: auto;
            position: ab;
        }
        
        a:hover {
            color: #0d6efd;
            text-decoration: underline;
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
                        <img src="uploads/au.png" alt="Logo" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h2 class="text-center mb-4">Admin</h2>
                        <form action="../actions/register.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Enter Candidate name" required>
                            </div>
                            <div class="mb-3">
                            <input type="text" class="form-control" name="lrn" placeholder="Enter your LRN" required="required" maxlength="12" minlength="12" title="Please enter exactly 12 digits" pattern="[0-9]*">               
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required id="passwordInput">
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" required id="cPasswordInput">
                                
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="photo">
                                
                            </div>
                            <button type="submit" class="btn btn-dark w-100 my-4">Enter</button>
                            <select name="std" class="form-select">
                            <option value="group"></option>
                        
                            </select>
                                                       
                        </form>
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswords() {
            var passwordInput = document.getElementById("passwordInput");
            var cPasswordInput = document.getElementById("cPasswordInput");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                cPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                cPasswordInput.type = "password";
            }
        }

        document.getElementById('lrnInput').addEventListener('input', function (e) {
            let value = e.target.value;
            e.target.value = value.replace(/\D/g, '');
        });
    </script>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+M
</body>
</html>