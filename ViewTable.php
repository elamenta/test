<?php include 'View.php' ?>
<?php
$tablename =  $_POST['tablename'];

if($_POST['tablename'] == "desktops"){
    $sql = "SELECT * FROM desktops";
    $result = $con->query($sql);
    echo "$tablename";
}else if($_POST['tablename'] == "laptops"){
    $sql = "SELECT * FROM laptops";
    $result = $con->query($sql);
    echo "$tablename";
}else if($_POST['tablename'] == "tablets"){
    $sql = "SELECT * FROM tablets";
    $result = $con->query($sql);
    echo "$tablename";
}else if($_POST['tablename'] == "monitors"){
    $sql = "SELECT * FROM monitors";
    $result = $con->query($sql);
    echo "$tablename";
}else exit;

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\">"; // start a table tag in the HTML
    $col = "SHOW COLUMNS FROM desktops";
    $colnames = mysqli_query($con, $col);
    echo "<tr>";
    while ($row = mysqli_fetch_array($colnames)) {
        echo "<td>" . $row['Field'] ."</td>";

    }
    echo "</tr>";
    while ($row = mysqli_fetch_row($result)) {//Creates a loop to loop through results
        echo "<tr>";
        // $row is array foreach put every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "<td>$cell</td>";
        echo "</tr>";
    }
}
echo "</table>"; //Close the table in HTML
?>