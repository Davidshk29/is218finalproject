 <style type="text/css">* {cursor: url(http://ani.cursors-4u.net/cursors/cur-13/cur1159.ani), url(http://ani.cursors-4u.net/cursors/cur-13/cur1159.png), auto !important;}</style><a href="http://www.cursors-4u.com/cursor/2018/06/09/hell-yeah-pointer-2.html" target="_blank" title="Hell Yeah Pointer 2"><img src="http://cur.cursors-4u.net/cursor.png" border="0" alt="Hell Yeah Pointer 2" style="position:absolute; top: 0px; right: 0px;" /></a>
<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=sql1.njit.edu;dbname=shk29', 'shk29', 'nAfD00f0J', $pdo_options);
      }
      return self::$instance;
    }
  }
?> 
<?php
		$connect= Db::getInstance();
		$query = "SELECT * FROM polls WHERE pollid='$pollid'";
		$q = mysqli_query($connect, $query);
		$pollid = $_GET['pollid'];
		while($row = mysqli_fetch_array($q)) {
			$id = $row[0];
			$title = $row[1];
			$pollid = $row[2];
			$ipaddress = $row[3];
				$questions = "SELECT * FROM questions WHERE pollid='$pollid'";
				$q2 = mysqli_query($questions);
				while($r = mysqli_fetch_array($q2)) {
				$question = $r[1];
				$votes = $r[2];
				$newvotes = $votes + 1;
				$ip = $_SERVER['REMOTE_ADDR'];
				$newipaddress = $ipaddress."$ip,";

				if (isset($_POST['vote'])) {
					$polloption = $_POST['polloption'];
					if ($polloption == "") {
						die("You didn't select an option.");
					} else {

							$ipaddresse = explode(",", $ipaddress);
							if (in_array($ip, $ipaddresse)) {
								die("You've already voted");
							} else {
						mysqli_query("UPDATE questions SET votes='$newvotes' WHERE pollid='$pollid' AND question='$polloption'");
						mysqli_query("UPDATE polls SET ipaddress='$newipaddress' WHERE pollid='$pollid'");
						die("You voted Successfully");
						}
					}
				}

				echo '<tr><td>'.$question.'</td><td><input type="radio" name="polloption" value="'.$question.'" /> '.$votes.' votes</td></tr>';
				}
		}