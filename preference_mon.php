<div class="title_mon">

<table>


<tr>

  <th>旅のしおりを開く</th>
  <td>
	  <form action="./" method="GET">
      <select name="travel_id">
        <option value="4">A-san</option>";
	 	    <?php print travel_list(); ?>
      </select>
      <input type="submit" value="選択">
	  </form>
  </td>

</tr>
<tr>
  <th>旅のしおりを作る</th>
  <td>実装中</td>
</tr>

</table>
 
<?php

function travel_list(){
  echo $row = sql_select( "*", "travle_tbl" );
  print "<option value=\"5\">ダミー</option>";
  //print "<option value=".$row['id'].">".$row['title']."</option>";
}
?>



<script>
function moveUrl(_this, _target) {
    var url = _this.options[_this.selectedIndex].value;
    if (_target == null || _target == "") {
//        location.href = url;
    } else {
        //window.open(url, _target);
        location.href = url;
    }
}
</script>

</div><!-- class=title_mon -->
