<H1>asdasd</H1>
<?
		/*	echo '<pre>';
				print_r($retval);
				echo '</pre><br/><hr/>';
					echo '<pre>';
				var_dump($retval);
				echo '</pre><br/><hr/>'; */


echo '<table border=1><tr>
	  <th>Имя тур Пакета</th>
	  <th>Места пос.</th>
	  <th>Активность тур пакета</th>
	  <th>Сезон</th>
	  <th>Тип тур пакета</th>
	  <th>Тур оператор</th>
	  </tr>';
		foreach ($retval as $item) {
					# code...
				echo '<tr>';
				echo '<td>'.$item['Name'].'</td>';
				echo '<td>'.$item['PlaceName'].'</td>';	
				echo '<td>'.$item['ActiveTP'].'</td>';
				echo '<td>'.$item['Season'].'</td>';
				echo '<td>'.$item['TypeOfTP'].'</td>';
				echo '<td>'.$item['Toperator'].'</td>';	
				echo '</tr>';
		}		
echo '</table>';				

?>