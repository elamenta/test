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
    <title>Buy Membership</title>

</head>
<body>
<div id="site_wrap">
    <!--  Header  -->
    <header id="header" class="main_color">
        <h2 id="header_title">Buy Membership </h2>
    </header>

    <!--  Content -->
    <!-- Insert whatever php file with the content/navigation of the page here -->
    <div id="content_wrap">
        <nav id="nav" class="nav_color">
            <h2 id="nav_title">Menu</h2>
            <ul id="nav_list">
                <li class="active_class"><a href="index.php">Login</a></li>
                <li><a href="ViewUserAds.php">View your ads</a></li>
                <li><a href="userHome.php">Home</a></li>
            </ul>
        </nav>

        <?php
        $mytdg = new TDG();

        //check for membership
        if($mytdg->checkMembership($_SESSION["userID"])){
            echo '<script type="text/javascript">alert("You already have a membership!");</script>';
            echo("<script>
                    window.location.replace('userHome.php')
                     </script>");
        }

        ?>

        <article id="content">
            <!-- <?#php require('...'); ?> -->


            <form action="" method="post" style="border:1px solid #ccc" >
                <div class="container">

                    <label><b>Select Membership Plan</b></label>
                    <br>
                    <select name="plan">
                        <option value="normal">Normal - 10$ - 7Days</option>
                        <option value="silver">Silver - 25$ - 14Days</option>
                        <option value="premium">Premium - 50$ - 30Days</option>
                    </select><br><br>

                    <label><b>Credit Card Number</b></label>
                    <input type="text" placeholder="Enter Credit card number" name="cardnumber" required>

                    <div class="clearfix">
                        <button type="submit" class="submit">Make Payment</button>
                    </div>
                </div>
            </form>

        </article>

        <?php
        if(!empty($_POST)){
            $mytdg = new TDG();

            $userid = $_SESSION['userID'];
            $plan = $_POST['plan'];
            $cardnumber = $_POST['cardnumber'];
            $amount = -1;
            if($_POST['plan'] == "normal"){$amount = 10;}
            if($_POST['plan'] == "silver"){$amount = 25;}
            if($_POST['plan'] == "premium"){$amount = 50;}
            $dateofpayment = date("Y/m/d");

            $mytdg->makeMembershipPayment($userid,$plan,$cardnumber,$amount,$dateofpayment);



        }


        ?>

        <!--  Footer  -->
        <footer id="footer" class="main_color">

        </footer>
    </div>
</div>
</body>
</html>