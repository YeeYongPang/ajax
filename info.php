<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die ("Fatal Error");

$query = "SELECT * FROM catalogs";
$result = $conn->query($query);
$rows = $result->num_rows;

echo <<<_TABLE
<h2>Ajax Example</h2>
<form action='' method='post'>
<table border='1'>
<tr>
<th>No.</th>
<th>ISBN</th>
<th>Author</th>
<th>Title</th>
<th>Price</th>
</tr>

_TABLE;
for($i=0; $i<$rows; $i++){
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo "<tr><td>" .($i+1). "</td>";
    for($j=0;$j<4;$j++){
        echo "<td>" .$row[$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</form>";


?>