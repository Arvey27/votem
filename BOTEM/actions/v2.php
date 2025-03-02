<?php 

    session_start();
    include('connect.php');

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);

		if(!empty($username) && !empty($password))
		{

			//read from database
			$query = "select * from `userdata` where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: ../partials/dashboard.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP VOTING SYSTEM</title>

    <!-- Bootstrap css link -->
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  </body>
</html>

</head>
<body class= "bg-dark">
    <h1 class= "text-info text-center p-4">Voting System</h1>
    <div class="bg-info py-4">
        <h2 class="text-center">Login V2</h2>
         <div class="container text-center">
            <form method="POST">
              <div class="mb-3">
                <input type="text" class="form-control w-50 m-auto"
                 name="username" placeholder="Enter your username"
                  required="required">
                     </div>      
                     <div class="mb-3">
                     <input type="text" class="form-control w-50 m-auto"
                     name="mobile number" placeholder="Enter your mobile number"
                     required="required" maxLength="10" minLength="10">
                     </div>
                     <div class="mb-3">
                     <input type="password" class="form-control w-50 m-auto"
                     name="password" placeholder="Enter your password"
                     required="required"> 
                     </div> 
                     <div class="mb-3">
                     <select name="std" class="form-select w-50 m-auto">
                    <option value="group">Group</option>
                    <option value="voter">Voter</option>
                </select>
             </div>
             <button type="submit" class="btn btn-dark my-4">Login</button>
             <p>Don't have an account? <a href="./partials/registration.php" class="text-white"> Register here</a></p>         
          </form>
        </div>
      </div>
</body>
</html>
