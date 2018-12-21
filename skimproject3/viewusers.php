<form>
<?php
$servername = "sql2.njit.edu";
$username = "shk29";
$password = "nAfD00f0J";
$dbname = "shk29";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM todos";
$result = $conn->query($sql);

echo "<center><h1 display: block;
  font-size: 2em;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 0;
  margin-right: 0;
  font-weight: bold;>ALL USERS</h1></center>";

  if ($result->num_rows > 0) {
echo "<center><table border=\"4  \" ><tr><th>ID</th><th>email</th><th>Date Create</th><th>Question</th><th>Answer</th><th>Skills</th></tr>";

while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row['id'] . "</td>
<td>" . $row['email'] . "</td>
<td>" . $row['duedate'] . "</td>
<td>" . $row['message'] . "</td>
<td>" . $row['messagea'] . "</td>
<td>" . $row['messageb'] . "</td>
</tr>";
}
echo "</table></center>";
}

$conn->close();
?>
<style type="text/css">* {cursor: url(http://ani.cursors-4u.net/cursors/cur-13/cur1159.ani), url(http://ani.cursors-4u.net/cursors/cur-13/cur1159.png), auto !important;}</style><a href="http://www.cursors-4u.com/cursor/2018/06/09/hell-yeah-pointer-2.html" target="_blank" title="Hell Yeah Pointer 2"><img src="http://cur.cursors-4u.net/cursor.png" border="0" alt="Hell Yeah Pointer 2" style="position:absolute; top: 0px; right: 0px;" /></a>
    <center><a href="login.php" class="txt2">
          Logout
    </a></center>
		<br>
	<center><a href="index.php"class="txt2">
        back to user
    </a></center>
	<br>
	<center><a class="txt2">
        View all
    </a></center>
	<br>
	<center><a href="viewallbydates.php" class="txt2">
          View All By date
    </a></center>
	<br>
	<center><a href="viewemails.php" class="txt2">
         View by email
    </a></center>
</form>