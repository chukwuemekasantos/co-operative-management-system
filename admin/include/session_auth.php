
<?php

if (!isset($_SESSION['admin'])) {
	header('location:../signin.php');
}

?>