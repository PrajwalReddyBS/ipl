<html>
<head>
<style>
body {
color:white;
    background-image: url("black2.jpg");
}
table, th, td {
    border: 1px solid white;
}
table {
    border-collapse: collapse;
    width: 100%;
align:center;
}

th, td {
    text-align: left;
    padding: 10px;
}

tr:nth-child(all){background-color: black}
</style>
</head>
<body><b>
<h2 style align="center"><b>STANDINGS</h2>

</body>
</html>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "IPL");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "CALL get_stand";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        echo "<table>";
            echo "<tr>";
               echo "<th>RANK</th>";
                echo "<th>TEAM NAME</th>";
                echo "<th>CAPTAIN</th>";
                 echo "<th>POINTS</th>";

            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['rank'] . "</td>";
                echo "<td>" . $row['team_name'] . "</td>";
                echo "<td>" . $row['captain'] . "</td>";
                echo "<td>" . $row['points'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>