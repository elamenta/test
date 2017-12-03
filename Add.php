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
		<title> Ad Form</title>
	</head>
	<body>
		<div id="site_wrap">

            <nav id="nav" class="nav_color">
                <h2 id="nav_title">Menu</h2>
                <ul id="nav_list">
                    <li class="active_class"><a href="index.php">Login</a></li>
                    <li><a href="userHome.php">Home</a></li>

                </ul>
            </nav>
			<!--  Header  -->
			<header id="header" class="main_color">
                <h2 id="header_title">Required Information Form</h2>
			</header>

			<!--  Content -->
            <?php
            $mytdg = new TDG();

            //check for membership
            if(!$mytdg->checkMembership($_SESSION["userID"])){
                echo("<script>
                    window.location.replace('userHome.php')
                     </script>");
            }


            if(!empty($_POST["Categories"])) {
                $string = $_POST['Categories'];
                $pieces = explode(",", $string);
                $category = $pieces[0];
                $subcategory = $pieces[1];

                echo $category;
                echo "<br>";
                echo $subcategory;
                echo "<br>";


            ?>
            <div id="content_wrap">

                <article id="content">
                    <form class="form_section main_color" method="post" action="">
                        <fieldset>

                            <table class="results_table">
                                <tr>
                                    <td>Price</td>
                                    <td><input type="text" name="Price" required></td>
                                </tr>
                                <br/>
                                <tr>
                                    <td>Availability</td>
                                    <td><select name="Availability">
                                            <option value="Weekdays">Online</option>
                                            <option value="Weekends">Store</option>
                                        </select>
                                    </td>
                                </tr>
                                <br/>
                                <tr>
                                    <td>Contact Information</td>
                                    <td><input type="text" name="contact" required></td>
                                </tr>
                                <br/>
                                <tr>
                                    <td>ForSaleBy</td>
                                    <td><input type="text" name="ForSaleBy" required></td>
                                </tr>
                                <tr>
                                    <td>AdType</td>
                                    <td><select name="AdType">
                                            <option value="Sell">Sell</option>
                                            <option value="Buy">Buy</option>
                                        </select>
                                    </td>

                                </tr>
                                <br/>
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" name="Title" required></td>
                                </tr>

                                <tr>
                                    <td>Description</td>
                                    <td><input type="text" name="Description" required></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><input type="text" name="image" required></td>
                                </tr>

                            <tr>

                            </tr>
                            </table>


                        <?php
                        echo "<input type='hidden' name='Category' value = '$category'>";
                        echo "<input type='hidden' name='SubCategory' value = '$subcategory'>";
                        ?>
                        <input type="submit" name="Submit Ad" value="Add">
                        </fieldset>
                </article>

                <?php
            }
                if (!empty($_POST['Price'])) {
                    $mytdg = new TDG();
                    $mytdg->TDG();


                    //data from form
                    $Price = $_POST['Price'];
                    $contact = $_POST['contact'];

                    $ForSaleBy = $_POST['ForSaleBy'];
                    $Category = $_POST['Category'];
                    $SubCategory = $_POST['SubCategory'];
                    $AdType = $_POST['AdType'];
                    $Title = $_POST['Title'];
                    $image = $_POST['image'];
                    $Description = $_POST['Description'];
                    $availability = $_POST['Availability'];
                    $userid = $_SESSION['userID'];
                    $postDate = date("Y/m/d");

                    $prov = $mytdg->getUserProvince($userid);
                    $city = $mytdg->getUserCity($userid);

                    echo $Category;
                    echo "<br>";
                    echo $SubCategory;
                    echo "<br>";

                    //add into database
                    $mytdg->insertAd($contact, $Price, $ForSaleBy, $availability, $Title, $Description, $image, $Category, $SubCategory, $userid, $postDate, $prov, $city, $AdType);
                }

                ?>
    			<!--  Footer  -->
    			<footer id="footer" class="main_color">

    			</footer>
			</div>
		</div>
	</body>
</html>