
<?php
error_reporting(E_ALL);//when the work is done, the argument should be changed to 0
require_once 'security.php';
session_start();
require_once 'TDG.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/signupstyle.css">
</head>
<body>
<div id="site_wrap">
    <!--  Header  -->
    <header id="header" class="main_color">
        <h2 id="header_title">Comp353</h2>
    </header>

    <!--  Content -->
    <div id="content_wrap">
        <nav id="nav" class="nav_color">
            <h2 id="nav_title">Menu</h2>
            <ul id="nav_list">
                <li><a href="index.php">Login</a></li>

            </ul>
        </nav>


<h2>Signup Form</h2>
        <article id="content">
<form action="" method="post" style="border:1px solid #ccc" >
  <div class="container">

      <label><b>Select Province and City</b></label>
      <br>
      <select name="place">
          <option value="1">Quebec,Montreal</option>
          <option value="2">Ontario,Toronto</option>
          <option value="3">Ontario,Ottawa</option>
          <option value="4">Quebec,Sherbrooke</option>
      </select><br><br>
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required>

      <label><b>FirstName</b></label>
      <input type="text" placeholder="Enter First Name" name="FirstName" required>

      <label><b>LastName</b></label>
      <input type="text" placeholder="Enter Last Name" name="LastName" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Pass" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="Pass_repeat" required>



    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>



            <?php

            if (!empty($_POST)) {//check if the form isn't empty,
                $Email =$_POST['Email'];
                $FirstName =$_POST['FirstName'];
                $LastName = $_POST['LastName'];
                $Pass= $_POST['Pass'];
                $Pass_repeat= $_POST['Pass_repeat'];
                $prov = "";
                $city = "";
                if ($_POST['place'] == "1") {
                    $prov = "Quebec";
                    $city = "Montreal";
                }
                if ($_POST['place'] == "2") {
                    $prov = "Ontario";
                    $city = "Toronto";
                }
                if ($_POST['place'] == "3") {
                    $prov = "Ontario";
                    $city = "Ottawa";
                }
                if ($_POST['place'] == "4") {
                    $prov = "Quebec";
                    $city = "Sherbrooke";
                }


               // check if passwords match
                if($Pass == $Pass_repeat) {
                    $mytdg = new TDG();
                    $mytdg->TDG();
                        //check that the email is not already in use
                        //$quer = 'SELECT Email FROM Users WHERE Email="'.$Email.'"';
                        //$result = $con->query("$quer");
                        //$result = $con->query("SELECT Email FROM Users WHERE email = '".$Email."';");
                        $result = $mytdg->email_used($Email);
                    //printf( mysqli_num_rows($result));
                        if (!$result){
                            //$sql='INSERT INTO Users VALUES ("'.$Email.'","'.$FirstName.'","'.$LastName.'",'.$user.',"'.$Pass.'")';
                            if ($mytdg->insert_user($Email,$FirstName,$LastName,$Pass,$prov,$city)) {


                                $_SESSION["logged_in"] = true;
                                $_SESSION["userType"] = 0;

                                switch ($_SESSION["userType"]) {
                                    case 0:
                                        header('Location: index.php');
                                        break;
                                    case 1:
                                        header('Location: index.php');
                                        break;
                                    default:
                                        header('Location: index.php');
                                }
                            }
                        }
                        else {
                            echo "Sorry, this email is already in use!";
                        }
                    }
                    else {
                        echo "Sorry, the passwords don't match!";
                    }
                }

            ?>

        </article>


</body>
</html>