$(document).ready(function() {
	var host = window.location.host;
	$(function() {

		$('input.tbx').autocomplete({
		
		source: function(request, response) {
				$.ajax({ 
				url: "http://"+host+"/crm/index.php/operator/suggestions",
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
					url: 'http://'+host+'/crm/index.php/operator/fill',
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
					url: 'http://'+host+'/crm/index.php/operator/fillCity',
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


