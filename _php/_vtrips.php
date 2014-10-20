<?php
include('_session.php');
$result = $pg->_pg_query('SELECT * FROM trips');
if(!$result) exit;
$rows = $pg->_pg_fetch_all($result);
$num_rows = $pg->_pg_num_rows($result);
print $num_rows;
//print_r($rows);
print '<table border=1>'
for($i=0;$i!=$num_rows;$i++){
	foreach(array_keys($rows[$i]) as $key) {
		print '<tr><td>';
		print $rows[$i][$key];
		print '</td><td>';
	}
}
print '</table>'
?>
