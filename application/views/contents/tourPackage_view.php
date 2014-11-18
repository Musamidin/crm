<div id="container">
<br/>
<form method="POST" action="/crm/index.php/operator/result">
<table border="0" style="margin:0 auto;">
<tr>
<td valign="top" style="padding-right:20px;">


<div class="liness">
<table border="0">
<tr>
<td>
<span><b>Выберите сезон:</b></span><br/>
<select name="season[]" value="" multiple="multiple">
<option></option>
<?php foreach($season as $item): ?>
<option value="<?=$item['name'];?>"><?=$item['name'];?></option>
<?php endforeach; ?>
</select>
</td>
</tr>
<tr>
<td>
<span><b>Тип тур пакета</b></span><br/>
<select name="typeoftourpackage[]" value="" multiple="multiple">
<option></option>
<?php foreach($typeOfTourPackage as $item): ?>
<option value="<?=$item['name'];?>"><?=$item['name'];?></option>
<?php endforeach; ?>
</select>
</td>
</tr>
<tr>
<td>
<span><b>Уровень физ. Нагрузки</b></span>
<select name="physicalactivity" value="">
<option></option>
<?php foreach($physicalActivity as $item): ?>
<option value="<?=$item['name'];?>"><?=$item['name'];?></option>
<?php endforeach; ?>
</select>
</td>
</tr>
<tr>
<td>
<span><b>Тур оператор</b></span><br/>
<select name="touroperator[]" value="" size="5" multiple="multiple">
<option></option>
<?php foreach($tourOperator as $item): ?>
<option value="<?=$item['name'];?>"><?=$item['name'];?></option>
<?php endforeach; ?>
</select>
</td>
</tr>
</table>



<span><b>Активности в тур пакетах</b></span><br/>
<select name="activityTourPackages[]" value="" size="20" multiple="multiple">
<option></option>
<?php foreach($activityTourPackages as $item): ?>
<option value="<?=$item['Name'];?>"><?=$item['Name'];?></option>
<?php endforeach; ?>
</select>
</div>

<div class="liness">
<span><b>Продолжительность</b></span><br/>
<input type="radio" name="duration" value="1" />Меньше недели<br/>
<input type="radio" name="duration" value="2" />1 неделя и больше
</div>

</td>
<td valign="top">
<div class="liness">
<span>ФИО:</span><b><?=$sess['fio'];?></b><br/>
<span>Телефон:</span><b><?=$sess['phone'];?></b><br/>
<span>Почта:</span><b><?=$sess['email'];?></b><br/>
<span>Страна:</span><b><?=$sess['country'];?></b><br/>
<span>Город:</span><b><?=$sess['city'];?></b><br/>
<span>Юр/Физ лицо:</span><b>
<? if($sess['customer_type'] == 1){echo 'Юр.Лицо';}
elseif($sess['customer_type'] == 2){echo 'Физ.Лицо';} 
?>
</b><br/>
</div>

<div class="lines">
	
<table id="vizitPlace" border="0">
<tr>
<td><b>Места посещения</b></td>
<td><b>Область</b></td>
</tr>
<tr>
<td>
<input type="checkbox" name="region[]" value="Kochkorka"/>Kochkorka</br>
<input type="checkbox" name="region[]" value="Son Kul"/>Son Kul</br>
<input type="checkbox" name="region[]" value="Narin"/>Narin</br>
<input type="checkbox" name="region[]" value="Kichi Narin"/>Kichi Narin</br>
<input type="checkbox" name="region[]" value="Tash Rabat"/>Tash Rabat</br>

</td>
<td>Нарын</td>
</tr>
<tr>
<td>
<input type="checkbox" name="region[]" value="Chon Kemin"/>Chon Kemin</br>
<input type="checkbox" name="region[]" value="Bishkek"/>Bishkek</br>
<input type="checkbox" name="region[]" value="Balasagin"/>Balasagin</br>
<input type="checkbox" name="region[]" value="Burana"/>Burana</br>
<input type="checkbox" name="region[]" value="Boom gorge"/>Boom gorge</br>
<input type="checkbox" name="region[]" value="Ala Archa"/>Ala Archa</br>
</td>
<td>Чуй</td>
</tr>
<tr>
<td>
<input type="checkbox" name="region[]" value="Bokonbaevo"/>Bokonbaevo</br>
<input type="checkbox" name="region[]" value="Dzheti Oguz"/>Dzheti Oguz</br>
<input type="checkbox" name="region[]" value="Karakol"/>Karakol</br>
<input type="checkbox" name="region[]" value="Cholpon Ata"/>Cholpon Ata</br>
<input type="checkbox" name="region[]" value="Ruh Ordo"/>Ruh Ordo</br>
<input type="checkbox" name="region[]" value="Gregorevskoe gorge"/>Gregorevskoe gorge</br>
<input type="checkbox" name="region[]" value="Semonovskoe gorge"/>Semonovskoe gorge</br>
<input type="checkbox" name="region[]" value="Tamga"/>Tamga</br>
<input type="checkbox" name="region[]" value="Tash Suu mineral springs"/>Tash Suu mineral springs</br>
<input type="checkbox" name="region[]" value="Issyk Kul"/>Issyk Kul</br>
<input type="checkbox" name="region[]" value="Prejivalski Museum"/>Prejivalski Museum</br>
</td>
<td>Иссык-Куль</td>
</tr>
<tr>
<td>
<input type="checkbox" name="region[]" value="Prejivalski Museum"/>Talas</br>
</td>
<td>Талас</td>
</tr>
<tr>
<td>
<input type="checkbox" name="region[]" value="Djalal Abad"/>Djalal Abad</br>
<input type="checkbox" name="region[]" value="Kazarman"/>Kazarman</br>
<input type="checkbox" name="region[]" value="Arslanbob"/>Arslanbob</br>
<input type="checkbox" name="region[]" value="Saimali Tash"/>Saimali Tash</br>
</td>
<td>Джалал Абад</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input id="regs" type="submit" value="П О И С К"/></td>
</tr>
</table>
</form>	
	<p class="footer"><strong><a href="http://test.kg">test.kg</a></strong></p>
</div>

