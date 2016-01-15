<?php require_once( $bh ); ?>

<br>
このページはマシンの巡行距離および給油のタイミングを試算するものです。<br>
式は以下のとおりとなっております。<br><br>
◆タンク容量から１リットル引き</br>
◆高速巡行燃費の８割<br>
◆上記2点を乗算し、その値の８割の距離<br><br>

<fieldset><legend>目安給油距離計算</legend>
<table>
	<tr>
		<th> <p>マシン</p> </th>
		<td> <select id="machine">
			<option value="1">バイク</option>
			<option value="2">クルマ</option>
 		</select> </td>
	</tr>
	<tr>
		<th> <p>タンク容量</p> </th>
		<td> <select id="tank">
			<? for( $i=1; $i<=25; $i++ ){ ?>
			<option value="<?php echo $i ?>"><?php echo $i ?> リットル</option>
			<?php } ?>
			<? for( $i=30; $i<=100; $i+=5 ){ ?>
			<option value="<?php echo $i ?>"><?php echo $i ?> リットル</option>
			<?php } ?>
 		</select> </td>
	</tr>
	<tr>
		<th> <p>道路</p> </th>
		<td> <select id="road">
			<option value="1">一般道路</option>
			<option value="2">高速道路</option>
 		</select> </td>
	</tr>
	<tr>
		<th> <p>燃費</p> </th>
		<td> <select id="fuel_efficiency">
			<? for( $i=1; $i<=45; $i++ ){ ?>
			<option value="<?php echo $i ?>"><?php echo $i ?> km/L</option>
			<?php } ?>
 		</select> </td>
	</tr>
	<tr>
		<th></th>
		<td><input type="submit" id="submit" value="巡行距離の試算"></td>
	</tr>
</table>
</fieldset>


<script type="text/javascript">
$(document).ready(function(){
	$("#submit").click(function(){
		tank = $("#tank").val();
		road = $("#road").val();
		fuel_efficiency = $("#fuel_efficiency").val();
    /*
		if (road == 1) {
			fuel_efficiency = $("#fuel_efficiency").val() * 1.25;
		} else {
			fuel_efficiency = $("#fuel_efficiency").val();
		}
    */

    local_fuel_efficiency   = fuel_efficiency * (road == 1 ? 1 : 0.8);
    highway_fuel_efficiency = fuel_efficiency * (road == 1 ? 1.25 : 1);
		local_mileage   = tank * local_fuel_efficiency;
		highway_mileage = tank * highway_fuel_efficiency;
		local_refuel    = ((tank-1) * (local_fuel_efficiency *0.8)) * 0.8;
		highway_refuel  = ((tank-1) * (highway_fuel_efficiency *0.8)) * 0.8;

		alert("あなたのマシンは一般道路を移動時、\n最大走行距離は "+local_mileage+" km、\n給油目安距離は "+local_refuel+" kmです。");
		alert("あなたのマシンは高速道路を移動時、\n最大走行距離で "+highway_mileage+" km、\n給油目安距離は "+highway_refuel+" kmです。");
	});
});
</script>
