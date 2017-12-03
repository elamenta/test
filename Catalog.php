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
    <title>Catalog</title>

</head>
<body>
<div id="site_wrap">
    <!--  Header  -->
    <header id="header" class="main_color">
        <h2 id="header_title">Catalog </h2>
    </header>

    <!--  Content -->
    <!-- Insert whatever php file with the content/navigation of the page here -->
    <div id="content_wrap">
        <nav id="nav" class="nav_color">
            <h2 id="nav_title">Menu</h2>
            <ul id="nav_list">
                <li class="active_class"><a href="index.php">Login</a></li>
                <li><a href="userHome.php">Home</a></li>
            </ul>
        </nav>


        <article id="content">
            <!-- <?#php require('...'); ?> -->
        </article>

        <!--  Footer  -->
        <footer id="footer" class="main_color">

        </footer>
    </div>
</div>
</body>
</html>
