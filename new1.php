<?php
require 'database.php';

$query = "SELECT author.name, COUNT(books.id) FROM books
INNER JOIN author ON author.id = books.author_id
Group By author.id
";

$result = mysqli_query($db, $query);
for ($i=0; $i < mysqli_num_rows($result);$i++) {
    $r  = mysqli_fetch_assoc($result);

    print_r($r);
}
?>

