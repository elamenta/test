
<?php
session_start();
require_once 'security.php';
if(!$_SESSION['logged_in']){
header("Location: index.php");
}
require_once 'TDG.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>UserHome</title>

	</head>
	<body>
		<div id="site_wrap">
			<!--  Header  -->
			<header id="header" class="main_color">
				<h2 id="header_title">Welcome USER! </h2>
			</header>

			<!--  Content -->
            <!-- Insert whatever php file with the content/navigation of the page here -->
			<div id="content_wrap">
				<nav id="nav" class="nav_color">
					<h2 id="nav_title">Menu</h2>
					<ul id="nav_list">
						<li class="active_class"><a href="index.php">Login</a></li>
						<li><a href="userHome.php">Home</a></li>
                        <li><a href="ViewUserAds.php">View your ads - promote</a></li>
                        <li><a href="buyMembership.php">Buy Membership</a></li>

					</ul>
				</nav>


    			<article id="content">

                 <?php

                        $mytdg = new TDG();

                         $tablename = "SubCategory";
                         $result = array();
                         $result = $mytdg->selectTable($tablename);
                         //$colnames = $mytdg->getcolname($tablename);
                         ?>
                         <h2 id="nav_title">Select Category to Post an Ad</h2>
                         <form action="Add.php" method="post">
                             <select name="Categories" >
                                 <?php
                                 $lengthrow = count($result);
                                 //loop through array and print each [row][column]
                                 for ($i = 0; $i < $lengthrow; $i++) {
                                        $string = $result[$i][0]. "," . $result[$i][1];
                                        //$string[1] = $result[$i][1];
                                     echo "<option value='$string'>" . $result[$i][0] . "-" . $result[$i][1] . "</option>";

                                 }

                                 ?>

                             </select>
                             <input type="submit" value="Post Ad" />
                         </form>

                    <h2 id="nav_title">Select Category to Browse</h2>
                    <form action="Add.php" method="post">
                        <select name="Categories" >
                            <?php
                            $lengthrow = count($result);
                            //loop through array and print each [row][column]
                            for ($i = 0; $i < $lengthrow; $i++) {
                                $string = $result[$i][0]. "," . $result[$i][1];
                                //$string[1] = $result[$i][1];
                                echo "<option value='$string'>" . $result[$i][0] . "-" . $result[$i][1] . "</option>";

                            }

                            ?>

                        </select>
                        <input type="submit" value="View Ads" />
                    </form>



                </article>

<!--  Footer  -->
<footer id="footer" class="main_color">

</footer>
</div>
</div>
</body>
</html>
