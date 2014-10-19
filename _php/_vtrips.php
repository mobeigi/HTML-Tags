<?php
include('_session.php');
$result = $pg->_pg_query('SELECT * FROM trips');
if(!$result) print 'something went wrong';
$rows = $pg->_pg_fetch_all($result);
$num_rows = $pg->_pg_num_rows($result);
print $num_rows;
print '<table border=0 margin=0><tr>';
print '<td>name</td>';
print '<td>desc</td>';
print '<td>privacy</td>';
for($i = 0; $i != $num_rows; $i++) {
	print "<tr>";
	print "<td>$rows[$i][0]</td>";
	print "<td>$rows[$i][1]</td>";
	print "<td>$rows[$i][2]</td>";
	print "</td>";
}
print '</tr></table>';
?>
