
<div id="container">

	<div style="text-align:justify;">
	<h1>
	  <span>Оператор:{John Doe}</span>
	  <span style="margin-left:400px;"><?=date("d.m.Y"); ?></span>
	  </h1>
	</div>
	<div>
     <form method="POST" action="/index.php/operator/tourPackage/">
     	<div id="body">
		<p>
			<div class="lines">
				<table border="0">
				<tr>
				<td class="lables">
				<span>Введите Ф.И.О.:&nbsp;</span>
				</td><td>
				<input type="hidden" name="id" id="id" class="tbx" />
				<input type="text" name="fio" id="autocomplete" class="tbx" value=""/>
				<!--?=form_error('fio');?-->
                <span id="errorstat"></span>
				</td>
				</tr>
				</table>
				</div>
		</p>

		<p>
			<div class="lines">
				<table border="0"><tr><td class="lables"><span>Введите номер:&nbsp;</span>
					</td><td>
<input type="text" required="true" placeholder=" 701XXXXXX" maxlength="14" class="tbx" name="phone" value="" id="phone"/>
		<!--?=form_error('phone');?--></td></tr></table></div>
		</p>

		<p>
			<div class="lines">
				<table border="0">
				<tr>
				<td class="lables"><span>Введите e-mail:</span>
					</td><td><input type="text" class="tbx" name="email" value="" id="email"/><!--?=form_error('email');?--></td>
					</tr>
					</table></div>
		</p>
		
		<p>
			<div class="lines">
				<table border="0"><tr><td class="lables"><span>Страну:&nbsp;</span>
					</td><td>
					<input type="text" class="tbxc" name="country" id="country" value="" />
					<!--?=form_error('userType');?-->
					<span id="status"></span>
					</td></tr></table></div>
		</p>

		<p>
			<div class="lines">
				<table border="0"><tr><td class="lables"><span>Город:&nbsp;</span>
					</td><td>
					<input type="text" class="tbxc" name="city" id="city" value="" />
					<!--?=form_error('userType');?-->
					</td></tr></table>
					</div>
		</p>
		<p>
			<div class="lines">
				<table border="0"><tr><td class="lables"><span>Тип клиента:&nbsp;</span>
					</td><td>
					<select class="tbx" name="customer_type" value="" id="userType">
					<option value=""></option>
					<option value="1">Юр.Лицо</option>
					<option value="2">Физ.Лицо</option>
					</select>
					<!--?=form_error('userType');?-->
					</td></tr></table></div>
		</p>
		<input type="hidden" name="datetime" value="<?=date('Y-m-d H:i:s');?>" id="datetime"/>
		<div class="lines"><input id="reset" name="reset" type="reset" value="Сбросить">
		<input id="regs" name="regs" type="button" value="Далее">
		</div>
<div class="lines"><!--?=$info; ?--></div>
	</div>
	
</form>
</div>
	<p class="footer"><strong><a href="http://test.kg">test.kg</a></strong></p>
</div>

