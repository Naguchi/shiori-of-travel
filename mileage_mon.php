<?php require_once( $bh ); ?>

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
			<? for( $i=1; $i<=30; $i++ ){ ?>
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
		if (road == 1) {
			fuel_efficiency = $("#fuel_efficiency").val() * 1.2;
		} else {
			fuel_efficiency = $("#fuel_efficiency").val();
		}

		mileage = tank * fuel_efficiency;
		refuel = ((tank-1) * (fuel_efficiency *0.8)) * 0.8;

		alert("あなたのマシンは最大で"+mileage+"km走ります。\n"+refuel+"kmで給油してください。");
	});
});
</script>
