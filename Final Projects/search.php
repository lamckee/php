<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'mckee');
define('DB_PASSWORD', '572qnkuv24');
define('DB_NAME', 'mckee_dbtest');
if (isset($_GET['term'])){
	$return_arr = array();
	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";port=8889;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $conn->prepare('SELECT name FROM homes WHERE name LIKE :term');
	    $stmt2 = $conn->prepare('SELECT email FROM homes WHERE email LIKE :term');
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
	    $stmt2->execute(array('term' => '%'.$_GET['term'].'%'));
	    
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['name'];
	    }
	    while($row = $stmt2->fetch()) {
	        $return_arr[] =  $row['email'];
	    }
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
?>