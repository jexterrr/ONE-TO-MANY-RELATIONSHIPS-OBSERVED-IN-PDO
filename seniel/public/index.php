<?php
// Include the database and developer class
include_once '../config/db.php';
include_once '../classes/Developer.php';

// Initialize the database and developer object
$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);

// Retrieve the list of developers
$stmt = $crud->read("appointments", "appointment_id");
$num = $stmt->rowCount();
?>

<!DOCTYPE html>
<html>

<head>
     <title>PET CARE SERVICE</title>
     <link rel="stylesheet" href="assets/style.css">
</head>

<body>
     <h1>PET CARE SERVICE</h1>

     <!-- Button to create a new developer -->
     <a href="create.php">Add Appointments</a><br><br>

     <?php
     // Check if there are records to display
     if ($num > 0) {
          echo "<table border='1'>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Pet Name</th>";
          echo "<th>Provider Name</th>";
          echo "<th>Service</th>";
          echo "<th>Appointment Date</th>";
          echo "</tr>";

          // Fetch and display each row
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               extract($row);

               echo "<tr>";
               echo "<td>{$appointment_id}</td>";
               echo "<td>{$pet_name}</td>";
               echo "<td>{$provider_name}</td>";
               echo "<td>{$service_type}</td>";
               echo "<td>{$appointment_date}</td>";
               echo "<td>";
               // Update and Delete buttons for each developer
               echo "<a href='update.php?id={$appointment_id}'>Edit</a> ";
               echo "<a href='delete.php?id={$appointment_id}' onclick=\"return confirm('Are you sure you want to delete this developer?');\">Delete</a>";
               echo "</td>";
               echo "</tr>";
          }

          echo "</table>";
     } else {
          // If no records found, display a message
          echo "<p>No Appointments found.</p>";
     }
     ?>
</body>

</html>