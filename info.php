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
    // displaying the isbn, author, title only
    for($j=0;$j<3;$j++){
        echo "<td>" .$row[$j] . "</td>";
    }
    echo "<td><input type='text' name='price' size='5' value='$row[3]' onchange='updatePrice($row[0], this.value)'></td>";
    echo "</tr>";
}
echo "</table>";
echo "</form>";

?>

<script>
function updatePrice(isbn, price){
    if(isbn=='' && price==''){
        // do nothing
    }
    else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // do something here;
                //alert(this.responseText);
            }
        };
        xmlhttp.open('GET', 'updateprice.php?isbn='+isbn+'&price='+price, true);
        xmlhttp.send();
    }
}
</script>
