<?php
$array = ['ha noi', 'nam dinh'];
$sql = "SELECT * FROM fiberbox WHERE field LIKE 'thai nguyen'"; 
foreach ($array as $value) {
	$sql.='OR field LIKE ' .$value. '';
}
echo $sql;	
                          // OR field LIKE '%1938 '
                          // OR field LIKE '%1940 % test';  