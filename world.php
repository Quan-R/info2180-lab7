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
}
else if($all == false){
    $stmt = $conn->query("SELECT * FROM countries where name like '%$country%'");
}
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
echo '<ul>';
if (trim ($country) == "" and $all == false){
    foreach ($results as $row){ 
      echo '<li>'.$row['name'] . ' is ruled by ' . $row['head_of_state'].'</li>';
    }
}


echo '</ul>';