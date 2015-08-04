<?php require_once( $bh ); ?>

<fieldset><legend>参加人数</legend>
<form name="member" onsubmit="return false;">
<table>
<tr>
    <th>参加人数</th>
	<td>
 		<select name="member" onchange="onMember( value )">
<?  // 参加者として20人分を表示
for( $i=1; $i<=20; $i++ ){ ?>
            <option value="<?php print $i; ?>"<?php if(isset($_GET['member']) && $_GET['member'] == $i) print 'selected' ?>><?php print $i; ?>人</option>
<?php } ?>
 		</select>
	</td>
</tr>
</table>
</form>
</fieldset>


<fieldset><legend>車両価格</legend>
<form name="car_cost" onsubmit="return false;">
<table>
<tr>
	<a target="_blank" href="http://www.2525r.com">レンタカー予約サイト(ニコニコレンタカー)</a>
</tr
<tr>
	<th>車両レンタル料</th>
	<td>
		<input type="text" id="car" value="<? if(isset($_GET['car'])) print $_GET['car'] ?>" onkeyup="onCar( value );">
	</td>
</tr>
</table>
</form>
</fieldset>


<fieldset><legend>ガソリン費用</legend>
<form name="gasoline_cost" onsubmit="return false;">
<table>
<tr>
	<th>燃費</th>
	<td>
 		<select name="fuel_efficiency" onchange="onFuelEfficiency( value )">
<?  // 燃費を6から40まで1++で
for( $i=5; $i<=40; $i++ ){ ?>
            <option value="<?php print $i; ?>"<?php if(isset($_GET['fuel_efficiency']) && $_GET['fuel_efficiency'] == $i) print 'selected' ?>><?php print $i; ?>km/L</option>
<?php } ?>
 		</select>
	</td>
</tr>
<tr>
	<th>ガソリン価格</th>
	<td>
 		<select name="gasoline_value" onchange="onGasolineValue( value )">
<?  // ガソリン価格を150から190まで5++で
for( $i=130; $i<=190; $i+=5 ){ ?>
            <option value="<?php print $i; ?>"<?php if(isset($_GET['gasoline_value']) && $_GET['gasoline_value'] == $i) print 'selected'; ?>><?php print $i; ?>円</option>
<?php } ?>
 		</select>
	</td>
</trii>
<tr>
<a target="_blank" href="https://maps.google.co.jp">距離計算サイト(Googleマップ)</a>
</tr>
<tr>
	<th>片道距離<th>
	<input type="text" id="distance" value="<?php if(isset($_GET['distance'])) print $_GET['distance']; ?>" onkeyup="onDistance( value );">
	<td>
		<select name="distance_error" onchange="onDistance( document.gasoline_cost.distance.value )">
<?  // 距離バッファの値。0.9倍から1.5倍まで
for( $i='0.9'; $i<='1.5'; $i+='0.1' ){ ?>
            <option value="<?php print $i ?>"<?php if(isset($_GET['distance_error']) && $_GET['distance_error'] == $i) print $_GET['distance_error']; ?>>× <?php print $i; ?>km</option>
<?php } ?>
		</select>
	</td>
</tr>
</table>
<?php var_dump($_GET['distance_error']);?>
</form>
</fieldset>


<fieldset><legend>高速料金</legend>
<form name="highway_cost" onsubmit="return false;">
<table>
<tr>
<a target="_blank" href="http://www.driveplaza.com/dp/SearchTop">高速料金検索サイト(ドラぷら)</a>
</tr>
<tr>
	<th>割有片道料金</th>
	<td>
		<input type="text" id="highway" onkeyup="onHighway( value );">
	</td>
</tr>
</table>
</form>
</fieldset>


<fieldset><legend>結果</legend>
<table>
<tr>
	<th>参加人数：</th>
	<td><p id="impure_member">1人</p></td>
</tr>
<tr>
	<th>車両レンタル料：</th>
	<td><p id="impure_car">0円</p></td>
</tr>
<tr>
<tr>
	<th>距離：</th>
	<td><p id="impure_distance">0km</p></td>
</tr>
<tr>
	<th>燃費：</th>
	<td><p id="impure_fuel_efficiency">10km/L</p></td>
</tr>
<tr>
	<th>ガソリン：</th>
	<td><p id="impure_gasoline_value">155円/L</p></td>
</tr>
<tr>
	<th>ガソリン代(片)：</th>
	<td><p id="impure_gasoline_cost_one">0円</p></td>
</tr>
<tr>
	<th>ガソリン代(往)：</th>
	<td><p id="impure_gasoline_cost_round">0円</p></td>
</tr>
<tr>
	<th>高速料金(片道)：</th>
	<td><p id="impure_highway_one">0円</p></td>
</tr>
<tr>
	<th>高速料金(往復)：</th>
	<td><p id="impure_highway_round">0円</p></td>
</tr>
</table>
</fieldset>



<fieldset><legend>概算</legend>
<table>
	<div id="display_member"></div>
	<div id="display_car_cost"></div>
	<div id="display_moving_cost"></div>
	<div id="display_highway_cost"></div>
	<div id="display_split_cost"></div>
</table>
</fieldset>

<script type="text/javascript"><!--
function onMember( value ){
	var member = value;
  document.getElementById( 'impure_member' ).innerHTML = member + "人";
  document.getElementById( 'display_member' ).innerHTML = "参加人数:" + member + "人";
}
function onCar( value ){
	var carCost = value;
  document.getElementById( 'impure_car' ).innerHTML = carCost + "円";
  document.getElementById( 'display_car_cost' ).innerHTML = "車両レンタル料:" + carCost + "円";
}
function onFuelEfficiency( value ){
	document.getElementById( 'impure_fuel_efficiency' ).innerHTML = value + "km/L";
}
function onGasolineValue( value ){
	document.getElementById( 'impure_gasoline_value' ).innerHTML = value + "円/L";
}
function onDistance( value ){
	var distance        = document.gasoline_cost.distance.value * document.gasoline_cost.distance_error.value;
	var fuel_efficiency = document.gasoline_cost.fuel_efficiency.value;
	var gasoline_value  = document.gasoline_cost.gasoline_value.value;
  document.getElementById( 'impure_distance' ).innerHTML = ( Math.ceil( distance ) ) + "km";
	onMovingCost( distance, fuel_efficiency, gasoline_value );
}
function onMovingCost( distance, fuel_efficiency, gasoline_value ){
	var movingCost     = (distance / fuel_efficiency) * gasoline_value;
  document.getElementById( 'impure_gasoline_cost_one'   ).innerHTML = Math.ceil(  movingCost      ) + "円";
  document.getElementById( 'impure_gasoline_cost_round' ).innerHTML = Math.ceil( (movingCost * 2) ) + "円";
  document.getElementById( 'display_moving_cost' ).innerHTML = "ガソリン代(往復):" + Math.ceil( (movingCost * 2) ) + "円";
}
function onHighway( value ){
	var highwayCost = (document.highway_cost.highway.value * 2);
	document.getElementById( 'impure_highway_one'   ).innerHTML = (highwayCost / 2) + "円";
	document.getElementById( 'impure_highway_round' ).innerHTML =  highwayCost + "円";
	document.getElementById( 'display_highway_cost' ).innerHTML = "高速料金(往復):" + highwayCost + "円";
}
i = 0;
i = setInterval( "onTotalCost()", 1000 );
function onTotalCost(){
		//alert( getElementById( "display_member" ) );
}
--></script>


<?php require_once( 'library/footer.php' ); ?>
