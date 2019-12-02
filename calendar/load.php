
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

$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>