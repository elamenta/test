
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Inventory Ads</title>

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
                <select name="tablename">
                    <option value="Ads">Ads</option>
                    <option value="Users">Users</option>
                </select>

                <input type="submit" value="Submit">
            </form>
        </article>
        <!-- Insert whatever php file with the content/navigation of the page here -->


        <!--  Footer  -->
        <footer id="footer" class="main_color">

        </footer>
    </div>
</div>
</body>
</html>