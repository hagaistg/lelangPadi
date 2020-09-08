<?php
function getParam($name) {
	if (isset($_POST[$name]) ) {
		return $_POST[$name];
	} elseif (isset($_GET[$name]) ) {
		return $_GET[$name];
	} elseif ( isset($_GET[$name]) ) {
		return $_GET[$name];
	}
}

function setParam($name,$value) {
	$_POST[$name] = $value;
}

function setSessionParam($name,$value) {
		//session_register($name);
		$_SESSION[$name] = $value;
}

function getSessionParam($name) {
	if (!empty($_SESSION[$name]) ) {
	 return $_SESSION[$name];
	}
	return null;
}

?>