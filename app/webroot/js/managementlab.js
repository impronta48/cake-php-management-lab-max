$('document').ready(function(){
	//$(".datepicker").datepicker();
    
	//Todo List
	$('.finish').click(function(){
		$(this).parent().toggleClass('finished');
		$(this).toggleClass('fa-square-o');        
        
		//Chiamata ajax a complete
		$.ajax({
            type: 'POST',
            url: 'http://localhost/managementlab/tasks/complete/' + $(this).attr('task_id'),            
            cache: false,
            success: function (html){
                $(this).prop("checked", !$(this).prop("checked"));
            },
			error: function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
        	}
		});
        
        if ($(this).prop('checked'))
        {
            $(this).parent().parent().addClass('completo');
        }
        else
        {
            $(this).parent().parent().removeClass('completo');
        }
	});
    
    $('.starred').click(function(){	    
		//Chiamata ajax a star
		$.ajax({
            type: 'POST',
            url: 'http://localhost/managementlab/tasks/star/' + $(this).attr('task_id'),            
            cache: false,
            success: function(){
               //Non faccio nulla    
            },
			error: function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
        	}
		});
        
        if ($(this).hasClass('glyphicon-star'))
        {
            $(this).removeClass('glyphicon-star');
            $(this).addClass('glyphicon-star-empty');
        }
        else
        {
            $(this).addClass('glyphicon-star');
            $(this).removeClass('glyphicon-star-empty');                    
        }             
	});

});