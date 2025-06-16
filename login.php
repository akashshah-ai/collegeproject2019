<?php 

$username = "";
     $email = "";
     $password_1 = "";
     $password_2 = "";
     $errors = array();  
     
     session_start();
try{
     $con = new PDO ("mysql:host=localhost;dbname=login","root","");

       if(isset($_POST['submit'])) 
               {
                
                    $email = $_POST["email"];
                    $password_1 = $_POST["password_1"];

                 if (empty($email))
                  {
                     array_push($errors,"email is required");
                  }
                 if (empty($password_1)) 
                  {
                     array_push($errors,"password is required");
                  }
    

                 $select = $con->prepare("SELECT * FROM users WHERE email='$email' and password_1='$password_1'");
                 $select->setFetchMode(PDO::FETCH_ASSOC);

                $select->execute();
                $data=$select->fetch();

                    if($data==true)
                       {
                         header("location:citylocation.php");
                       }
                    else{
                          echo "Invalid email or password";
                        }
                }
    }
    catch(PDOException $e){
      echo "error".$e->getMessage();
    }
       
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="shortcut icon" href="video/dfhvahsvfajkgfkf.png">
	<link rel="stylesheet" type="text/css" href="css/regstyle.css">
</head>
<body>
    <div class="header">
    	<h2>Login</h2>
    </div>
    <form method="POST" action="">
    	<div class="input-group">
    		<label>Email</label>
            <input type="text" name="email">
    	
    		<div class="input-group">
    		<label>password</label>
            <input type="password" name="password_1">
            </div>
            
    		<div class="input-group">
            <div class="btn">
             <input type="submit" name="submit" value="Login">
            </div>
    	</div>
    	<p>
    		Not yet a member?<a href="register.php">Sign up</a>
    	</p>
    </form>
</body>
</html>