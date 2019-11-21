<style>
#countries {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#countries td, #countries th {
  border: 1px solid #ddd;
  padding: 8px;
}

#countries tr:nth-child(even){background-color: #f2f0f0;}

#countries tr:hover {background-color: #f5f5f5;}

#countries th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #008000;
  color: white;
}
</style>
<?php
$country = $_GET['country'];
$country = filter_var(htmlentities($country));


$host = getenv('IP');
$username = 'lab7_user';
$password = '';
$dbname = 'world';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} catch(Exception $e) {
    die($e->getMessages());
}

$stmt = $conn->query("SELECT * FROM countries");
$stmt2 = $conn->query("SELECT * FROM countries where name like '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo '<table id="countries">
<tr id="heading">
    <th>'."Name".'</th>
    <th>'."Continent".'</th>
    <th>'."Independence Year".'</th>
    <th>'."Head of State".'</th></tr>';


if($country == ""){
    foreach ($results as $row){ 
        echo '<tr>
        <td>'.$row['name']. '</td>
        <td>'.$row['continent'] .'</td>
        <td>'.$row['independence_year']. '</td>
        <td>'.$row['head_of_state'].'</td></tr>';
    }
}

else{
    foreach ($results2 as $row){ 
        echo '<tr><td>'.$row['name']. '</td>
        <td>'.$row['continent'] .'</td>
        <td>'.$row['independence_year']. '</td>
        <td>'.$row['head_of_state'].'</td></tr></br>';
    }
}
echo '</table>';