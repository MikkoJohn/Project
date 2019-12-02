<?php

//insert.php
 session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];

$connect = new PDO('mysql:host=localhost;dbname=thesis_db', 'root', '');

if(isset($_POST["title"]))
{

 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>