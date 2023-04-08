<?php

require("../model/pdo.php");
$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h4><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
echo "<h1>" . $row['name'] . "</h1>";
echo "<h2>" . $row['date_comment'] . "</h2></br></br>";
echo "<h3>" . $row['content'] . "</h3>";
echo "</div>";
}
mysqli_close($con);


?>