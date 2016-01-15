<div class="menu_mon">

<?php
$items = array(
	'基本情報' => 'profile_mon',
	'旅費計算' => 'cost_mon',
	'スケジュール' => 'schedule_mon',
	'給油距離' => 'mileage_mon'
);


print('<table>');
foreach ($items as $jap => $url) {
	print('<tr>');
	print(	'<td>');
	print(		'<a href="./index.php?detail_mon='.$url.'">'.$jap.'</a>');
	print(	'</td>');
	print('</tr>');
}
print('</table>');
?>


</div><!-- class="menu_mon" -->
