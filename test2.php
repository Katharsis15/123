<?php
require 'database.php';

$query = "SELECT books.*, author.name as t1, author.surname as t2 FROM books
INNER JOIN author ON books.author_id = author.id
INNER JOIN genres ON books.genre_id = genres.id";

$result = mysqli_query($db, $query);
for ($i=0; $i<mysqli_num_rows($result);$i++) {
    $r  = mysqli_fetch_assoc($result);

    echo $r;
}
