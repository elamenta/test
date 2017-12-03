<?php 
require_once 'TDG.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> View Inventory Ads</title>

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

    </header>

    <!--  Content -->

    <div id="content_wrap">
        <nav id="nav" class="nav_color">
            <h2 id="nav_title">Menu</h2>
            <ul id="nav_list">
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>

        <article id="content">
            <h2 id="nav_title">View Ads</h2>
            <form action="ViewTable.php" method="post">

            </form>
        </article>
        <!-- Insert whatever php file with the content/navigation of the page here -->
        <?php
        $tablename =  $_POST['tablename'];
        if($_POST['tablename'] == "Ads"){
            //$sql = "SELECT * FROM Ad";
            $mytdg = new TDG();
            $reslist = $mytdg->selectTable("ad");
            $rescolnames = $mytdg->getcolname("ad");
            echo "Ad";
        }else
            if($_POST['tablename'] == "Users"){
                $mytdg = new TDG();
                $reslist = $mytdg->selectTable("user");
                $rescolnames = $mytdg->getcolname("user");
            echo "Users";
        }else exit;
        if (true) {
            // output data of each row
            echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\">"; // start a table tag in the HTML

           // $colnames = mysqli_query($con, $col);
            echo "<tr>";
            for($i=0;$i<sizeof($rescolnames);$i++){
                echo "<td>" . $rescolnames[$i] ."</td>";
            }
            echo "</tr>";

            
            
            for($i=0;$i<sizeof($reslist);$i++) {//Creates a loop to loop through results
                echo "<tr>";
                for($j=0;$j<sizeof($reslist[$i]);$j++)
                    echo "<td>".$reslist[$i][$j]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>"; //Close the table in HTML
        ?>

        <!--  Footer  -->

    </div>
</div>
</body>
</html>