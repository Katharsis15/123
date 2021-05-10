<?php
require 'database.php';
$query = mysqli_query($db, "SELECT Distinct [name] FROM [author]");
mysqli_fetch_assoc($query);
echo $query ['name'];