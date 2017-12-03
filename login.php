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
                        <li><a href="index.php">Home</a></li>

                    </ul>
				</nav>
				
				<article id="content">
					<H1>Please enter your credentials:</H1>
					<form action = "" method = "post">
					Username:<br>
					<input type="email" name="email"> <br>
					Password:<br>
					<input type="password" name="input_password"><br><br>
					<input type="submit" value="Submit">  
					</form>


					
					<?php
						$records = array();
                    if (!empty($_POST)) {
                        $email = $_POST['email'];
                        $password = $_POST['input_password'];
                        $mytdg = new TDG();
                        $mytdg->TDG();
                        $_SESSION["logged_in"] = $mytdg->makeLogin($email, $password);

                        if ($_SESSION['logged_in']) {

                            $_SESSION["userID"] = $mytdg->getUserByEmail($email);
                            $_SESSION["userType"] = $mytdg->getUserTypeByID($_SESSION["userID"]);

                            switch ($_SESSION["userType"]) {
                                case 0:
                                    echo("<script>
                                            <!--
                                            location.replace('userHome.php')
                                            -->
                                            </script>");
                                    break;
                                case 1:

                                    echo("<script>
                                        <!--
                                        location.replace('adminHome.php')
                                         -->
                                         </script>");

                                    break;
                                default:
                                    echo("<script>
                                        <!--
                                        location.replace('index.php')
                                            -->
                                    </script>");

                            }
                        }else {
                            echo("<script>
                                alert('Wrong E-mail or Password. Try again.');
                                    <!--
                                        location.replace('index.php')
                                    -->
                                        </script>");
                        }
                    }
					?>
					
				</article>
    			
    			<!--  Footer  -->
    			<footer id="footer" class="main_color">


    			</footer>
			</div>
		</div>
	</body>
</html>