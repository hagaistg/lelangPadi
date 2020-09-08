<?php
    session_start();
    include_once('listFungsi.php');
    $db = doConnect();
	if (isset($_POST['id'])) {
		$id_lelang = $_POST['id'];
        $penawaran = $_POST['penawaran'];
        $id = $_SESSION['id'];
        $database = doConnect();
        $query = 'INSERT INTO penawaran(`padi_id_padi`, `user_id_user`,`harga_penawaran` ) VALUES(?, ?, ?)';
        $statement = $database->prepare($query);
        $statement->bind_param('iid', $id_lelang, $id,$penawaran);
        $statement->execute();
		header("Location: detail_lelang.php?id=". $id_lelang . "");
	}
 