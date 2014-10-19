<?php
include('_session.php');
$result = $pg->_pg_query('SELECT * FROM trips');
$rows = $pg->_pg_fetch_all($result);
print '<table><tr>';
print '<td>name</td>';
print '<td>desc</td>';
print '<td>privacy</td>';
foreach ($rows as $i) {
	print "<tr>";
	print "<td>$row[$i][0]</td>";
	print "<td>$row[$i][1]</td>";
	print "<td>$row[$i][2]</td>";
	print "</td>";
}
print '</tr></table>';
?>
