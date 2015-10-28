$(document).ready(function(){
     
    $('#search').keypress(function(e){
         
        if(e.which == 13)
            {
                e.preventDefault();
            }
            var searched = $('#search').val()
            var fullurl = $('#hiddenurl').val() + '/group/getResult/' + searched
			$.getJSON(fullurl,function(result){
           //display suggestion code goes here
		   var elements = [];
            $.each(result,function(i,val){
                elements.push(val.title)
            })
            $('#search').autocomplete({
                source : elements
            })
             
        })
		
             
        })
    })
})