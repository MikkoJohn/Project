
<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=thesis_db', 'root', '');

$data = array();

$query = "SELECT * FROM job_ticket ORDER BY ticket_no";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["ticket_no"],
  'title'   => $row["proj_name"],
  'start'   => $row["start"],
  'end'   => $row["finish"]
 );
}

echo json_encode($data);

?>