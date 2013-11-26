<?php
function sanitize($input) {
	trim($input);
	return mysql_real_escape_string($input);
}
?>