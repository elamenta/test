<?php include 'connect.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Template</title>
		<link type="text/css" rel="stylesheet" href="/css/temp.css" />
		<link type="text/css" rel="stylesheet" href="/css/temp_nav.css" />
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
	</head>
	<body>
		<div id="site_wrap">
			<!--  Header  -->
			<header id="header" class="main_color">
				<h2 id="header_title">BetterBuy: Largest electronics retailer in SOEN341</h2>
			</header>

			<!--  Content -->

			<div id="content_wrap">
				<nav id="nav" class="nav_color">
					<h2 id="nav_title">View Inventory</h2>
                    Table Names: desktops, laptops, tablets, monitors<br>
                    <form action="ViewTable.php" method="post">
                    <input type="text" name="tablename" placeholder="Enter Table Name"><br>
                    <input type="submit" value="Submit"><br><br><br>
                    </form>
                </nav>


    			<!-- Insert whatever php file with the content/navigation of the page here -->


<!--  Footer  -->
          <footer id="footer" class="main_color">
            <p id="footer_credit_title">Developers: </p>
             <ul id="footer_credit_list">
             <li>Aaron Yuchen Liang</li>
             <li>David Bechara</li>
             <li>Evan Lamenta</li>
             <li>Mae Anne De Vera</li>
             <li>Maher Hassassin</li>
                <li>Matthew Benchimol</li>
                </ul>
         </footer>
        </div>
        </div>
    </body>
</html>
