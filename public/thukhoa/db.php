<?php
define('DB_HOST','10.0.0.181');
define('DB_USER','thukhoa');
define('DB_PASS','dmcB4ZMzUWqUWqsc');
define('DB_NAME','thukhoa');
$link = mysql_connect(DB_HOST, DB_USER,DB_PASS);
mysql_select_db(DB_NAME, $link) or die('Could not select database.');
mysql_set_charset('utf8');
?> 