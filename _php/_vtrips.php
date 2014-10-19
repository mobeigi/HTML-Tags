<?php
include('_session.php');
$result = $pg->_pg_query('SELECT * FROM trips');
if(!$result) print 'something went wrong';
$rows = $pg->_pg_fetch_all($result);
$num_rows = $pg->_pg_num_rows($result);
print $num_rows;
print_r($rows);
	
for($i=0;$i!=$num_rows;$i++){
	print '<tr><td>';
	print $row[$i]['name'];
	print '</td><td>'
	print $row[$i]['description'];
	print '</td><td>'
	print $row[$i]['privacy'];
	print '</td></tr>'
}
?>
