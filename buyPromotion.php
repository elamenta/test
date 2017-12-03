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
                <li><a href="userHome.php">Home</a></li>
                <li><a href="ViewUserAds.php">View your ads</a></li>
            </ul>
        </nav>

        <?php
        $mytdg = new TDG();

        //check for promotion
        if($mytdg->checkPromotion($_SESSION["userID"],$_POST['adid'])){
            echo("<script>
                    window.location.replace('ViewUserAds.php')
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
                        <option value="normal">7Days 10$</option>
                        <option value="silver">30Days 50$</option>
                        <option value="premium">60Days 90$</option>
                    </select><br><br>

                    <label><b>Credit Card Number</b></label>
                    <input type="text" placeholder="Enter Credit card number" name="cardnumber" required>
                    <input type="hidden" name="adid" value="<?php echo $_POST['adid']; ?>">

                    <div class="clearfix">
                        <button type="submit" class="submit">Make Payment</button>
                    </div>
                </div>
            </form>

        </article>

        <?php
        if(!empty($_POST['cardnumber'])){
            $mytdg = new TDG();


            $userid = $_SESSION['userID'];
            $adid = $_POST['adid'];

            $plan = $_POST['plan'];
            $cardnumber = $_POST['cardnumber'];
            $amount = 0;
            $promodays = 0;
            if($_POST['plan'] == "normal"){$amount = 10;$promodays = 7;}
            if($_POST['plan'] == "silver"){$amount = 50;$promodays = 30;}
            if($_POST['plan'] == "premium"){$amount = 90;$promodays = 60;}
            $dateofpayment = date("Y/m/d");

            $mytdg->insertPromotionPayment($userid,$adid,$promodays,$cardnumber,$amount,$dateofpayment);
        }


        ?>

        <!--  Footer  -->
        <footer id="footer" class="main_color">

        </footer>
    </div>
</div>
</body>
</html>