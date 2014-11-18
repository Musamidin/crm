/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
$('#search').keypress(function(e){
    
    if(e.which === 13){
    e.preventDefault();    
    }
    var searched = $('#search').val();
    var fullurl = $('#hiddenurl').val() + 'index.php/operator/getResult/'+searched;
    $.getJSON(fullurl,function(result){
        var elements = [];
        $.each(result, function(i,val){
        elements.push(val.fio);                
        });
        $('#search').autocomplete({
          sorce:elements  
        });
    });
    
    
    
    });
    
});


