<?php include('./requireLogin.include.php');?>
<?php include('./header.include.php');?>

      <table width="100%" border=0 cellpadding=1 cellspacing=2 >
<thead class="top">
<tr bgcolor="#990000">
	<td colspan="8" align="center">Monitors</td>
</tr>
</thead>

<tr class="sub">
<td align=center>Monitor</td>
<td align=center>Plugin</td>
<td align=center>Frequency</td>
<td align=center>Status</td>
<td align=center>Last Run</td>
<td align=center>Last Error</td>
<td align=center>Active</td>
<td align=center>Reports</td>
</tr>
<tbody class="grey">
<?php
$mysql = new MySQL();
$rs = $mysql->runQuery("
select *
from monitors m
order by active, name;
");
while($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
?>
<tr bgcolor="#dddddd">
<td align="left">&nbsp;&nbsp;<a href="setupMonitor.php?id=<?php echo($row['id']);?>"><?php echo($row['name']);?></a></td>
<td align="left">&nbsp;&nbsp;<?php echo($row['pluginType']);?></td>
<td align="left">&nbsp;&nbsp;<?php echo($row['frequency']);?></td>
<td align="left">&nbsp;&nbsp;<span class="<?php if($row['currentStatus']==1){echo('green');}else{echo('red');}?>"><?php if($row['currentStatus']==1){echo('OK');}else{echo('ERROR');}?></span></td>
<td align="left">&nbsp;&nbsp;<?php echo($row['lastRun'])?></td>
<td align="left">&nbsp;&nbsp;<?php echo($row['lastError'])?></td>
<td align="left">&nbsp;&nbsp;<span class="<?php if($row['active']==1){echo('green');}else{echo('red');}?>"><?php if($row['active']==1){echo('Yes');}else{echo('No');}?></span></td>
<td align="center"><a href="monitorLog.php?id=<?php echo($row['id']);?>">Log</a></td>
</tr>
<?
}
mysql_free_result($rs);
?>
</tbody>
<tfoot class="footer">
<tr bgcolor="#990000">
<td colspan="8" align="center"><?php echo(date("F j, Y, g:i a"));?></td>
</tr>
</tfoot>
</table>

<?php include('./footer.include.php');?>