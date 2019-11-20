<?php
$country = $_GET['country'];
$country = filter_var(htmlentities($country), FILTER_SANITIZE_STRING);

$all = $_GET['all'];
$all = filter_var($all, FILTER_VALIDATE_BOOLEAN);

$host = getenv('IP');
$username = 'lab7_user';
$password = 'Ricketts12';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if($all == true){
    $stmt = $conn->query("SELECT * FROM countries");
}else if($all == false){
    $stmt = $conn->query("SELECT * FROM countries where name like '%$country%'");
}
$sql = "SELECT name, continent, independence_year, head_of_state FROM countries";
$result = $conn->query($sql);

echo "<table border='1'>
    <tr>
    <th>  Name  </th>
    <th>  Continent  </th>
    <th>  Independence  </th>
    <th>  Head of State  </th>
    </tr>";


if (trim($country) == "" and $all == false){
    if ($result -> fetchColumn() > 0){
        foreach($result as $row){ 
           echo "<tr>";
           echo "<td>". $row["name"] . "</td>";
           echo "<td>". $row["continent"] . "</td>";
           echo "<td>". $row["independence_year"] . "</td> " ;
           echo "<td>". $row["head_of_state"] . "</td>";
           echo "</tr>";
        }
        echo "</table>";
    }
    //$conn -> close();
    //foreach (O as $row){
       // echo '<td>', $row['name'], '</td>
    //   //     <td>', $row['head_of_state'], '</td>';
    //}
}

//echo '</tr></table>';
