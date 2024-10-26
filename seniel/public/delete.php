<?php
// Include the database and Developer class
include_once '../config/db.php';
include_once '../classes/Developer.php';

// Initialize the database and developer object
$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);

// Get ID of the developer to be deleted
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Appointment ID not found.');

// Set developer ID
$crud->id = $id;

// Delete the developer
if ($crud->delete()) {
     echo "<div>Appointment was deleted.</div>";
} else {
     echo "<div>Unable to delete Appointment.</div>";
}
?>

<br>
<a href="index.php">Back to List</a>