<?php  
include "../db/dbConn.php";

$sql = "SELECT * FROM mainte";


$result = mysqli_query($connection, $sql);

if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Project Name</th><th>Neighborhood</th><th>Piece Number</th><th>Unit Number</th><th>Floor Number</th><th>Date Contract</th><th>Type Request</th><th>Description</th><th>Image</th><th>User ID</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["ProjectName"] . "</td>";
    echo "<td>" . $row["Neighborhood"] . "</td>";
    echo "<td>" . $row["PieceNumber"] . "</td>";
    echo "<td>" . $row["UnitNumber"] . "</td>";
    echo "<td>" . $row["FloorNumber"] . "</td>";
    echo "<td>" . $row["DateContract"] . "</td>";
    echo "<td>" . $row["TypeRequest"] . "</td>";
    echo "<td>" . $row["Description"] . "</td>";
    // echo "<td><img src='" . $row["Img"] . "'></td>";
    $images = explode(",", $row["Img"]);
    foreach($images as $image) {
      echo "<img src='../users/uploads/" . $image . "'>";
    }
    echo "<td>" . $row["UserIDF"] . "</td>";
    echo "</tr>";
    // echo $row["Img"] . "<br>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

?>
   <?php 
    $images = explode(",", $row["Img"]);
    foreach ($images as $image) {
?>
    <img src="<?php echo '../users/uploads/' . $image; ?>">
<?php   
    }
?>      
<style>
    table {
  border-collapse: collapse;
  width: 900px;
  max-width: 2000px;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}



</style>