 <!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','hotel');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM reservation  ORDER BY appointment";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>ID</th>
<th>UserID</th>
<th>CheckIn</th>
<th>CheckOut</th>
<th>isApproved</th>
<th>isDeletes</th>
<th>Appointment</th>
<th>Staying</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['userID'] . "</td>";
    echo "<td>" . $row['checkIn'] . "</td>";
    echo "<td>" . $row['checkOut'] . "</td>";
    echo "<td>" . $row['isApproved'] . "</td>";
    echo "<td>" . $row['isDeleted'] . "</td>";
    echo "<td>" . $row['appointment'] . "</td>";
    echo "<td>" . $row['staying'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
