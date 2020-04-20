<?php session_start() ?>
<h1>Input</h1>
<form  action="topup_proses.php" method="post">
  <select name="Balance">
  	<option  value= 15000>Rp. 15.000</option>
  	<option  value = 50000>Rp. 50.000</option>
    <option  value = 100000>RP. 100.000</option>
  </select>
  <input type="hidden" name="id">
  <button type="submit" >Insert</button>
</form>
