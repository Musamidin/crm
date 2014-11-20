$(document).ready(function() {
	var host = window.location.host;
	$(function() {

		$('input.tbx').autocomplete({
		
		source: function(request, response) {
				$.ajax({ 
				url: "http://"+host+"/index.php/operator/suggestions",
				data: { term:this.element.val(),name:this.element.attr('name') },
				dataType: "json",
				type: "POST",
				success: function(data){
					response(data);
				}
			});
		},
		minLength: 2,
        select: function(event) {
    //$('#status').html('<img src="http://'+host+'/crm/img/loading1.gif" alt="Currently Loading" id="loading" />');
	/*******Start in SELECT AJAX ******/
					$.ajax({
					url: 'http://'+host+'/index.php/operator/fill',
					type: 'POST',
					data: 'term='+event.target.value+'&name=' + this.name,
					success: function(result) {
					//alert(result);
					var test = result.replace("\["," ");
					var results = test.replace("\]"," ");
					eval('var rt ='+results);
					
					$.each( rt, function( key, value ) {
					$('input[name='+key+']').val(value);
					if(key == 'customer_type'){
					$('select[name='+key+']').val(value);
					}
					
					});
					
					}
				});
	/*******END in SELECT AJAX ******/
		
        }		

		});
/*******Reset FORM ******/		
    $('#reset').on('click',function(){
	 
	$('input[type=text]').val('');
	$('select[name=customer_type]').val('');
	});		
/*******END Reset FORM ******/		
		
/***check and save users **/  
$('#regs').on('click',function(){
		/*******Start in SELECT AJAX ******/
					$.ajax({
					url: 'http://'+host+'/index.php/operator/checkUser',
					type: 'POST',
					data: 'id='+ $('#id').val(),
					success: function(result) {
	
					if(result == 0){
					$('#regs').attr('type','button');
									/*******Start in SELECT AJAX ******/
									$.ajax({
									url: 'http://'+host+'/index.php/operator/SaveUser',
									type: 'POST',
									data: 'fio='+ $('input[name=fio]').val() +'&phone=' + $('input[name=phone]').val() +'&email=' + $('#email').val()+'&country=' + $('#country').val() +'&city=' + $('#city').val()+'&customer_type=' + $('#userType').val(),
									success: function(result) {
									alert(result);
									if(result == 0){
									$('#regs').attr('type','button');
									
										alert(result);

									}
									
									
									}
								});
					/*******END in SELECT AJAX ******/
			

					}
					
					
					}
				});
	/*******END in SELECT AJAX ******/

});
/***END check and save users **/  









$('input.tbxc').autocomplete({
		
		source: function(request, response) {
				$.ajax({ 
				url: "http://"+host+"/crm/index.php/operator/country",
				data: { term:this.element.val(),name:this.element.attr('name') },
				dataType: "json",
				type: "POST",
				success: function(data){
					response(data);
				}
			});
		},
		minLength: 2,
        select: function(event) {
    //$('#status').html('<img src="http://'+host+'/crm/img/loading1.gif" alt="Currently Loading" id="loading" />');
	/*******Start in SELECT AJAX ******/
					$.ajax({
					url: 'http://'+host+'/index.php/operator/fillCity',
					type: 'POST',
					data: 'term='+event.target.value+'&name=' + this.name,
					success: function(result) {
					//alert(result);
					var test = result.replace("\["," ");
					var results = test.replace("\]"," ");
					eval('var rt ='+results);
					
					$.each( rt, function( key, value ) {
					$('input[name='+key+']').val(value);
					if(key == 'customer_type'){
					$('select[name='+key+']').val(value);
					}
					
					});
					
					}
				});
	/*******END in SELECT AJAX ******/
		
        }		

		});
		
		
		




		
	});
});


